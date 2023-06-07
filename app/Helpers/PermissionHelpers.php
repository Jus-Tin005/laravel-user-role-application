<?php
namespace App\Helpers;

class PermissionHelpers {

    public static function permissionRoles() {
        $permissionRoles = collect();

        foreach(auth()->user()->roles as $role) {
            $roles = \App\Models\PermissionRole::select('permissions.title as permissions', 'features.name as features')
                                ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                                ->join('features', 'features.id', '=', 'permissions.feature_id')
                                ->where('permission_role.role_id', '=', $role->pivot->role_id)
                                ->get();

            $permissionRoles = $permissionRoles->merge($roles);
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
