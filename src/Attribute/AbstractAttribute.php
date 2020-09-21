<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project pelias
 * @create Created on 2020/9/21 下午5:50
 * @author Nash Gao
 * @namespace Nashgao\Pelias\Attribute
 */

declare(strict_types=1);


namespace Nashgao\Pelias\Attribute;


use Nashgao\Pelias\Exception\InvalidArgumentException;

class AbstractAttribute implements AttributeInterface
{
    public function __invoke(string $field, $value)
    {
        if (! property_exists(static::class, $field)) {
            throw new InvalidArgumentException();
        }

        $this->$field = $value;
    }




}