<?php

declare(strict_types=1);

namespace Nashgao\Test\Cases;

use Hyperf\Utils\Coroutine;
use Nashgao\Pelias\ClientFactory;
use Nashgao\Pelias\Parameter\AutoComplete;
use Swoole\Coroutine\Channel;

/**
 * @internal
 * @coversNothing
 */
class AutoCompleteTest extends AbstractTest
{
    public function testAutoComplete()
    {
        $channel = new Channel(1);
        Coroutine::create(function () use ($channel) {
            $searchResult = ClientFactory::create(AutoComplete::class)
                ->where('text', 'bris')
                ->query();
            $channel->push($searchResult);
        });

        $searchResult = $channel->pop();
        $this->assertEquals(200, $searchResult->getStatusCode());
    }

    public function testAutoCompleteWithPoint()
    {
        $channel = new Channel(1);
        Coroutine::create(function () use ($channel) {
            $searchResult = ClientFactory::create(AutoComplete::class)
                ->where('text', 'bris')
                ->where('focus.point.lat', '-27.42')
                ->where('focus.point.lon', '153')
                ->query();
            $channel->push($searchResult);
        });

        $searchResult = $channel->pop();
        $this->assertEquals(200, $searchResult->getStatusCode());
    }
}
