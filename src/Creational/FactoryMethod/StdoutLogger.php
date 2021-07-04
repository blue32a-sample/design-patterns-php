<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * Concreate Product
 */
class StdoutLogger implements Logger
{
    public function log(string $message)
    {
        echo $message;
    }
}
