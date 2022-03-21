<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Proxy;

class HeavyBankAccount implements BankAccount
{
    /**
     * @var int[]
     */
    private array $transactions = [];

    public function deposit(int $amount)
    {
        $this->transactions[] = $amount;
    }

    public function getBalance(): int
    {
        /**
         * これは重い部分です。
         * 何年も何十年も前のすべてのトランザクションをデータベースまたはWebサービスからフェッチし、
         * そこから残高を計算する必要があると想像してください。
         */
        return array_sum($this->transactions);
    }
}
