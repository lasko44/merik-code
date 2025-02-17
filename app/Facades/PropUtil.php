<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static inferVueComponentProps(string $path)
 * @method static readCommonJs()
 */
class PropUtil extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \App\Utilities\PropUtils\PropUtil::class;
    }

}