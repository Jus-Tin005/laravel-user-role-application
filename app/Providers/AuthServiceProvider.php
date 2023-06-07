<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Role;
use App\Models\Feature;
use App\Models\Permission;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Role' => 'App\Policies\RolePolicy',

        // Role::class => RolePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('has-role', function (User $user, $role) {
        //     return $user->hasRole($role);
        // });

        // $features = Feature::with('permissions')->get();

        // foreach ($features as $feature) {
        //     foreach ($feature->permissions as $permission) {
        //         Gate::define($permission->title, function ($user) use ($permission) {
        //             return $user->roles->contains(function ($role) use ($permission) {
        //                 return $role->permissions->contains('title', $permission->title);
        //             });
        //         });
        //     }
        // }
    }

}

