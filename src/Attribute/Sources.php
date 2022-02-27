<?php

declare(strict_types=1);

namespace Nashgao\Pelias\Attribute;

class Sources extends AbstractAttribute implements ArrayLikeInterface
{
    public bool $gn;

    public bool $oa;

    public bool $osm;

    public bool $wof;
}
