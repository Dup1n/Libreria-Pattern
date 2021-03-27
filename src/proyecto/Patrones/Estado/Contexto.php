<?php

class Contexto
{

    private $estado;

    public function __construct(Estado $estado)
    {
        $this->transicionA($estado);
    }

    public function getEstado(): Estado
    {
        return $this->estado;
    }

    public function transicionA(Estado $estado): void
    {
        $this->estado = $estado;
        $this->estado->setContexto($this);
    }

    public function disponible(): void
    {
        $this->estado->disponible();
    }

    public function perdido(): void
    {
        $this->estado->perdido();
    }

    public function prestado(): void
    {
        $this->estado->prestado();
    }
    public function sobretiempo(): void
    {
        $this->estado->sobretiempo();
    }
    public function comprado(): void
    {
        $this->estado->comprado();
    }
}
