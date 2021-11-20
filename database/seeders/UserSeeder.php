<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'user',
                'email' => 'user@tocka.ru',
                'password' => '123',
            ],
            [
                'name' => 'admin',
                'email' => env('ADMIN_EMAIL'),
                'password' => env('ADMIN_PASSWORD'),
            ],
            [
                'name' => 'courier',
                'email' => env('COURIER_EMAIL'),
                'password' => env('COURIER_PASSWORD'),
            ]
        ];
        $roles = array_values(Role::ROLES_LIST);
        foreach($users as $index => $user) {
            $newUser = User::create($user);
            $newUser->role()->detach();
            $newUser->role()->attach($roles[$index]);
        }
    }
}
