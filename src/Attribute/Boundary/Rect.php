<?php


declare(strict_types=1);


namespace Nashgao\Pelias\Attribute\Boundary;

use Nashgao\Pelias\Attribute\AbstractAttribute;
use Nashgao\Pelias\Attribute\NestedInterface;

class Rect extends AbstractAttribute implements NestedInterface
{
    /**
     * @var string|float
     */
    public $min_lat;

    /**
     * @var string|float
     */
    public $min_lon;

    /**
     * @var string|float
     */
    public $max_lat;

    /**
     * @var string|float
     */
    public $max_lon;
}
