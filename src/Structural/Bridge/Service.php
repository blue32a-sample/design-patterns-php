<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge;

abstract class Service
{
    protected Formatter $implementation;

    public function __construct(Formatter $implementation)
    {
        $this->implementation = $implementation;
    }

    public function setImplementation(Formatter $printer)
    {
        $this->implementation = $printer;
    }

    abstract public function get(): string;
}
