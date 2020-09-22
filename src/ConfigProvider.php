<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project pelias
 * @create Created on 2020/9/21 下午3:03
 * @author Nash Gao
 * @namespace Nashgao\Pelias
 */

declare(strict_types=1);


namespace Nashgao\Pelias;

use Nashgao\Pelias\Parameter\AutoComplete;
use Nashgao\Pelias\Parameter\Reverse;
use Nashgao\Pelias\Parameter\Search;
use Nashgao\Pelias\PeliasClient\AutoCompleteClient;
use Nashgao\Pelias\PeliasClient\ReverseClient;
use Nashgao\Pelias\PeliasClient\SearchClient;

class ConfigProvider
{
    public function __invoke():array
    {
        return [
            'dependencies' => [
                Search::class => SearchClient::class,
                Reverse::class => ReverseClient::class,
                AutoComplete::class => AutoCompleteClient::class
            ],
            'commands' => [
            ],
            'listeners' => [],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'pelias',
                    'description' => 'pelias configuration',
                    'source' => __DIR__ . '/../publish/pelias.php',
                    'destination' => BASE_PATH . '/config/autoload/pelias.php',
                ],
            ],
        ];
    }
}