<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Sushi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sushis = [];
        $sushiCount = 3;
        $categiesCount = 3;
        for($i = 0; $i < $sushiCount; $i++) {
            $categoryName = "Категория $i";
            array_push($sushis,new Sushi([
            'name' => $categoryName,
            'slug' => Str::slug($categoryName),
            'image_path' => '',
            'price' => 50,
            'discount_price' => 35,
            'gram_count' => 1250, // кол-во грамм
            'pieces_count' => 4, // количество кусочков
            'consist' => [],
            ]));
        }
        for($j = 0; $j < $categiesCount; $j++) {
            Category::create([
                'name' => $sushis[$j]['name'],
                'image_path' => public_path('img\CategoryBanner.svg'),
                'is_able' => true,
                'sushis' => $sushis
            ]);
        }
    }
}
