<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 */
class UserType extends Model
{

    protected $guarded = ['id'];


    public function isComponentAdmin(): bool
    {
        return $this->id === 1 || $this->id === 2;
    }
}
