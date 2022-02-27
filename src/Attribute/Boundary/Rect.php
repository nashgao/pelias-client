<?php

declare(strict_types=1);

namespace Nashgao\Pelias\Attribute\Boundary;

use Nashgao\Pelias\Attribute\AbstractAttribute;
use Nashgao\Pelias\Attribute\NestedInterface;

class Rect extends AbstractAttribute implements NestedInterface
{
    /**
     * @var float|string
     */
    public $max_lat;

    /**
     * @var float|string
     */
    public $max_lon;

    /**
     * @var float|string
     */
    public $min_lat;

    /**
     * @var float|string
     */
    public $min_lon;
}
