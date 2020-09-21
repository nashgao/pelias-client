<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>
 * @organization Space Platform
 * @project composer
 * @create Created on 2020/9/20 下午5:40
 * @author Nash Gao
 * @namespace ${NAMESPACE}
 */

declare(strict_types=1);
 


use Hyperf\Utils\Context;
use Pelias\Parameter\ParameterInterface;


if (! function_exists('getPelias')) {
    /**
     * @return ParameterInterface
     */
    function getPelias ()
    {
        return Context::get('pelias');
    }
}

/** 
 *  
 */
if (! function_exists('setPelias')) {
    /**
     * @param ParameterInterface $parameter
     * @return mixed
     */
    function setPelias (ParameterInterface $parameter)
    {
        // check if it's been set before, if so then destroy the previous one
        return Context::has('pelias') ?
                Context::override('pelias', function (ParameterInterface $parameter) {
                    return $parameter;
                }) :
                Context::set('pelias', $parameter);
    }
}