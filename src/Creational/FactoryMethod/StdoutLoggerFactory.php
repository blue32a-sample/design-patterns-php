<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * Concreate Creator
 */
class StdoutLoggerFactory implements LoggerFactory
{
    public function createLogger(): Logger
    {
        return new StdoutLogger();
    }
}
