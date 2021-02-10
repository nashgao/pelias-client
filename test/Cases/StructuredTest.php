<?php


declare(strict_types=1);


namespace Nashgao\Test\Cases;


use Hyperf\Utils\Coroutine;
use Nashgao\Pelias\ClientFactory;
use Nashgao\Pelias\Parameter\Structured;
use Swoole\Coroutine\Channel;

class StructuredTest extends AbstractTest
{
    public function testStructure()
    {
        $channel = new Channel(1);
        Coroutine::create(function () use ($channel) {
            $searchResult = ClientFactory::create(Structured::class)
                ->where('country', 'australia')
                ->where('region', 'brisbane')
                ->query();
            $channel->push($searchResult);
        });

        $searchResult = $channel->pop();
        $this->assertEquals(200, $searchResult->getStatusCode());
    }
}