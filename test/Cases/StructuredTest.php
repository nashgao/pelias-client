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
 * @namespace Nashgao\Test\Cases
 */

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