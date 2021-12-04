<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public $timestamps = false;
    const STATUS_NOT_ACCEPTED = 1;
    const STATUS_DELEGATED = 2;
    const STATUS_IN_PROCESS = 3;
    const STATUS_DELIVERED = 4;

    const STATUS_LIST = [
        'Не обработано' => self::STATUS_NOT_ACCEPTED,
        'Делегировано' => self::STATUS_DELEGATED,
        'В процессе' => self::STATUS_IN_PROCESS,
        'Доставлено' => self::STATUS_DELIVERED,
    ];


    public function order()
    {
        return $this->hasOne(Order::class, 'status_id');
    }
}
