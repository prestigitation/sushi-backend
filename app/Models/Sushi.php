<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sushi extends Model
{
    use HasFactory;

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
    protected static function booted()
    {
        static::created(function ($user) {
            $user->slug = Str::slug($user->slug);
        });
    }
}
