<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project pelias
 * @create Created on 2020/9/21 下午8:32
 * @author Nash Gao
 * @namespace Nashgao\Pelias\Attribute\Boundary
 */

declare(strict_types=1);


namespace Nashgao\Pelias\Attribute\Boundary;

use Nashgao\Pelias\Attribute\AbstractAttribute;
use Nashgao\Pelias\Attribute\NestedInterface;

class Rect extends AbstractAttribute implements NestedInterface
{
    /**
     * @var string|float
     */
    public $min_lat;

    /**
     * @var string|float
     */
    public $min_lon;

    /**
     * @var string|float
     */
    public $max_lat;

    /**
     * @var string|float
     */
    public $max_lon;
}