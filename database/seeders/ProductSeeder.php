<?php

namespace Database\Seeders;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Consist;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sushiSets = [
            [
                'name' => 'Лосось сет',
                'gram_count' => 1050,
                'pieces_count' => 36,
                'price' => 1500,
                'discount_price' => 0,
            ],
            [
                'name' => 'Филадельфия и лосось сет',
                'gram_count' => 1260,
                'pieces_count' => 36,
                'price' => 1150,
                'discount_price' => 0,
                'server_image_path' => public_path().'/images/products/sets/philadelphia_i_losos.jpg',
                'image_path' => env('APP_PATH').'/images/products/sets/philadelphia_i_losos.jpg'
            ],
            [
                'name' => 'Самая большая Филадельфия',
                'gram_count' => 2050,
                'pieces_count' => 45,
                'price' => 2100,
                'discount_price' => 0,
                'server_image_path' => public_path().'/images/products/sets/big_philadelphia.jpg',
                'image_path' => env('APP_PATH').'/images/products/sets/big_philadelphia.jpg'
            ],
            [
                'name' => 'Сет "5 Филадельфий"',
                'gram_count' => 1120,
                'pieces_count' => 40,
                'price' => 1499,
                'discount_price' => 0,
            ],
            [
                'name' => 'Саломон сет',
                'gram_count' => 1050,
                'pieces_count' => 30,
                'price' => 1500,
                'discount_price' => 0,
                'consist' => [
                    Consist::CONSIST_AVOCADO,
                    Consist::CONSIST_CUCUMBER,
                    Consist::CONSIST_PHILADELPHIA,
                    Consist::CONSIST_LOSOS
                ]
            ],
            [
                'name' => 'Якудза сет',
                'gram_count' => 1270,
                'pieces_count' => 5,
                'price' => 1499,
                'discount_price' => 0,
                'server_image_path' => public_path().'/images/products/sets/yakuza.jpg',
                'image_path' => env('APP_PATH').'/images/products/sets/yakuza.jpg'
                ],
                [
                'name' => 'Филадельфия LOVE сет',
                'gram_count' => 1000,
                'pieces_count' => 40,
                'price' => 1479,
                'discount_price' => 0,
                'server_image_path' => public_path().'/images/products/sets/love.jpg',
                'image_path' => env('APP_PATH').'/images/products/sets/love.jpg'
                ],
                [
                'name' => 'Топовый сет',
                'gram_count' => 1020,
                'pieces_count' => 40,
                'price' => 1519,
                'discount_price' => 0,
                'server_image_path' => public_path().'/images/products/sets/top.jpg',
                'image_path' => env('APP_PATH').'/images/products/sets/top.jpg'
            ],

        ];
        foreach($sushiSets as $product) {
            $prod = array_diff_key($product, array_flip(['consist']));
            $prod = Product::create($prod);
            $prod->categories()->attach(Category::SETS);
            $productConsist = $product['consist'] ?? null;
            if($productConsist != null) {
                foreach($product['consist'] as $consistId) {
                    $prod->consists()->attach($consistId);
                }
            }
        }
    }
}
