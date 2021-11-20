<?php

namespace Tests\Unit;

use App\Http\Requests\StoreproductRequest;
use App\Http\Services\productService;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductTest extends TestCase
{
    public $productRequest = [
            'name' => 'test',
            'image_path' => 'test',
            'price' => 5,
            'gram_count' => 1560,
            'pieces_count' => 4,
            'consist' => '[]'
        ];


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSelectedProductHasValidImage()
    {
        $testModel = Product::first();
        $this->assertFileExists($testModel->image_path);
    }

    public function testUnauthorizedUserCanNotStoreProduct() {
        $response = $this->postJson('/api/product', $this->productRequest);
        $response->assertStatus(403);
    }

    public function testAuthorizedUserCanStoreProduct() {
        Auth::attempt(['email' => env('ADMIN_EMAIL'), 'password' => env('ADMIN_PASSWORD')]);
        $response = $this->postJson('/api/product', $this->productRequest);
        $response->assertStatus(200);
    }

    public function testUnfulfilledProductStoreRequestCanNotPassValidation() {
        $unFullfilRequest = array_splice($this->productRequest,2); // убираем пару полей из модели
        Auth::attempt(['email' => env('ADMIN_EMAIL'), 'password' => env('ADMIN_PASSWORD')]);
        $response = $this->postJson('/api/product', $unFullfilRequest);
        $response->assertStatus(400);
    }
}
