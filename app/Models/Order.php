<?php

namespace App\Models;

use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;
    protected $fillable = [
        'sum',
        'name',
        'phone',
        'comment',
        'street',
        'house',
        'apartment',
        'entrance',
        'house_code',
        'floor',
        'delivery_type',
        'payment_type',
        'time_type',
        'cart',
        'email'
    ];

    protected $casts = [
        'floor' => 'integer',
        'house' => 'integer',
        'apartment' => 'integer',
        'entrance' => 'integer',
        'house_code' => 'integer',
        'delivery_type' => 'integer',
        'payment_type' => 'integer',
        'time_type' => 'integer',
        'sum' => 'integer'
    ];

    public function courier()
    {
        return $this->belongsToMany(Courier::class);
    }

    public static function boot()
    {
        parent::boot();
        Order::observe(new OrderObserver);
    }
}
