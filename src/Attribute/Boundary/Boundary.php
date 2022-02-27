<?php

declare(strict_types=1);

namespace Nashgao\Pelias\Attribute\Boundary;

use Nashgao\Pelias\Attribute\Circle;
use Nashgao\Pelias\Attribute\NestedInterface;
use Nashgao\Pelias\Attribute\Point;

class Boundary extends AbstractAttribute implements NestedInterface
{
    public Circle $circle;

    public string $country;

    /**
     * @var float|string
     */
    public $gid;

    public Point $point;

    public Rect $rect;

    public function Circle(): Circle
    {
        return new Circle();
    }

    public function point(): Point
    {
        return new Point();
    }

    public function Rect(): Rect
    {
        return new Rect();
    }
}
