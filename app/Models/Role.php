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
        'Пользователь' => self::ROLE_USER,
        'Администратор' => self::ROLE_ADMIN,
        'Курьер' => self::ROLE_COURIER
    ];
    const ADMIN_PANEL_ROLES_LIST = [
        ROLE::ROLE_ADMIN,
        ROLE::ROLE_COURIER
    ];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
