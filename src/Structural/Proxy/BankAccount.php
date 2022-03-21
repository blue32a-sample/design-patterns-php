<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Proxy;

Interface BankAccount
{
    public function deposit(int $amount);

    public function getBalance(): int;
}
