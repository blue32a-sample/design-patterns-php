<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor;

Interface RoleVistor
{
    public function visitUser(User $role);

    public function visitGroup(Group $role);
}
