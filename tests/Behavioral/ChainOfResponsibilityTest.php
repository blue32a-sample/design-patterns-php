<?php

declare(strict_types=1);

namespace Tests\Behavioral;

use DesignPatterns\Behavioral\ChainOfResponsibility\Handler;
use DesignPatterns\Behavioral\ChainOfResponsibility\Responsible\HttpInMemoryCacheHandler;
use DesignPatterns\Behavioral\ChainOfResponsibility\Responsible\SlowDatabaseHandler;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

class ChainOfResponsibilityTest extends TestCase
{
    private Handler $chain;

    protected function setUp(): void
    {
        $this->chain = new HttpInMemoryCacheHandler(
            ['/foo/bar?index=1' => 'Hello In Memory!'],
            new SlowDatabaseHandler()
        );
    }

    public function testCanRequestKeyInFastStorage(): void
    {
        /** @var UriInterface&MockObject $uri */
        $uri = $this->createMock(UriInterface::class);
        $uri->method('getPath')->willReturn('/foo/bar');
        $uri->method('getQuery')->willReturn('index=1');

        /** @var RequestInterface&MockObject $request */
        $request = $this->createMock(RequestInterface::class);
        $request->method('getMethod')
            ->willReturn('GET');
        $request->method('getUri')->willReturn($uri);

        $this->assertSame('Hello In Memory!', $this->chain->handle($request));
    }

    public function testCanRequestKeyInSlowStorage(): void
    {
        /** @var UriInterface&MockObject $uri */
        $uri = $this->createMock(UriInterface::class);
        $uri->method('getPath')->willReturn('/foo/baz');
        $uri->method('getQuery')->willReturn('');

        /** @var RequestInterface&MockObject $request */
        $request = $this->createMock(RequestInterface::class);
        $request->method('getMethod')
            ->willReturn('GET');
        $request->method('getUri')->willReturn($uri);

        $this->assertSame('Hello World!', $this->chain->handle($request));
    }
}
