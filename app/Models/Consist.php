<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consist extends Model
{
    use HasFactory;
    protected $casts = [
        'ingredients' => 'array'
    ];
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
