<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Hash;

class UserObserver
{
    public function creating(User $user) {
        $user->password = Hash::make($user->password);
    }
    public function created(User $user) {
        $user->role()->attach(Role::ROLE_USER);
    }
}
