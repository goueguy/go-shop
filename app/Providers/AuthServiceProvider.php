<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        //Gate for Users Modules

        Gate::define('manage-users', function (User $user) {
            return $user->role->hasPermissions(['Manage Users']);
        });
        //Gate for Providers Modules
        Gate::define('manage-providers', function (User $user) {
            return $user->role->hasPermissions(['Manage Providers']);
        });
        //Gate for Clients Modules
        Gate::define('manage-customers', function (User $user) {
            return $user->role->hasPermissions(['Manage Customers']);
        });
        //Gate for Articles Modules
        Gate::define('manage-articles', function (User $user) {
            return $user->role->hasPermissions(['Manage Articles']);
        });
        //Gate for Roles Modules
        Gate::define('manage-roles', function (User $user) {
            return $user->role->hasPermissions(['Manage Roles']);
        });
         //Gate for Permissions Modules
        Gate::define('manage-permissions', function (User $user) {
            return $user->role->hasPermissions(['Manage Permissions']);
        });
         //Gate for Orders Modules
        Gate::define('manage-orders', function (User $user) {
            return $user->role->hasPermissions(['Manage Orders']);
        });
         //Gate for Payments Modules
        Gate::define('manage-payments', function (User $user) {
            return $user->role->hasPermissions(['Manage Payments']);
        });
         //Gate for Categories Modules
        Gate::define('manage-categories', function (User $user) {
            return $user->role->hasPermissions(['Manage Categories']);
        });
        //Gate for Menu Modules
        Gate::define('manage-menus', function (User $user) {
            return $user->role->hasPermissions(['Manage Menus']);
        });
    }

}
