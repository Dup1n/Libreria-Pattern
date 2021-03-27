<?php
abstract class RevisionPaginas
{
    abstract function getInputBusqueda():string;
    abstract function BusquedaMatch(Libreria $libreria, $inputBusqueda): array;

    public function getPaginas(array $BusquedaMatches): array
    {
        $paginas = [];
        foreach ($BusquedaMatches as $match) {
            $paginas[] = $match->getDocumentoPaginas();
        }
        return $paginas;
    }

    public function totalPaginas(RevisionPaginas $inputBusqueda, array $BusquedaMatches): int
    {    

        $totalPaginas = 0;
        foreach ($inputBusqueda->getPaginas($BusquedaMatches) as $pagina) {
            $totalPaginas += $pagina;
        }
        return $totalPaginas;
    }


}