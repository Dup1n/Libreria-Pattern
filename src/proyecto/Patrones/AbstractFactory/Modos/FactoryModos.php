<?php

interface FactoryModos {
    public function getEstiloFondo(): Fondo;
    public function getEstiloCartas(): Carta;
    public function getEstiloTitulos(): Titulos; 
    public function getEstiloBotones(): Boton;
}