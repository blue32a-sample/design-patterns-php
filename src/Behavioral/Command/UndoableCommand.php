<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

Interface UndoableCommand extends Command
{
    public function undo();
}
