<?php

class CartaOscuro implements Carta{

    private string $carta;

    public function __construct(){

        $this->carta = "
            .card{
                position:relative;
                display:-webkit-box;
                display:-ms-flexbox;
                display:flex;
                -webkit-box-orient:vertical;
                -webkit-box-direction:normal;
                -ms-flex-direction:column;
                flex-direction:column;
                min-width:0;
                word-wrap:break-word;
                background-color:#001d3d;
                background-clip:border-box;
                border:1px solid rgba(0,0,0,.125);
                border-radius:.25rem
            }
        ";
    }

    public function getCarta(): string{
        return $this->carta;
    }

}