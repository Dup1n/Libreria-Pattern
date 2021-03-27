<?php


abstract class Estado
{

    protected $contexto;

    public function getContexto(): Contexto
    {
        return $this->contexto;
    }

    public function setContexto(Contexto $contexto)
    {
        $this->contexto = $contexto;
    }

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