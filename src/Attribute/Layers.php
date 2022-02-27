<?php

declare(strict_types=1);

namespace Nashgao\Pelias\Attribute;

class Layers extends AbstractAttribute implements ArrayLikeInterface
{
    public bool $address;

    public bool $borough;

    public bool $coarse;

    public bool $country;

    public bool $county;

    public bool $localadmin;

    public bool $locality;

    public bool $macrocounty;

    public bool $neighbourhood;

    public bool $postalcode;

    public bool $region;

    public bool $street;

    public bool $venue;
}
