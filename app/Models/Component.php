<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Component extends Model
{
    use HasFactory;
    public $timestamps = false;

    //region Relationships

    public function componentProps() :HasMany
    {
        return $this->hasMany(ComponentProps::class);
    }

    //endregion
}