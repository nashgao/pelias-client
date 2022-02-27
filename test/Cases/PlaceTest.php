<?php

declare(strict_types=1);

namespace Nashgao\Test\Cases;

use Hyperf\Utils\Coroutine;
use Nashgao\Pelias\ClientFactory;
use Nashgao\Pelias\Parameter\Place;
use Swoole\Coroutine\Channel;

/**
 * @internal
 * @coversNothing
 */
class PlaceTest extends AbstractTest
{
    public function testPlace()
    {
        $channel = new Channel(1);
        Coroutine::create(function () use ($channel) {
            $searchResult = ClientFactory::create(Place::class)
                ->where('text', 'bris')
                ->query();
            $channel->push($searchResult);
        });

        $searchResult = $channel->pop();
        $this->assertEquals(200, $searchResult->getStatusCode());
    }
}
