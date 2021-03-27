<?php

class Estilo
{
    private string $estilos = "";

    public function render(FactoryModos $factory): string
    {
        $estiloFondo = $factory->getEstiloFondo();
        $this->estilos .= $estiloFondo->getFondo();
        $estiloTitulos = $factory->getEstiloTitulos();
        $this->estilos .= $estiloTitulos->getTitulos();
        $estiloBotones = $factory->getEstiloBotones();
        $this->estilos .= $estiloBotones->getBoton();
        $estiloCartas = $factory->getEstiloCartas();
        $this->estilos .= $estiloCartas->getCarta();

        return $this->estilos;
    }
}