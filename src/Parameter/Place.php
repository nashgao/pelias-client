<?php


declare(strict_types=1);


namespace Nashgao\Pelias\Parameter;

class Place extends AbstractParameter
{
    /**
     * @var string
     */
    public string $address;

    /**
     * @var string
     */
    public string $neighbourhood;

    /**
     * @var string
     */
    public string $borough;

    /**
     * @var string
     */
    public string $locality;

    /**
     * @var string
     */
    public string $county;

    /**
     * @var string
     */
    public string $region;

    /**
     * @var string
     */
    public string $postalcode;

    /**
     * @var string
     */
    public string $country;
}
