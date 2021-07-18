<?php

declare(strict_types=1);

namespace Tests\Creational;

use DesignPatterns\Creational\Singleton\Singleton;
use Exception;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testUniqueness(): void
    {
        $firstCall = Singleton::getInstance();
        $secondCall = Singleton::getInstance();

        $this->assertInstanceOf(Singleton::class, $firstCall);
        $this->assertSame($firstCall, $secondCall);
    }

    public function testCanNotCreateInstance(): void
    {
        $this->expectError();

        new Singleton();
    }

    public function testCanNotCloneInstance(): void
    {
        $this->expectError();

        $firstCall = Singleton::getInstance();
        $secondCall = clone $firstCall;
    }

    public function testCanNotUnserialized(): void
    {
        $this->expectException(Exception::class);

        $instance = Singleton::getInstance();
        $serialized = serialize($instance);
        unserialize($serialized);
    }
}
