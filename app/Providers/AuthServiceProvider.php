<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access_dashboard', 'App\Policies\DashboardPolicy@access_dashboard');
        Gate::define('access_dashboard_as_admin', 'App\Policies\DashboardPolicy@access_dashboard_as_admin');
        Gate::define('access_dashboard_as_courier', 'App\Policies\DashboardPolicy@access_dashboard_as_courier');
    }
}
