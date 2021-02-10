<?php


declare(strict_types=1);


namespace Nashgao\Pelias\Attribute\Boundary;

use Nashgao\Pelias\Attribute\Circle;
use Nashgao\Pelias\Attribute\NestedInterface;
use Nashgao\Pelias\Attribute\Point;

class Boundary extends AbstractAttribute implements NestedInterface
{
    /**
     * @var string
     */
    public string $country;

    /**
     * @var Point
     */
    public Point $point;

    /**
     * @var Rect
     */
    public Rect $rect;

    /**
     * @var Circle
     */
    public Circle $circle;

    /**
     * @var string|float
     */
    public $gid;

    /**
     * @return Point
     */
    public function point():Point
    {
        return new Point();
    }

    /**
     * @return Rect
     */
    public function Rect():Rect
    {
        return new Rect();
    }

    /**
     * @return Circle
     */
    public function Circle():Circle
    {
        return new Circle();
    }
}
