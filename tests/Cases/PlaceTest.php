<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project pelias
 * @create Created on 2020/9/28 下午1:59
 * @author Nash Gao
 * @namespace HyperfTest\Cases
 */

declare(strict_types=1);


namespace HyperfTest\Cases;


use Hyperf\Utils\Coroutine;
use Nashgao\Pelias\ClientFactory;
use Nashgao\Pelias\Parameter\Place;
use Swoole\Coroutine\Channel;

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