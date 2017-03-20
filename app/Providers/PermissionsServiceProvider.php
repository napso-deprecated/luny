<?php

namespace App\Providers;

use App;
use App\Permission;
use App\User;
use Gate;
use Illuminate\Support\Facades\Blade;
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
        // we don't try to get Permission::get if it's artisan migrate command because it will fail
        if (!App::runningInConsole()) {


            Permission::get()->map(function ($permission) {
                Gate::define($permission->name, function ($user) use ($permission) {
                    /* @var User $user */
                    return $user->hasPermission($permission);
                });
            });

            Blade::directive('role', function ($role) {
                return "<?php if (auth()->check() && auth()->user()->hasRole({$role})): ?>";
            });

            Blade::directive('endrole', function ($role) {
                return "<?php endif; ?>";
            });
        }
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
