<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project pelias
 * @create Created on 2020/9/21 下午8:38
 * @author Nash Gao
 * @namespace Nashgao\Pelias\Attribute
 */

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