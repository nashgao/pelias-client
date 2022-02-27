<?php

declare(strict_types=1);

namespace Nashgao\Pelias\Attribute;

class Circle extends AbstractAttribute implements NestedInterface
{
    /**
     * @var float|string
     */
    public $lat;

    /**
     * @var float|string
     */
    public $lon;

    /**
     * @var float|string
     */
    public $radius;
}
