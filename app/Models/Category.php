<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $casts = [
        'sushis' => 'array'
    ];
    use HasFactory;
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
