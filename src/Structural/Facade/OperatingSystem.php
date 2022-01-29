<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade;

Interface OperatingSystem
{
    public function halt();

    public function getName(): string;
}
