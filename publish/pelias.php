<?php

declare(strict_types=1);

return [
    'api' => [
        'search' => [
            'endpoint' => '0.0.0.0:4000',
            'max_connection' => 10,
            'retry' => 1,
            'delay' => 10,
        ],
        'reverse' => [
            'endpoint' => '0.0.0.0:4000',
            'max_connection' => 10,
            'retry' => 1,
            'delay' => 10,
        ],
        'autocomplete' => [
            'endpoint' => '0.0.0.0:4000',
            'max_connection' => 10,
            'retry' => 1,
            'delay' => 10,
        ],
        'placeholder' => [
            'endpoint' => '0.0.0.0:4100',
            'max_connection' => 10,
            'retry' => 1,
            'delay' => 10,
        ],
    ],
];
