<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consist extends Model
{
    use HasFactory;

    public $timestamps = false;

    const CONSIST_LOSOS = 1;
    const CONSIST_PHILADELPHIA = 2;
    const CONSIST_CUCUMBER = 3;
    const CONSIST_AVOCADO = 4;

    const CONSIST_LIST = [
        'Лосось' => self::CONSIST_LOSOS,
        'сыр "Филадельфия"' => self::CONSIST_PHILADELPHIA,
        'огурец' => self::CONSIST_CUCUMBER,
        'авокадо' => self::CONSIST_AVOCADO
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
