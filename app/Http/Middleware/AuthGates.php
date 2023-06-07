<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;

 
class AuthGates
{
    public function handle($request, Closure $next)
    {
        //     $user = \Auth::user();

        //     if ($user) {
        //         $roles = Role::with('permissions')->get();
              

        //         $permissionsArray = [];

        //         foreach ($roles as $role) {
        //             foreach ($role->permissions as $permission) {
        //                 $permissionsArray[$permission->title][] = $role->id;
        //             }
        //         }

		// // Every permission may have multiple roles assigned
        //         foreach ($permissionsArray as $title => $role) {
        //             Gate::define($title, function ($user) use ($role) {
		// 	// We check if we have the needed roles among current user's roles
        //                 return count(array_intersect($user->roles->pluck('id')->toArray(), $role)) > 0;
        //             });
        //         }
        //     }


        return $next($request);

    }





}
