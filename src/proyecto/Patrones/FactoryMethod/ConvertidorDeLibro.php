<?php

abstract class ConvertidorDeLibro{

    abstract public function convertirDatos():array;
    
    public function getDatos(): array //array<Libro>
    {
        //LLamada del Factory Method para crear un objeto Producto
        return $this->convertirDatos();
    }
    
}