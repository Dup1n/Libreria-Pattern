<?php

class ConvertidorDeLibroJson extends ConvertidorDeLibro {
    private string $ruta;
    private array $libros=[];

    public function __construct($ruta)
    {
        $this->ruta = $ruta;
    }

    public function convertirDatos():array {
        $libroDatos= json_decode(file_get_contents($this->ruta, true), true, 512, JSON_THROW_ON_ERROR);
        foreach ($libroDatos as $libro){
            $libroParaLibreria = new Libro($libro['title'],$libro['author'],$libro['genre'],(int) $libro['pages'], $libro['publisher'], new EstadoDisponible());
            $this->libros[]=$libroParaLibreria;

        }

        return $this->libros;
    }


}