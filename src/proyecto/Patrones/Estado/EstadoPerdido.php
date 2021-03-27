<?php

class EstadoPerdido extends Estado {
    public function disponible(): void{
        throw new Exception('No implementado para este estado');
    }

    public function prestado(): void{
        throw new Exception('No implementado para este estado');
    }

    public function sobretiempo(): void{
        throw new Exception('No implementado para este estado');
    }

    public function perdido(): void{
        throw new Exception('No implementado para este estado');
    }

    public function comprado(): void{
        throw new Exception('No implementado para este estado');
    }
}