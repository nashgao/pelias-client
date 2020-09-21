<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project composer
 * @create Created on 2020/9/21 下午12:00
 * @author Nash Gao
 * @namespace Pelias\Parameter
 */

declare(strict_types=1);


namespace Nashgao\Pelias\Parameter;


use Pelias\Exception\InvalidServiceTypeException;

abstract class AbstractParameter implements ParameterInterface
{
    /**
     * @param string $field
     * @param $value
     * @return self
     */
    public function set(string $field, $value): self
    {
        if (! property_exists(__CLASS__, $field)) {
            throw new InvalidServiceTypeException("property $field does not exist in the class " . __CLASS__ );
        }
        $this->$field = $value;
        return $this;
    }

    /**
     *
     */
    public function toArray():array
    {
        // TODO: Implement toArray() method.
    }
}