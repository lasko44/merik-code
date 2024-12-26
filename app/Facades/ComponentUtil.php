<?php

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static getComponentDirectories()
 * @method static getComponentContents(array|string|null $payload)
 */
class ComponentUtil extends Facade
{

    protected static function getFacadeAccessor(): string
    {
        return \App\Utilities\ComponentUtil::class;
    }
}