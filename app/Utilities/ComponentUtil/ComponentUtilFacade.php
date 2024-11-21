<?php

namespace App\Utilities\ComponentUtil;

use Illuminate\Support\Facades\Facade;

/**
 * @method static getComponentDirectories()
 * @method static getComponentContents(array|string|null $payload)
 */
class ComponentUtilFacade extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return ComponentUtil::class;
    }
}