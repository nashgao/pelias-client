<?php


declare(strict_types=1);


namespace Nashgao\Pelias\Attribute;

class Point extends AbstractAttribute implements NestedInterface
{
    /**
     * @var string|float
     */
    public $lat;

    /**
     * @var string|float
     */
    public $lon;
}
