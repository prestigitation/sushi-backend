<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;
    const ROLE_COURIER = 3;
    const ROLES_LIST = [
        'ROLE_USER' => self::ROLE_USER,
        'ROLE_ADMIN' => self::ROLE_ADMIN,
        'ROLE_COURIER' => self::ROLE_COURIER
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
