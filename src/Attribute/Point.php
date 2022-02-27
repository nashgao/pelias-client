<?php

declare(strict_types=1);

namespace Nashgao\Pelias\Attribute;

class Point extends AbstractAttribute implements NestedInterface
{
    /**
     * @var float|string
     */
    public $lat;

    /**
     * @var float|string
     */
    public $lon;
}
