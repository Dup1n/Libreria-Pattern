<?php

class Genero extends RevisionPaginas
{
    private string $genero;

    public function __construct(string $genero)
    {
        $this->genero = strtolower($genero);
    }

    public function getInputBusqueda():string
    {
        return $this->genero;
    }

    public static function getGeneros(Libreria $libreria)
    {
        $generos = [];
        foreach ($libreria->getLibros() as $Libro) {
            $generos[] = $Libro->getGenero();
        }
        $generos = array_unique($generos);
        return $generos;
    }
    public function BusquedaMatch(Libreria $libreria, $inputBusqueda): array
    {
        $BusquedaMatches = [];
        foreach ($libreria->getLibros() as $Libro) {
            if (stripos(strtolower($Libro->getGenero()), strtolower($inputBusqueda) )!== false) {
                $BusquedaMatches[] = $Libro;
            }
        }
        return $BusquedaMatches;

    }
}