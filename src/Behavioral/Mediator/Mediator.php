<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Mediator;

Interface Mediator
{
    public function getUser(string $username): string;
}
