<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project pelias
 * @create Created on 2020/9/21 下午4:04
 * @author Nash Gao
 * @namespace HyperfTest\Cases
 */

declare(strict_types=1);


namespace HyperfTest\Cases;


use Nashgao\Pelias\ClientFactory;
use Nashgao\Pelias\Parameter\Search;

class SearchTest extends AbstractTest
{
    public function testSearch()
    {
        $searchResult = ClientFactory::create(Search::class)->where('text', 'brisbane');
        var_dump($searchResult);
    }
}