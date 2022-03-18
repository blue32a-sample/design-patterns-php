<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Flyweight;

Interface Text
{
    public function render(string $extrinsicState): string;
}
