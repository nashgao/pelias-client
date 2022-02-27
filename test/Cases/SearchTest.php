<?php

declare(strict_types=1);

namespace Nashgao\Test\Cases;

use Hyperf\Utils\Coroutine;
use Nashgao\Pelias\ClientFactory;
use Nashgao\Pelias\Parameter\Search;
use Swoole\Coroutine\Channel;

/**
 * @internal
 * @coversNothing
 */
class SearchTest extends AbstractTest
{
    public function testCombination()
    {
        // test the search with the focus.point.lat and focus.point.lon
        $channel = new Channel(1);
        Coroutine::create(function () use ($channel) {
            $searchResult = ClientFactory::create(Search::class)
                ->where('focus.point.lat', '-27.42')
                ->where('focus.point.lon', '153.02')
                ->where('sources', 'osm')
                ->where('text', 'brisbane')
                ->query();
            $channel->push($searchResult);
        });
        $searchResult = $channel->pop();
        $this->assertEquals(200, $searchResult->getStatusCode());
    }

    public function testSearch()
    {
        $channel = new Channel(1);
        Coroutine::create(function () use ($channel) {
            $searchResult = ClientFactory::create(Search::class)
                ->where('text', 'brisbane')
                ->query();
            $channel->push($searchResult);
        });
        $searchResult = $channel->pop();
        $this->assertEquals(200, $searchResult->getStatusCode());
    }

    public function testSearchWithNestedStruct()
    {
        // test the search with the focus.point.lat and focus.point.lon
        $channel = new Channel(1);
        Coroutine::create(function () use ($channel) {
            $searchResult = ClientFactory::create(Search::class)
                ->where('focus.point.lat', '-27.42')
                ->where('focus.point.lon', '153.02')
                ->where('text', 'brisbane')
                ->query();
            $channel->push($searchResult);
        });
        $searchResult = $channel->pop();
        $this->assertEquals(200, $searchResult->getStatusCode());
    }

    public function testSearchWithSources()
    {
        $channel = new Channel(1);
        Coroutine::create(function () use ($channel) {
            $searchResult = ClientFactory::create(Search::class)
                ->where('text', 'brisbane')
                ->where('sources', 'osm')
                ->query();
            $channel->push($searchResult);
        });
        $searchResult = $channel->pop();
        $this->assertEquals(200, $searchResult->getStatusCode());
    }
}
