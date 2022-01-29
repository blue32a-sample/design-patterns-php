<?php

declare(strict_types=1);

namespace Tests\Structural;

use DesignPatterns\Structural\Facade\Bios;
use DesignPatterns\Structural\Facade\Facade;
use DesignPatterns\Structural\Facade\OperatingSystem;
use PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{
    public function testComputerOn(): void
    {
        /** @var OperatingSystem&MockObject */
        $os = $this->createMock(OperatingSystem::class);

        $os->method('getName')
            ->will($this->returnValue('Linux'));

        /** @var Bios&MockObject */
        $bios = $this->createMock(Bios::class);

        $bios->method('launch')
            ->with($os);

        $facade = new Facade($bios, $os);
        $facade->rurnOn();

        $this->assertSame('Linux', $os->getName());
    }
}
