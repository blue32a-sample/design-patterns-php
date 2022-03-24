<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

class HelloCommand implements Command
{
    public function __construct(private Receiver $output)
    {
    }

    public function execute()
    {
        $this->output->write('Hello World');
    }
}
