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


    public function isAdmin(): bool
    {
        return $this->id === 4 || $this->id === 5;
    }

    public function isSuperAdmin(): bool
    {
        return $this->id === 5;
    }

}
