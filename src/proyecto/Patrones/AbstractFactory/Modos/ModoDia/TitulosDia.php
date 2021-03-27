<?php

class TitulosDia implements Titulos {
    private string $titulos;

    public function __construct(){
        $this->titulos = "
        h1,h2{
            margin-top:0;
            margin-bottom:.5rem;
        }
        p{
            margin-top:0;
            margin-bottom:1rem
        }
        h1,h2{
            margin-bottom:.5rem;
            font-family:inherit;
            font-weight:700;
            line-height:1.2;
            color:inherit;
            font-family: 'Courier New', monospace;
        }
        .h1,h1{
            font-size:2.5rem
        }
        .h2,h2{
            font-size:2rem
        }
        label{
            display:inline-block;
            margin-bottom:.5rem;
            font-family: 'Courier New', monospace;
        }
        ";
    }

    public function getTitulos(): string{
        return $this->titulos;
    }
}