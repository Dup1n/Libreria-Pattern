<?php

class FondoOscuro implements Fondo{
    private string $fondo;

    public function __construct(){
        $this->fondo = "
            html, body {
                height: 100%;
                margin: 0;
            }

            .bg {
                background-image: linear-gradient(to bottom, rgba(0,0,0,0.9) 0%,rgba(20, 33, 61,0.9) 100%), url('https://img.lovepik.com/photo/50140/3639.jpg_wh860.jpg');
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