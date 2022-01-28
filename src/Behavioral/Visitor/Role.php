<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor;

Interface Role
{
    public function accept(RoleVistor $visitor);
}
