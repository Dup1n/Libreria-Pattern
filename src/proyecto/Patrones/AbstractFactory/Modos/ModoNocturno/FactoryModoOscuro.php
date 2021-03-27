<?php

class FactoryModoOscuro implements FactoryModos{
    public function getEstiloFondo(): Fondo{
        return new FondoOscuro();
    }

    public function getEstiloCartas(): Carta{
        return new CartaOscuro();
    }

    public function getEstiloTitulos(): Titulos{
        return new TitulosOscuro();
    }

    public function getEstiloBotones(): Boton{
        return new BotonOscuro();
    }
}