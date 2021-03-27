<?php

class FondoDia implements Fondo{
    private string $fondo;

    public function __construct(){
        $this->fondo = "
            body, html {
                height: 100%;
                margin: 0;
            }
          
            .bg {
            background-image: url('https://img.lovepik.com/photo/50140/3639.jpg_wh860.jpg');
          
            height: 100%; 

            background-position: center;
            background-size: cover;
            }

        ";
    }

    public function getFondo(): string{
        return $this->fondo;
    }
}