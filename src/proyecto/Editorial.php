<?php

class Editorial extends RevisionPaginas
{
    private string $editorial;


    public function __construct(string $editorial)
    {
        $this->editorial = strtolower($editorial);
    }

    public function getInputBusqueda():string
    {
        return $this->editorial;
    }

    public static function getEditoriales(Libreria $libreria)
    {
        $editoriales = [];
        foreach ($libreria->getLibros() as $Libro) {
            $editoriales[] = $Libro->getEditorial();
        }
        $editoriales = array_unique($editoriales);
        return $editoriales;
    }
    public function BusquedaMatch(Libreria $libreria, $inputBusqueda): array
    {
        $BusquedaMatches = [];
        foreach ($libreria->getLibros() as $Libro) {
            if (stripos(strtolower($Libro->getEditorial()), strtolower($inputBusqueda) )!== false) {
                $BusquedaMatches[] = $Libro;
            }
        }
        return $BusquedaMatches;

    }
}

