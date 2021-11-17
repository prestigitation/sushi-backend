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
            'preview_image' => 'http://127.0.0.1:8000/storage/images/categories/preview/Pizza.svg',
            'image' => 'http://127.0.0.1:8000/storage/images/categories/image/Pizza.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        1 => [
            'name' => 'Сеты',
            'preview_image' => 'http://127.0.0.1:8000/storage/images/categories/preview/Set.svg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        2 => [
            'name' => 'WOK',
            'preview_image' => 'http://127.0.0.1:8000/storage/images/categories/preview/Wok.svg',
            //'image' => 'http://127.0.0.1:8000/storage/images/categories/image/Wok.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        3 => [
            'name' => 'Роллы',
            'preview_image' => 'http://127.0.0.1:8000/storage/images/categories/preview/Rolls.svg',
            //'image' => 'http://127.0.0.1:8000/storage/images/categories/image/Rolls.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        4 => [
            'name' => 'Суши',
            'preview_image' => 'http://127.0.0.1:8000/storage/images/categories/preview/Sushi.svg',
            //'image' => 'http://127.0.0.1:8000/storage/images/categories/image/Sushi.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        5 => [
            'name' => 'Салаты',
            'preview_image' => 'http://127.0.0.1:8000/storage/images/categories/preview/Salads.svg',
            //'image' => 'http://127.0.0.1:8000/storage/images/categories/image/Salads.jpg',
            'image_small' => 0,
            'in_stock' => 0
        ],
        6 => [
            'name' => 'Супы',
            'preview_image' => 'http://127.0.0.1:8000/storage/images/categories/preview/Soup.svg',
            //'image' => 'http://127.0.0.1:8000/storage/images/categories/image/Soup.jpg',
            'image_small' => 0,
            'in_stock' => 0
        ],
        7 => [
            'name' => 'Корн доги',
            'preview_image' => 'http://127.0.0.1:8000/storage/images/categories/preview/CornDogs.svg',
            'image' => 'http://127.0.0.1:8000/storage/images/categories/image/CornDogs.jpg',
            'image_small' => 1,
            'in_stock' => 1
        ],
        8 => [
            'name' => 'Напитки',
            'preview_image' => 'http://127.0.0.1:8000/storage/images/categories/preview/Drink.svg',
            //'image' => 'http://127.0.0.1:8000/storage/images/categories/image/Drink.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        9 => [
            'name' => 'Акции',
            'preview_image' => 'http://127.0.0.1:8000/storage/images/categories/preview/Discount.svg',
            'image' => 'http://127.0.0.1:8000/storage/images/categories/image/Discount.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ],
        [
            'name' => 'С угрем',
            'image' => 'http://127.0.0.1:8000/storage/images/categories/image/Ugr.jpg',
            'image_small' => 1,
            'in_stock' => 1
        ],
        [
            'name' => 'Чикен',
            'image' => 'http://127.0.0.1:8000/storage/images/categories/image/Chicken.jpg',
            'image_small' => 0,
            'in_stock' => 1
        ]);
        for($i = 0; $i < count($categories); $i++) {
            Category::create([
                'name' => $categories[$i]['name'],
                'preview_image' => $categories[$i]['preview_image'] ?? '',
                'image' => $categories[$i]['image'] ?? '',
                'image_small' => $categories[$i]['image_small'],
                'in_stock' => $categories[$i]['in_stock'],
            ]);
        }
    }
}
