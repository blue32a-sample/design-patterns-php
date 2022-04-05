<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\StaticFactory;

Interface Formatter
{
    public function format(string $input): string;
}
