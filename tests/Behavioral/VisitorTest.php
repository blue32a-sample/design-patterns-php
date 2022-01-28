<?php

declare(strict_types=1);

namespace Tests\Behavioral;

use DesignPatterns\Behavioral\Visitor\Group;
use DesignPatterns\Behavioral\Visitor\RecodingVisitor;
use DesignPatterns\Behavioral\Visitor\Role;
use DesignPatterns\Behavioral\Visitor\User;
use PHPUnit\Framework\TestCase;

class VisitorTest extends TestCase
{
    private RecodingVisitor $visitor;

    protected function setUp(): void
    {
        $this->visitor = new RecodingVisitor();
    }

    public function provideRoles(): array
    {
        return [
            [new User('Dominik')],
            [new Group('Administrators')],
        ];
    }

    /**
     * @dataProvider provideRoles
     */
    public function testVisitSomeRole(Role $role): void
    {
        $role->accept($this->visitor);
        $this->assertSame($role, $this->visitor->getVisited()[0]);
    }
}
