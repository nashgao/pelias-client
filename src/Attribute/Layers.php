<?php


declare(strict_types=1);


namespace Nashgao\Pelias\Attribute;

class Layers extends AbstractAttribute implements ArrayLikeInterface
{
    public bool $venue;

    public bool $address;

    public bool $street;

    public bool $neighbourhood;

    public bool $borough;

    public bool $localadmin;

    public bool $locality;

    public bool $county;

    public bool $macrocounty;

    public bool $region;

    public bool $country;

    public bool $coarse;

    public bool $postalcode;
}
