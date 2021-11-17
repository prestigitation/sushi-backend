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
        $users = [[
                'name' => 'admin',
                'email' => 'admin@tocka.ru',
                'password' => '123',
            ],
            [
                'name' => 'user',
                'email' => 'user@tocka.ru',
                'password' => '123',
            ],
            [
                'name' => 'courier',
                'email' => 'courier@tocka.ru',
                'password' => '123',
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
