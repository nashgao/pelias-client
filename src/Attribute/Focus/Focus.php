<?php

declare(strict_types=1);

namespace Nashgao\Pelias\Attribute\Focus;

use Nashgao\Pelias\Attribute\AbstractAttribute;
use Nashgao\Pelias\Attribute\NestedInterface;
use Nashgao\Pelias\Attribute\Point;

class Focus extends AbstractAttribute implements NestedInterface
{
    public Point $point;

    public function point(): Point
    {
        return new Point();
    }
}
