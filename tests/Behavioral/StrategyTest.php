<?php

declare(strict_types=1);

namespace Tests\Behavioral;

use DesignPatterns\Behavioral\Strategy\Context;
use DesignPatterns\Behavioral\Strategy\DateComparator;
use DesignPatterns\Behavioral\Strategy\IdComparator;
use PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase
{
    public function provideIntegers(): array
    {
        return [
            [
                [['id' => 2,], ['id' => 1], ['id' => 3]],
                ['id' => 1],
            ],
            [
                [['id' => 3], ['id' => 2], ['id' => 1]],
                ['id' => 1],
            ],
        ];
    }

    public function provideDates(): array
    {
        return [
            [
                [['date' => '2020-03-03'], ['date' => '2021-03-02'], ['date' => '2019-03-01']],
                ['date' => '2019-03-01'],
            ],
            [
                [['date' => '2020-02-03'], ['date' => '2019-02-01'], ['date' => '2021-02-02']],
                ['date' => '2019-02-01'],
            ],
        ];
    }

    /**
     * @dataProvider provideIntegers
     */
    public function testIdComparator($collection, $expected): void
    {
        $obj = new Context(new IdComparator());
        $elements = $obj->executeStrategy($collection);

        $firstElement = array_shift($elements);
        $this->assertSame($expected, $firstElement);
    }

    /**
     * @dataProvider provideDates
     */
    public function testDateComparator($collection, $expected): void
    {
        $obj = new Context(new DateComparator());
        $elements = $obj->executeStrategy($collection);

        $firstElement = array_shift($elements);
        $this->assertSame($expected, $firstElement);
    }
}
