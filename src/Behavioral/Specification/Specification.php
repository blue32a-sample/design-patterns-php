<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Specification;

Interface Specification
{
    public function isSatisfiedBy(Item $item): bool;
}
