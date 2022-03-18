<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Flyweight;

class word implements Text
{
    public function __construct(private string $name)
    {
    }

    public function render(string $extrinsicState): string
    {
        return sprintf('Word %s with font %s', $this->name, $extrinsicState);
    }
}
