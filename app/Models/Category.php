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
    public function sushis()
    {
        return $this->hasMany(Sushi::class);
    }
}
