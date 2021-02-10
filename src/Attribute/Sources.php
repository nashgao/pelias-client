<?php


declare(strict_types=1);


namespace Nashgao\Pelias\Attribute;

class Sources extends AbstractAttribute implements ArrayLikeInterface
{
    public bool $osm;

    public bool $oa;

    public bool $gn;

    public bool $wof;
}
