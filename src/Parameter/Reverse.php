<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project composer
 * @create Created on 2020/9/20 下午5:08
 * @author Nash Gao
 * @namespace Pelias\Parameter
 */

declare(strict_types=1);


namespace Nashgao\Pelias\Parameter;


class Reverse extends AbstractParameter
{
    /**
     * @var string|float $lat
     */
    public $lat;

    /**
     * @var string|float $lon
     */
    public $lon;
}