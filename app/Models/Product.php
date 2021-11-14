<?php

namespace App\Models;

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
        return $this->belongsTo(Category::class);
    }
    public function consists()
    {
        return $this->hasMany(Consist::class);
    }
    public static function boot()
    {
        parent::boot(); // TODO: refactor with events
        static::creating(function (Product $product) {
            $product->slug = Str::slug($product->name);
        });
    }
}
