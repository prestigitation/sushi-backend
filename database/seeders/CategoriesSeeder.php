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
        $categories = array(
        0 => [
            'name' => 'Пицца',
            'preview_image' => env('APP_PATH').'/images/categories/preview/Pizza.svg',
            'server_image_path' => public_path().'/images/categories/image/Pizza.jpg',
            'image' => env('APP_PATH').'/images/categories/image/Pizza.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        1 => [
            'name' => 'Сеты',
            'preview_image' => env('APP_PATH').'/images/categories/preview/Set.svg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        2 => [
            'name' => 'WOK',
            'preview_image' => env('APP_PATH').'/images/categories/preview/Wok.svg',
            'server_image_path' => public_path().'/images/categories/image/Wok.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        3 => [
            'name' => 'Роллы',
            'preview_image' => env('APP_PATH').'/images/categories/preview/Rolls.svg',
            'server_image_path' => public_path().'/images/categories/image/Rolls.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        4 => [
            'name' => 'Суши',
            'preview_image' => env('APP_PATH').'/images/categories/preview/Sushi.svg',
            'server_image_path' => public_path().'/images/categories/image/Sushi.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        5 => [
            'name' => 'Салаты',
            'preview_image' => env('APP_PATH').'/images/categories/preview/Salads.svg',
            'server_image_path' => public_path().'/images/categories/image/Salads.jpg',
            'image_small' => 0,
            'in_stock' => 0
        ],
        6 => [
            'name' => 'Супы',
            'preview_image' => env('APP_PATH').'/images/categories/preview/Soup.svg',
            'server_image_path' => public_path().'/images/categories/image/Soup.jpg',
            'image_small' => 0,
            'in_stock' => 0
        ],
        7 => [
            'name' => 'Корн доги',
            'preview_image' => env('APP_PATH').'/images/categories/preview/CornDogs.svg',
            'server_image_path' => public_path().'/images/categories/image/CornDogs.jpg',
            'image' => env('APP_PATH').'/images/categories/image/CornDogs.jpg',
            'image_small' => 1,
            'in_stock' => 1
        ],
        8 => [
            'name' => 'Напитки',
            'preview_image' => env('APP_PATH').'/images/categories/preview/Drink.svg',
            'server_image_path' => public_path().'/images/categories/image/Drink.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        9 => [
            'name' => 'Акции',
            'preview_image' => env('APP_PATH').'/images/categories/preview/Discount.svg',
            'server_image_path' => public_path().'/images/categories/image/Discount.jpg',
            'image' => env('APP_PATH').'/images/categories/image/Discount.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        [
            'name' => 'С угрем',
            'server_image_path' => public_path().'/images/categories/image/Ugr.jpg',
            'image' => env('APP_PATH').'/images/categories/image/Ugr.jpg',
            'image_small' => 1,
            'in_stock' => 1
        ],
        [
            'name' => 'Чикен',
            'server_image_path' => public_path().'/images/categories/image/Chicken.jpg',
            'image' => env('APP_PATH').'/images/categories/image/Chicken.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ]);
        for($i = 0; $i < count($categories); $i++) {
            Category::create([
                'name' => $categories[$i]['name'],
                'preview_image' => $categories[$i]['preview_image'] ?? '',
                'server_image_path' => $categories[$i]['server_image_path'] ?? '',
                'image' => $categories[$i]['image'] ?? '',
                'image_small' => $categories[$i]['image_small'],
                'in_stock' => $categories[$i]['in_stock'],
            ]);
        }
    }
}
