<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project composer
 * @create Created on 2020/9/20 下午5:19
 * @author Nash Gao
 * @namespace ${NAMESPACE}
 */

declare(strict_types=1);


return [
    'api' => [
        'search' => [
            'endpoint' => '0.0.0.0:4000',
            'max_connection' => 10,
            'retry' => 1,
            'delay' => 10
        ],
        'reverse' => [
            'endpoint' => '0.0.0.0:4000',
            'max_connection' => 10,
            'retry' => 1,
            'delay' => 10
        ],
        'autocomplete' => [
            'endpoint' => '',
            'max_connection' => 10,
            'retry' => 1,
            'delay' => 10
        ],
        'placeholder' => [
            'endpoint' => '0.0.0.0:4100',
            'max_connection' => 10,
            'retry' => 1,
            'delay' => 10
        ]
    ]

];