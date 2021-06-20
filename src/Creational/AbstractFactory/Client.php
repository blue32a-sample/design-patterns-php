<?php

namespace DesignPatterns\Creational\AbstractFactory;

class Client
{
    protected function execute(WriterFactory $factory): void
    {
        $csvWriter = $factory->createCsvWriter();
        $csv = $csvWriter->write(['aaa', 'bbb', 'ccc']);
        var_dump($csv);

        $jsonWriter = $factory->createJsonWriter();
        $json = $jsonWriter->write(['key' => 'value'], false);
        var_dump($json);
    }

    public function executeUnix(): void
    {
        $this->execute(new UnixWriterFactory());
    }

    public function executeWin(): void
    {
        $this->execute(new WinWriterFactory());
    }
}
