<?php

class EstadoSobretiempo extends Estado {
    public function disponible(): void
    {
        $this->contexto->transicionA(new EstadoDisponible());
    }

    public function perdido(): void
    {
        $this->contexto->transicionA(new EstadoPerdido());
    }

    public function prestado(): void{
        throw new Exception('No implementado para este estado');
    }

    public function sobretiempo(): void{
        throw new Exception('No implementado para este estado');
    }

    public function comprado(): void{
        throw new Exception('No implementado para este estado');
    }    
}
