<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project pelias
 * @create Created on 2020/9/21 下午3:27
 * @author Nash Gao
 * @namespace ${NAMESPACE}
 */

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

$class = new \Nashgao\Pelias\ClientFactory();
var_dump($class);