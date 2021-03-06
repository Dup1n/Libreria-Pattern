<?php

class BotonDia implements Boton{

    private string $boton;

    public function __construct(){

        $this->boton = "
            .btn{
                display:inline-block;
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
                border-radius:.75rem;
                transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out
            }
            
            .btn-primary{
                color:#fff;
                background-color:#007bff;
                border-color:#007bff
            }
            
            .btn-primary:hover{
                color:#fff;
                background-color:#0069d9;
                border-color:#0062cc
            }
            
        ";
    }

    public function getBoton(): string{
        return $this->boton;
    }

}