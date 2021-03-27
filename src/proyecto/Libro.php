<?php

class Libro implements Documento
{
    private string $titulo;
    private string $autor;
    private string $genero;
    private int $paginas;
    private string $editorial;
    private Contexto $contexto;

    public function __construct(string $titulo, string $autor, string $genero, int $paginas, string $editorial, Estado $estado)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->genero = $genero;
        $this->paginas = $paginas;
        $this->editorial = $editorial;
        $this->contexto=new Contexto($estado);
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getGenero(): string
    {
        return $this->genero;
    }

    public function getDocumentoPaginas(): int
    {
        return $this->paginas;
    }

    public function getEditorial(): string
    {
        return $this->editorial;
    }

    public function getContexto(): Contexto
    {
        return $this->contexto;
    }

    public function setContexto(Contexto $contexto): void
    {
        $this->contexto = $contexto;
    }

}