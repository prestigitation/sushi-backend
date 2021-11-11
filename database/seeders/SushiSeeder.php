<?php

namespace Database\Seeders;

use App\Models\Sushi;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SushiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sushiCount = 3;
        for($i = 0; $i < $sushiCount; $i++) {
            $sushiName = "Суши $i";
            Sushi::create([
            'name' => $sushiName,
            'slug' => Str::slug($sushiName),
            'image_path' => public_path('img\Sushi.svg'),
            'price' => 50,
            'discount_price' => 35,
            'gram_count' => 1250, // кол-во грамм
            'pieces_count' => 4, // количество кусочков
            'consist' => [],
            ]);
        }
    }
}
