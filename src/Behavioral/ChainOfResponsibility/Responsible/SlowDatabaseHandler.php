<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility\Responsible;

use DesignPatterns\Behavioral\ChainOfResponsibility\Handler;
use Psr\Http\Message\RequestInterface;

class SlowDatabaseHandler extends Handler
{
    protected function processing(RequestInterface $request): ?string
    {
        return 'Hello World!';
    }
}
