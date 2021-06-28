<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod;

abstract class Journey
{
    /** @var string[] */
    private array $thingsTodo = [];

    final public function takeATrip()
    {
        $this->thingsTodo[] = $this->buyAFlight();
        $this->thingsTodo[] = $this->takePlane();
        $this->thingsTodo[] = $this->enjoyVacation();
        $buyGift = $this->buyGift();

        if ($buyGift !== null) {
            $this->thingsTodo[] = $buyGift;
        }

        $this->thingsTodo[] = $this->takePlane();
    }

    abstract protected function enjoyVacation(): string;

    protected function buyGift(): ?string
    {
        return null;
    }

    private function buyAFlight(): string
    {
        return 'Buy a flight ticket';
    }

    private function takePlane(): string
    {
        return 'Taking the plane';
    }

    public function getThingsToDo(): array
    {
        return $this->thingsTodo;
    }
}
