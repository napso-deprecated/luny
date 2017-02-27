<?php

namespace App\Providers;

use App\Permission;
use App\User;
use Gate;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Permission::get()->map(function ($permission) {
            Gate::define($permission->name, function ($user) use ($permission) {
                /* @var User $user */
                return $user->hasPermission($permission);
            });
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
