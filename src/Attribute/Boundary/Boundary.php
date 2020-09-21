<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project pelias
 * @create Created on 2020/9/21 下午8:24
 * @author Nash Gao
 * @namespace Nashgao\Pelias\Attribute
 */

declare(strict_types=1);


namespace Nashgao\Pelias\Attribute\Boundary;


use Nashgao\Pelias\Attribute\Circle;
use Nashgao\Pelias\Attribute\Point;

class Boundary extends AbstractAttribute
{
    /**
     * @var string
     */
    public string $country;

    /**
     * @var Point
     */
    public Point $point;

    /**
     * @var Rect
     */
    public Rect $rect;

    /**
     * @var Circle
     */
    public Circle $circle;

    /**
     * @var string|float
     */
    public $gid;
}