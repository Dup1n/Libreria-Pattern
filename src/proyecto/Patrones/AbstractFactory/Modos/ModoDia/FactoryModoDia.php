<?php

class FactoryModoDia implements FactoryModos{
    public function getEstiloFondo(): Fondo{
        return new FondoDia();
    }

    public function getEstiloCartas(): Carta{
        return new CartaDia();
    }

    public function getEstiloTitulos(): Titulos{
        return new TitulosDia();
    }

    public function getEstiloBotones(): Boton{
        return new BotonDia();
    }
}