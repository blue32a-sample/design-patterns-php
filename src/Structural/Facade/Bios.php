<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade;

Interface Bios
{
    public function execute();

    public function waitForKeyPress();

    public function launch(OperatingSystem $os);

    public function powerDown();
}
