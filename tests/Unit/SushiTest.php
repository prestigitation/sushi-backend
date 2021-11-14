<?php

namespace Tests\Unit;

use App\Http\Requests\StoreSushiRequest;
use App\Http\Services\SushiService;
use Tests\TestCase;
use App\Models\Sushi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SushiTest extends TestCase
{
    public $sushiRequest = [
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
    public function testSelectedSushiHasValidImage()
    {
        $testModel = Sushi::findOrFail(1);
        $this->assertFileExists($testModel->image_path);
    }

    public function testUnauthorizedUserCanNotStoreSushi() {
        $response = $this->postJson('/sushi', $this->sushiRequest);
        $response->assertStatus(403);
    }

    public function testAuthorizedUserCanStoreSushi() {
        Auth::attempt(['email' => 'vana@mail.ru', 'password' => '123456']);
        $response = $this->postJson('/sushi', $this->sushiRequest);
        $response->assertStatus(200);
    }

    public function testUnfulfilledSushiStoreRequestCanNotPassValidation() {
        $unFullfilRequest = array_splice($this->sushiRequest,2); // убираем пару полей из модели
        Auth::attempt(['email' => 'vana@mail.ru', 'password' => '123456']);
        $response = $this->postJson('/sushi', $unFullfilRequest);
        $response->assertStatus(400);
    }
}
