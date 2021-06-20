<?php

namespace Tests;

use DesignPatterns\Example;
use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    public function testExample(): void
    {
        $example = new Example();
        $this->assertEquals('example', $example->example());
    }
}
