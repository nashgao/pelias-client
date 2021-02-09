<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project pelias
 * @create Created on 2020/9/21 下午5:06
 * @author Nash Gao
 * @namespace Nashgao\Test\Cases
 */

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
