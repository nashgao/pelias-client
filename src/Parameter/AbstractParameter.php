<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>.
 * @organization Space Platform
 * @project composer
 * @create Created on 2020/9/21 下午12:00
 * @namespace Pelias\Parameter
 */

declare(strict_types=1);

namespace Nashgao\Pelias\Parameter;

use Hyperf\Utils\Str;
use Nashgao\Pelias\Attribute\Boundary\Boundary;
use Nashgao\Pelias\Attribute\Layers;
use Nashgao\Pelias\Attribute\Sources;
use Nashgao\Pelias\Exception\InvalidServiceTypeException;

abstract class AbstractParameter implements ParameterInterface
{
    public Boundary $boundary;

    public Layers $layers;

    /**
     * size of the request.
     */
    public int $size;

    public Sources $sources;

    public function boundary(): Boundary
    {
        return new Boundary();
    }

    public function layers(): Layers
    {
        return new Layers();
    }

    /**
     * @param $value
     */
    public function set(string $field, $value): self
    {
        // if it is an nested object
        if (Str::contains($field, '.')) {
            $fields = explode('.', $field);
            if (! $this->propertyExists(static::class, $fields[0])) {
                throw new InvalidServiceTypeException("property {$field} does not exist in the class " . __CLASS__);
            }
            // if the attribute is not set, then create a new value
            if (! isset($this->{$fields[0]})) {
                $this->{$fields[0]} = $this->{$fields[0]}();
            }

            if (count($fields) === 2) {
                $this->{$fields[0]}->{$fields[1]} = $value;
            } else {
                if (! isset($this->{$fields[0]}->{$fields[1]})) {
                    $this->{$fields[0]}->{$fields[1]} = $this->{$fields[0]}->{$fields[1]}();
                }
                $this->{$fields[0]}->{$fields[1]}->{$fields[2]} = $value;
            }
            return $this;
        }

        if (! $this->propertyExists(static::class, $field)) {
            throw new InvalidServiceTypeException("property {$field} does not exist in the class " . __CLASS__);
        }

        // if it is not an nested object, check if it's array like
        if (method_exists($this, $field)) {
            // the the field does not exists, then create one and assign value
            if (! isset($this->{$field})) {
                $this->{$field} = $this->{$field}();
            }
            $this->{$field}->{$value} = true;
        } else {
            // normal field like test
            $this->{$field} = $value;
        }
        return $this;
    }

    public function sources(): Sources
    {
        return new Sources();
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * @param $property
     */
    protected function propertyExists(string $class, $property): bool
    {
        return property_exists($class, $property);
    }
}
