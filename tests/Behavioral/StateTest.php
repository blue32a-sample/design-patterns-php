<?php

declare(strict_types=1);

namespace Tests\Behavioral;

use DesignPatterns\Behavioral\State\OrderContext;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{
    private OrderContext $orderContext;

    public function setUp(): void
    {
        $this->orderContext = OrderContext::create();
    }

    public function testIsCreatedWithStateCreated(): void
    {
        $this->assertSame('created', $this->orderContext->toString());
    }

    public function testCanProceedToStateShipped(): void
    {
        $this->orderContext->proceedToNext();

        $this->assertSame('shipped', $this->orderContext->toString());
    }

    public function testCanProceedToStateDone(): void
    {
        $this->orderContext->proceedToNext();
        $this->orderContext->proceedToNext();

        $this->assertSame('done', $this->orderContext->toString());
    }

    public function testStateDoneIsTheLastProssibleStaet(): void
    {
        $this->orderContext->proceedToNext();
        $this->orderContext->proceedToNext();
        $this->orderContext->proceedToNext();

        $this->assertSame('done', $this->orderContext->toString());
    }
}
