<?php


declare(strict_types=1);


namespace Nashgao\Pelias\Attribute;

class Circle extends AbstractAttribute implements NestedInterface
{
    /**
     * @var string|float
     */
    public $lat;

    /**
     * @var string|float
     */
    public $lon;

    /**
     * @var string|float
     */
    public $radius;
}
