<?php

class BusquedaParcialLibro extends RevisionPaginas
{
    private string $inputBusqueda;

    public function __construct(string $inputBusqueda)
    {
        $this->inputBusqueda = strtolower($inputBusqueda);
    }

    public function getInputBusqueda(): string
    {
        return $this->inputBusqueda;
    }

    public function BusquedaMatch(Libreria $libreria, $inputBusqueda): array
    {
        $BusquedaMatches = [];
        foreach ($libreria->getLibros() as $Libro) {
            if (stripos(strtolower($Libro->getTitulo()), strtolower($inputBusqueda) )!== false) {
                $BusquedaMatches[] = $Libro;
            }
        }
        return $BusquedaMatches;

    }
}
