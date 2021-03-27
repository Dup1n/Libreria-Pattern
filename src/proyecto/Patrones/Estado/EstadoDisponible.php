<?php

class EstadoDisponible extends Estado{
    public function disponible(): void{
        throw new Exception('No implementado para este estado');
    }
    public function prestado(): void
    {
        $this->contexto->transicionA(new EstadoPrestado());
    }

    public function comprado(): void
    {
        $this->contexto->transicionA(new EstadoVendido());
    }

    public function sobretiempo(): void{
        throw new Exception('No implementado para este estado');
    }
    
    public function perdido(): void{
        throw new Exception('No implementado para este estado');
    }
}
