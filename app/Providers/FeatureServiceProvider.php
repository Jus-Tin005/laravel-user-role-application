<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;
use App\Models\Feature;
use App\Models\Permission;
use App\Models\User;
use App\Models\Role;



class FeatureServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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
        

        // Gate::define('has-role', function (User $user, $role) {
        //     return $user->hasRole($role);
        // });

        // Gate::define('has-feature', function (Feature $feature, $permission) {
        //     return $feature->hasFeature($permission);
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

