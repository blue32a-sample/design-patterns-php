<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Strategy;

interface Comparator
{
    public function compare($a, $b): int;
}
