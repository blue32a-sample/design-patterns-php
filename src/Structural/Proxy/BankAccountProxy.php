<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Proxy;

class BankAccountProxy extends HeavyBankAccount implements BankAccount
{
    private ?int $balance = null;

    public function getBalance(): int
    {
        /**
         * 残高の計算には非常に費用がかかるため、BankAccount::getBalance()の使用は、
         * 実際に必要になるまで延期され、このインスタンスでは再度計算されません。
         */
        if ($this->balance === null) {
            $this->balance = parent::getBalance();
        }

        return $this->balance;
    }
}
