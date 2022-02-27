<?php
/**
 * Copyright (C) SPACE Platform PTY LTD - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Nash Gao <nash@spaceplaform.co>.
 * @organization Space Platform
 * @project composer
 * @create Created on 2020/9/20 下午5:08
 * @namespace ${NAMESPACE}
 */

declare(strict_types=1);

namespace Nashgao\Pelias\Parameter;

use Nashgao\Pelias\Attribute\Focus\Focus;

class Search extends AbstractParameter
{
    public Focus $focus;

    public string $text;

    public function focus(): Focus
    {
        return new Focus();
    }
}
