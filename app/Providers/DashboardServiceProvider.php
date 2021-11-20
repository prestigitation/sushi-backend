<?php

namespace App\Providers;

use App\Policies\DashboardPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\Role;
use App\Models\User;


class DashboardServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('access_dashboard', function (User $user) {
            return in_array($user->id, Role::ADMIN_PANEL_ROLES_LIST);
        });
    }
}
