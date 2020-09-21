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


use Hyperf\Utils\Str;
use Nashgao\Pelias\Exception\InvalidServiceTypeException;

abstract class AbstractParameter implements ParameterInterface
{
    /**
     * @param string $field
     * @param $value
     * @return self
     */
    public function set(string $field, $value): self
    {
        if (Str::contains($field, '.')) {
            $fields = explode('.', $field);
            if (! $this->propertyExists(static::class, $fields[0])) {
                throw new InvalidServiceTypeException("property $field does not exist in the class " . __CLASS__ );
            } else {
                // if the attribute is not set, then create a new value
                if (! isset($this->{$fields[0]})) {
                    $this->{$fields[0]} = $this->{$fields[0]}();
                }

                $this->{$fields[0]}->{$fields[1]} = $value;
                return $this;
            }
        } else if (! $this->propertyExists(static::class, $field)) {
            throw new InvalidServiceTypeException("property $field does not exist in the class " . __CLASS__ );
        } else {
            $this->$field = $value;
            return $this;
        }
    }

    /**
     * @return array
     */
    public function toArray():array
    {
        return get_object_vars($this);
    }

    /**
     * @param string $class
     * @param $property
     * @return bool
     */
    protected function propertyExists(string $class, $property):bool
    {
        return property_exists($class, $property);
    }
}