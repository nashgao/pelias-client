<?php

declare(strict_types=1);

namespace Nashgao\Pelias\Parameter;

class Place extends AbstractParameter
{
    public string $address;

    public string $borough;

    public string $country;

    public string $county;

    public string $locality;

    public string $neighbourhood;

    public string $postalcode;

    public string $region;
}
