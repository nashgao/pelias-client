<?php


declare(strict_types=1);


namespace Nashgao\Test\Cases;

use Hyperf\Utils\Coroutine;
use Nashgao\Pelias\ClientFactory;
use Nashgao\Pelias\Parameter\Reverse;
use Swoole\Coroutine\Channel;

class ReverseTest extends AbstractTest
{
    public function testReverse()
    {
        $channel = new Channel(1);
        Coroutine::create(function () use ($channel) {
            $searchResult = ClientFactory::create(Reverse::class)
                ->where('point.lat', '-27.42')
                ->where('point.lon', '153')
                ->query();
            $channel->push($searchResult);
        });

        $searchResult = $channel->pop();
        $this->assertEquals(200, $searchResult->getStatusCode());
    }
}
