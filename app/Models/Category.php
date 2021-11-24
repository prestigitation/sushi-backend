<?php

namespace App\Models;

use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    const SETS = 2;

    public $timestamps = false;
    protected $casts = [
        'sushis' => 'array'
    ];
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public static function boot()
    {
        parent::boot();
        Category::observe(new CategoryObserver);
    }
}
