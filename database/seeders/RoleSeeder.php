<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Role::ROLES_LIST as $name => $role) {
            Role::create(['name' => $name, 'id' => $role]);
        }
    }
}
