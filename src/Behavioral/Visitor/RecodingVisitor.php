<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor;

class RecodingVisitor implements RoleVistor
{
    private array $visited = [];

    public function visitGroup(Group $role)
    {
        $this->visited[] = $role;
    }

    public function visitUser(User $role)
    {
        $this->visited[] = $role;
    }

    public function getVisited(): array
    {
        return $this->visited;
    }
}
