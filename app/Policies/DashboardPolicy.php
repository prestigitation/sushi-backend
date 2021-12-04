<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class DashboardPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function access_dashboard(User $user)
    {
        return in_array($user->role[0]->id, Role::ADMIN_PANEL_ROLES_LIST);
    }

    public function access_dashboard_as_admin(User $user)
    {
        return $user->role[0]->id == Role::ROLE_ADMIN;
    }

    public function access_dashboard_as_courier(User $user)
    {
        return $user->role[0]->id == Role::ROLE_COURIER;
    }
}
