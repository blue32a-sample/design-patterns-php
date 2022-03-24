<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

class Invoker
{
    private Command $command;

    public function setCommand(Command $cmd)
    {
        $this->command = $cmd;
    }

    public function run()
    {
        $this->command->execute();
    }
}
