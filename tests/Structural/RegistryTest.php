<?php

declare(strict_types=1);

namespace Tests\Structural;

use DesignPatterns\Structural\Registry\Registry;
use DesignPatterns\Structural\Registry\Service;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class RegistryTest extends TestCase
{
    private Service $service;

    protected function setUp(): void
    {
        $this->service = $this->getMockBuilder(Service::class)->getMock();
    }

    public function testSetAndGetLogger(): void
    {
        Registry::set(Registry::LOGGER, $this->service);

        $this->assertSame($this->service, Registry::get(Registry::LOGGER));
    }

    public function testThrowsExceptionWhenTryingToSetInvalidKey(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Registry::set('foobar', $this->service);
    }
}
