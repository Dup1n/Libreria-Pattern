<?php
interface Documento {
    public function getTitulo(): string;
    public function getGenero(): string;
    public function getDocumentoPaginas(): int;
    public function getEditorial(): string;
    public function getContexto(): Contexto;
    public function setContexto(Contexto $contexto): void;
}