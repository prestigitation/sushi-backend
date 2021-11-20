<?php

namespace Tests\Unit;

use App\Http\Controllers\AuthController;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Database\Factories\UserFactory;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\PHPUnit;

class UserTest extends TestCase
{
    public function testUserRegisterWithValidRequestData()
    {
        $user = User::factory()->count(1)->make();
        $response = $this->postJson('/api/auth/register', [
            'email' => $user[0]['email'],
            'name' => $user[0]['name'],
            'password' => $user[0]['password']
        ]);
        $response->assertStatus(200);
    }
    public function testAnyAuthentificatedUserRecieveJwtCorrectly() {
        $admin = [
            'email' => env('ADMIN_EMAIL'),
            'password' => env('ADMIN_PASSWORD'),
        ];
        Auth::attempt($admin);
        $response = $this->postJson('/api/auth/login', $admin);
        $response->assertJsonStructure(['access_token', 'expires_in', 'token_type']);
    }

    public function testRegisteredOneUserCanNotRegisterNewUserByThrottleTiming() {
        $user = User::factory()->count(1)->make();
        $this->postJson('/api/auth/register', [
            'email' => $user[0]['email'],
            'name' => $user[0]['name'],
            'password' => $user[0]['password']
        ]);
        $secondUser = User::factory()->count(1)->make();
        $secondResponse = $this->postJson('/api/auth/register', [
            'email' => $secondUser[0]['email'],
            'name' => $secondUser[0]['name'],
            'password' => $secondUser[0]['password']
        ]);
        $secondResponse->assertStatus(429);
    }

    public function testAdminCanAccessDashboard() {
        $admin = [
            'email' => env('ADMIN_EMAIL'),
            'password' => env('ADMIN_PASSWORD'),
        ];
        Auth::attempt($admin);
        $response = $this->get('/api/dashboard/access', $admin);
        $response->assertStatus(200);
    }

    public function testCourierCanAccessDashboard() {
        $courier = [
            'email' => env('COURIER_EMAIL'),
            'password' => env('COURIER_PASSWORD'),
        ];
        Auth::attempt($courier);
        $response = $this->get('/api/dashboard/access', $courier);
        $response->assertStatus(200);
    }
    public function testUserCanNotAccessDashboard() {
        $user = User::factory()->count(1)->make();
        $user = [
            'email' => $user[0]['email'],
            'password' => $user[0]['password'],
            'name' => $user[0]['name'],
        ];
        $registerResponse = $this->postJson('/api/auth/register', [
            'email' => $user['email'],
            'name' => $user['name'],
            'password' => $user['password']
        ]);
        Auth::attempt(['email' => $user['email'], 'password' => $user['password']]);
        $response = $this->get('/api/dashboard/access', $user);
        $response->assertStatus(401);
    }
}
