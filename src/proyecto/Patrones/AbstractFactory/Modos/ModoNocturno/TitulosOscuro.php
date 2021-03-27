<?php

class TitulosOscuro implements Titulos {
    private string $titulos;

    public function __construct(){
        $this->titulos = "
            h1,h2{
                margin-top:0;
                margin-bottom:.5rem;
                color: #ffc300;
                font-family: 'Times New Roman', serif;
            }
            p{
                margin-top:0;
                margin-bottom:1rem;
                color: #ffffff;
            }
            h1,h2{
                margin-bottom:.5rem;
                font-family:inherit;
                font-weight:500;
                line-height:1.2;
                color: #ffffff;
                font-family: 'Times New Roman', serif;
            }
            .h1,h1{
                font-size:4rem
            }

            .h2,h2{
                font-size:2rem
            }

            .label {
                font-family: 'Times New Roman', serif;
                color: #e5e5e5;
                font-weight: bold;
            }
            
        ";
    }

    public function getTitulos():string {
        return $this->titulos;
    }
}