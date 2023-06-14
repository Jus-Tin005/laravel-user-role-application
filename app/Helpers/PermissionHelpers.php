<?php
namespace App\Helpers;

class PermissionHelpers {

    public static function permissionRoles()
    {
        $permissionRoles = collect();
        $user = auth()->user();

        if ($user && $user->roles) {
                $rolePermissionRoles = \App\Models\PermissionRole::select('permissions.title as permissions', 'features.name as features')
                    ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                    ->join('features', 'features.id', '=', 'permissions.feature_id')
                    ->where('permission_role.role_id', '=', $user->roles->id)
                    ->get();

                $permissionRoles = $permissionRoles->merge($rolePermissionRoles);
            
        }

        return $permissionRoles;
    }


    public static function checkPermission(string $permission, string $feature): bool {
        $authorizedUserPermissions = self::permissionRoles();
        foreach($authorizedUserPermissions as $item) {
            if($item->permissions === $permission && $item->features === $feature) {
                return true;
            }
        }

        return false;
    }
}
