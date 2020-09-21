<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project composer
 * @create Created on 2020/9/20 下午5:06
 * @author Nash Gao
 * @namespace Pelias
 */

declare(strict_types=1);


namespace Nashgao\Pelias;


use Hyperf\Contract\ConfigInterface;
use Hyperf\Utils\ApplicationContext;
use Nashgao\Pelias\Exception\InvalidServiceTypeException;
use Psr\Container\ContainerInterface;

class ClientFactory
{

    /**
     * @param string $serviceType
     * @return Client
     */
    public static function create(string $serviceType):Client
    {
        $container = ApplicationContext::getContainer()->get(ContainerInterface::class);
        /** @var ConfigInterface $config */
        $config = $container->get(ConfigInterface::class);

        if (! array_key_exists($serviceType, $config->get('pelias.api'))) {
            throw new InvalidServiceTypeException('invalid service type');
        }

        return ApplicationContext::getContainer()->get($serviceType)->buildWith($serviceType);
    }
}