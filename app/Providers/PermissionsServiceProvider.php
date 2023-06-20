<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Permission::get()->map(function ($permission) {
            Gate::define($permission->slug, function ($user) use ($permission) {
                return $user->hasPermission($permission);
            });
        });

        Blade::directive('permission', function ($permission) {
            return "<?php if(auth()->check() && auth()->user()->hasPermission({$permission})) : ?>";
        });
        Blade::directive('endpermission', function ($permission) {
            return "<?php endif; ?>";
        });
    }
}
