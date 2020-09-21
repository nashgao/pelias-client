<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project composer
 * @create Created on 2020/9/20 下午5:53
 * @author Nash Gao
 * @namespace ${NAMESPACE}
 */

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
// an example of forward search

use Nashgao\Pelias\ClientFactory;
use Nashgao\Pelias\Parameter\Search;


//$result = ClientFactory::create(Search::class)->where('text', 'brisbane')->query()->getBody()->getContents();
//var_dump($result);