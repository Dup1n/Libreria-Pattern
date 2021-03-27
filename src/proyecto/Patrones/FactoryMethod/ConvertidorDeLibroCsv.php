<?php

class ConvertidorDeLibroCsv extends ConvertidorDeLibro {
    private string $ruta;
    private array $libros=[];

    public function __construct(string $ruta)
    {
        $this->ruta = $ruta;
    }

    public function convertirDatos():array {
        $libroDatos = [];
        if (($handle = fopen($this->ruta, "r")) !== FALSE) {
            while (($datos = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if(!isset($first)) {
                    $first = false;
                    continue;
                }

                [$title, $author, $genre, $pages, $publisher] = $datos;
                $libroDatos[] = [
                    'title' => $title,
                    'author' => $author,
                    'genre' => $genre,
                    'pages' => $pages,
                    'publisher' => $publisher,
                ];
            }
            fclose($handle);
            foreach ($libroDatos as $libro){
                $libroParaLibreria = new Libro($libro['title'],$libro['author'],$libro['genre'],(int) $libro['pages'], $libro['publisher'], new EstadoDisponible());
                $this->libros[]=$libroParaLibreria;

            }
            return $this->libros;

        }
    }


}