<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends User
{
    use HasFactory;

    protected $table = 'users';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->whereRelation('role', 'role_id', '=', Role::ROLE_COURIER);
        });
    }
}
