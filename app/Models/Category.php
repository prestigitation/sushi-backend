<?php

namespace App\Models;

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
        return $this->hasMany(Product::class);
    }
    public static function boot()
    {
        parent::boot(); // TODO: refactor with events
        static::creating(function (Category $category) {
            $category->slug = Str::slug($category->name);
        });
    }
}
