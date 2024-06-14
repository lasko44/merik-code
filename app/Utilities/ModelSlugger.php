<?php

namespace App\Utilities;

use Exception;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class ModelSlugger
{

    private const COLUMNS = [
        'url_name',
        'slug'
    ];

    /**
     * @throws Exception
     */
    public static function slug($model, string $string, string $columnName = null): string
    {
        $columnName = $columnName ?? self::inferColumn($model);
        $slug = Str::slug($string);

        return !self::slugExists($model, $slug, $columnName) ?
            $slug :
            $slug. '-'. Str::random(4);
    }

    /**
     * @throws Exception
     */
    private static function inferColumn($model): string
    {
        $columns = Schema::getColumnListing(app($model)->getTable());

        foreach (ModelSlugger::COLUMNS as $item){
            if(in_array($item, $columns)){
                return $item;
            }
        }

        throw new Exception('Cannot Infer Slug Column');
    }

    private static function slugExists($model, string $slug, string $columnName): bool
    {
       return $model::query()->where($columnName, $slug)->count() > 0;
    }

}