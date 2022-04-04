<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Pool;

use Countable;

class WorkerPool implements Countable
{
    /**
     * @var StringReverseWorker[]
     */
    private array $occupiedWorkers = [];

    /**
     * @var StringReverseWorker[]
     */
    private array $freeWorkers = [];

    public function get(): StringReverseWorker
    {
        if (count($this->freeWorkers) === 0) {
            $woker = new StringReverseWorker();
        } else {
            $woker = array_pop($this->freeWorkers);
        }

        $this->occupiedWorkers[spl_object_hash($woker)] = $woker;

        return $woker;
    }

    public function dispose(StringReverseWorker $woker): void
    {
        $key = spl_object_hash($woker);

        if (isset($this->occupiedWorkers[$key])) {
            unset($this->occupiedWorkers[$key]);
            $this->freeWorkers[$key] = $woker;
        }
    }

    public function count(): int
    {
        return count($this->occupiedWorkers) + count($this->freeWorkers);
    }
}
