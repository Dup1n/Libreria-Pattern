<?php

class Libreria
{
    protected array $libros = [];

    public function setLibros(array $libros): void
    {
        $this->libros = $libros;
    }

    public function getLibros(): array
    {
        return $this->libros;
    }

    public static function busquedaLibros(Libreria $libreria,string $titulo): Libro{
        foreach ($libreria->getLibros() as $libro){
            if($titulo===$libro->getTitulo()){
                return $libro;
            }
        }
    }

    public function mostrarLibros(array $busquedaMatches):string{
        $mostrarCompleto="";
        foreach ($busquedaMatches as $match) {
            $estado=get_class($match->getContexto()->getEstado());
            $titulo=urlencode($match->getTitulo());
            switch ($estado){
                case 'EstadoPrestado':
                    $display="<div class='card text-white bg-info mr-2 mb-2 col-3'>
                    <h2>Libro</h2>
                    <p><strong>Titulo: </strong>{$match->getTitulo()}</p>
                    <p><strong>Genero: </strong>{$match->getGenero()}</p>
                    <p><strong>Editorial: </strong>{$match->getEditorial()}</p>
                    <p><strong>Estado: </strong>{$estado}</p>
                    <a href='?titulo=$titulo&estado=perdido' class='btn btn-primary'>Lo he Perdido</a>
                    <a href='?titulo=$titulo&estado=disponible' class='btn btn-primary'>Devolver Libro</a>
                    <a href='?titulo=$titulo&estado=sobretiempo' class='btn btn-primary'>Pedir Mas Tiempo</a>
                    </div>";
                    break;
                case 'EstadoDisponible':
                    $display="<div class='card mr-2 mb-2 col-3'>
                    <h2>Libro</h2>
                    <p><strong>Titulo: </strong>{$match->getTitulo()}</p>
                    <p><strong>Genero: </strong>{$match->getGenero()}</p>
                    <p><strong>Editorial: </strong>{$match->getEditorial()}</p>
                    <p><strong>Estado: </strong>{$estado}</p>
                    <a href='?titulo=$titulo&estado=prestado' class='btn btn-primary'>Prestarse</a>
                    <a href='?titulo=$titulo&estado=vendido' class='btn btn-primary'>Comprarlo</a>
                    </div>";
                    break;
                case 'EstadoSobretiempo':
                    $display="<div class='card text-white bg-warning mr-2 mb-2 col-3'>
                    <h2>Libro</h2>
                    <p><strong>Titulo: </strong>{$match->getTitulo()}</p>
                    <p><strong>Genero: </strong>{$match->getGenero()}</p>
                    <p><strong>Editorial: </strong>{$match->getEditorial()}</p>
                    <p><strong>Estado: </strong>{$estado}</p>
                    <a href='?titulo=$titulo&estado=disponible' class='btn btn-primary'>Devolver Libro</a>
                    <a href='?titulo=$titulo&estado=perdido' class='btn btn-primary'>Lo he Perdido</a>
                    </div>";
                    break;
                case 'EstadoPerdido':
                    $display="<div class='card text-white bg-danger mr-2 mb-2 col-3'>
                    <h2>Libro</h2>
                    <p><strong>Titulo: </strong>{$match->getTitulo()}</p>
                    <p><strong>Genero: </strong>{$match->getGenero()}</p>
                    <p><strong>Editorial: </strong>{$match->getEditorial()}</p>
                    <p><strong>Estado: </strong>{$estado}</p>
                    </div>";
                    break;
                case 'EstadoVendido':    
                    $display="<div class='card text-white bg-success mr-2 mb-2 col-3'>
                    <h2>Libro</h2>
                    <p><strong>Titulo: </strong>{$match->getTitulo()}</p>
                    <p><strong>Genero: </strong>{$match->getGenero()}</p>
                    <p><strong>Editorial: </strong>{$match->getEditorial()}</p>
                    <p><strong>Estado: </strong>{$estado}</p>
                    </div>";
                    break;
            }
            $mostrarCompleto.=$display;

        }
        return $mostrarCompleto;
    }


}

