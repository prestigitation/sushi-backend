<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, HasEvents;

    public $timestamps = false;

    protected $guarded = false;

    protected $fillable = [
        'name',
        'slug',
        'image_path',
        'price',
        'discount_price',
        'gram_count',
        'pieces_count',
        'consist',
    ];
    protected $casts = [
        'consist' => 'array'
    ];


    public function categories() {
        return $this->belongsToMany(Category::class);
    }
    public function consists()
    {
        return $this->belongsToMany(Consist::class);
    }



    public function scopeSushi($query) {
        return $query->where('gram_count', '>', 0)
                        ->where('pieces_count', '>', 0)
                        ->whereNotNull('name')
                        ->whereNotNull('image_path')
                        ->whereNotNull('price');
    }
    public static function boot()
    {
        parent::boot();
        Product::observe(new ProductObserver);
    }
}
