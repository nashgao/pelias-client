<?php

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
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                Search::class => SearchClient::class,
                Reverse::class => ReverseClient::class,
                AutoComplete::class => AutoCompleteClient::class,
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
