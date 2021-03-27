<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'proyecto/Documento.php';
require 'proyecto/Libro.php';
require 'proyecto/Libreria.php';

//ABSTRACTFACTORY//

require 'proyecto/Patrones/AbstractFactory/Componentes/Boton.php';
require 'proyecto/Patrones/AbstractFactory/Componentes/Carta.php';
require 'proyecto/Patrones/AbstractFactory/Componentes/Fondo.php';
require 'proyecto/Patrones/AbstractFactory/Componentes/Titulos.php';

require 'proyecto/Patrones/AbstractFactory/Modos/FactoryModos.php';
require 'proyecto/Patrones/AbstractFactory/Modos/ModoDia/FactoryModoDia.php';

require 'proyecto/Patrones/AbstractFactory/Modos/ModoDia/FondoDia.php';
require 'proyecto/Patrones/AbstractFactory/Modos/ModoDia/BotonDia.php';
require 'proyecto/Patrones/AbstractFactory/Modos/ModoDia/CartaDia.php';
require 'proyecto/Patrones/AbstractFactory/Modos/ModoDia/TitulosDia.php';

require 'proyecto/Patrones/AbstractFactory/Modos/ModoNocturno/FactoryModoOscuro.php';

require 'proyecto/Patrones/AbstractFactory/Modos/ModoNocturno/BotonOscuro.php';
require 'proyecto/Patrones/AbstractFactory/Modos/ModoNocturno/FondoOscuro.php';
require 'proyecto/Patrones/AbstractFactory/Modos/ModoNocturno/TitulosOscuro.php';
require 'proyecto/Patrones/AbstractFactory/Modos/ModoNocturno/CartaOscuro.php';

require 'proyecto/Patrones/AbstractFactory/Estilos.php';


//FACTORYMETHOD//

require 'proyecto/Patrones/FactoryMethod/ConvertidorDeLibro.php';
require 'proyecto/Patrones/FactoryMethod/ConvertidorDeLibroCsv.php';
require 'proyecto/Patrones/FactoryMethod/ConvertidorDeLibroJson.php';

require 'proyecto/RevisionPaginas.php';
require 'proyecto/BusquedaParcialLibro.php';
require 'proyecto/Editorial.php';
require 'proyecto/Genero.php';

//ESTAODS//

require 'proyecto/Patrones/Estado/Contexto.php';
require 'proyecto/Patrones/Estado/Estado.php';
require 'proyecto/Patrones/Estado/EstadoDisponible.php';
require 'proyecto/Patrones/Estado/EstadoPrestado.php';
require 'proyecto/Patrones/Estado/EstadoSobretiempo.php';
require 'proyecto/Patrones/Estado/EstadoVendido.php';
require 'proyecto/Patrones/Estado/EstadoPerdido.php';

session_start();
function llamadaCliente(ConvertidorDeLibro $convertidor):array
{
    return $convertidor->getDatos();
}

/*LLAMADA ESTILO*/
$estilo = new Estilo();

/* OUTPUT del FactoryMethod */
$libros = llamadaCliente(new ConvertidorDeLibroCsv('proyecto/archivos/libros.csv'));

/* Creando Libreria */
if(isset($_SESSION['libreria'])){
    $libreria=$_SESSION['libreria'];
}else{
    $libreria = new Libreria();
    $libreria->setLibros($libros);
    $_SESSION['libreria']=$libreria;
    $my_estilo = $estilo->render(new FactoryModoDia());
    $_SESSION['modo'] = "Modo Nocturno";
}

switch(isset($_POST))
{
case isset($_POST['inputBusquedaLibro']):
    $inputBusqueda = new BusquedaParcialLibro($_POST['inputBusquedaLibro']);
    break;

case isset($_POST['genero'])&& $_POST['genero']!=='':
    $inputBusqueda = new Genero($_POST['genero']);
    break;

case isset($_POST['editorial'])&& $_POST['editorial']!=='':
    $inputBusqueda = new Editorial($_POST['editorial']);
    break;

/*Cambio segun que modo quiere estar*/
case isset($_POST['modos']):
    if($_SESSION['modo'] == "Modo Dia"){
        $_SESSION['my_estilo'] = $estilo->render(new FactoryModoDia());
        $_SESSION['modo'] = "Modo Nocturno";
    }
    elseif($_SESSION['modo'] == "Modo Nocturno"){
        $_SESSION['my_estilo'] = $estilo->render(new FactoryModoOscuro());
        $_SESSION['modo'] = "Modo Dia";
    }
    break;
}

if($_SERVER['REQUEST_METHOD']=='POST' && !isset($_POST['modos'])){

    $busquedaMatches = $inputBusqueda->BusquedaMatch($libreria, $inputBusqueda->getInputBusqueda());
}

/* Output del Estado */
if(isset($_GET['estado'])){
    $libro = Libreria::busquedaLibros($libreria, $_GET['titulo']);
    $contexto= $libro->getContexto();
    switch ($_GET['estado']){
        case 'prestado':
            $contexto->prestado();
            break;
        case 'vendido':
            $contexto->comprado();
            break;
        case 'perdido':
            $contexto->perdido();
            break;
        case 'sobretiempo':
            $contexto->sobretiempo();
            break;
        case 'disponible':
            $contexto->disponible();
            break;

    }
    $libro->setContexto($contexto);

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php 
      echo '<style>';
        echo $_SESSION['my_estilo'];
      echo '</style>';
    ?>      
    <title>Libreria</title>
</head>
<body class="bg">
<h1 class="text-center my-2">Libreria Parcial</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
    <input type="submit" name="modos" class="btn btn-primary" value="<?php echo $_SESSION['modo']; ?>" />
</form>
<section id="AreaBusqueda" class="container my-4">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <label for="busquedaLibro" class="label mr-2"><strong>Nombre del titulo:</strong></label>
        <div class="input-group">
            <input type="text" class="form-control" id="busquedaLibro" name="inputBusquedaLibro"
                   placeholder="Escribe aqui..."
                   value="<?php if (isset($_POST['inputBusquedaLibro'])) echo $_POST['inputBusquedaLibro'] ?>">

            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Busqueda</button>
            </div>
        </div>
    </form>
    <div class="mt-2 d-flex justify-content-between">
        <form method="post" class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <label for="genero" class="label"><strong>Escoger un Genero:</strong></label>
            <div class="input-group">
                <select name="genero" id="genero">
                    <option value=""><?php if(isset($_POST['genero'])) echo "eligio: {$_POST['genero']}"; ?></option>
                    <?php
                    foreach (Genero::getGeneros($libreria) as $genero) {
                        echo " <option value='$genero'>$genero</option>";
                    }
                    ?>
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <label for="genero" class="label"><strong>Escoger Editorial:</strong></label>
            <div class="input-group">
                <select name="editorial" id="editorial">
                    <option value=""><?php if(isset($_POST['editorial'])) echo "eligio: {$_POST['editorial']}"; ?></option>
                    <?php
                    foreach (Editorial::getEditoriales($libreria) as $editorial) {
                        echo " <option value='$editorial'>$editorial</option>";
                    }
                    ?>
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
    </div>
</section>
<section id="informacionPagina" class="container">
    <?php if ($_SERVER['REQUEST_METHOD']=='POST'  && !isset($_POST['modos'])) echo "<h2 class='my-3'>Total de Paginas para esta busqueda: {$inputBusqueda->totalPaginas($inputBusqueda,$busquedaMatches)}</h2>"; ?>
</section>
<section id="Inventario" class="container text-center">
    <div class="row ml-2">
        <?php if ($_SERVER['REQUEST_METHOD']=='POST'  && !isset($_POST['modos'])) echo $libreria->mostrarLibros($busquedaMatches);?>
    </div>
</section>

</body>
</html>



