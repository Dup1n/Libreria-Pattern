<?php

class BotonOscuro implements Boton{

    private string $boton;

    public function __construct(){

        $this->boton = "
        .btn{
            display:inline-block;
            font-family: Helvetica, sans-serif;
            font-weight:400;
            text-align:center;
            white-space:nowrap;
            vertical-align:middle;
            -webkit-user-select:none;
            -moz-user-select:none;
            -ms-user-select:none;
            user-select:none;
            border:1px solid transparent;
            padding:.375rem .75rem;
            font-size:1rem;
            line-height:1.5;
            border-radius:0rem;
            transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out
        }

        .btn-primary{
            color:#fff;
            background-color:#fca311;
            border-color:#fca311;
        }
        
        .btn-primary:hover{
            color:#fff;
            background-color:#ffba08;
            border-color:#ffba08;
        }

        ";
    }

    public function getBoton(): string{
        return $this->boton;
    }

}