<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * Creator
 */
interface LoggerFactory
{
    public function createLogger(): Logger;
}
