<?php

class CartaDia implements Carta{

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
            background-color:#fff;
            background-clip:border-box;
            border:2px solid rgba(0,1,0,.5);
            border-radius:0rem
        }
        ";
    }

    public function getCarta(): string{
        return $this->carta;
    }

}