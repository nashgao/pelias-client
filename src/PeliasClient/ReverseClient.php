<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project composer
 * @create Created on 2020/9/20 下午5:11
 * @author Nash Gao
 * @namespace Pelias\PeliasClient
 */

declare(strict_types=1);


namespace Nashgao\Pelias\PeliasClient;

use Nashgao\Pelias\Client;

class ReverseClient extends Client
{
    protected string $connection = 'reverse';
}
