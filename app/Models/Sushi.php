<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sushi extends Model
{
    public $timestamps = false;
    protected $casts = [
        'consist' => 'array'
    ];
    use HasFactory;
    public function categories() {
        return $this->belongsTo(Category::class);
    }
}
