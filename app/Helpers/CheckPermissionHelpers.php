<?php

namespace App\Helpers;

use App\Helpers\PermissionHelpers;

class CheckPermissionHelpers {
    public function checkItem($permission, $feature) {
        return PermissionHelpers::checkPermission($permission, $feature);
    }

    public function superAdmin($id, $name) {
        if ($id !== 1 && $name !== \App\Models\Role::find(1)->name) {
            return true;
        }
    }

    public function customAll($feature) {
        $permissions = ['access', 'create', 'edit', 'show', 'delete'];

        foreach ($permissions as $permission) {
            if ($this->checkItem($permission, $feature)) {
                return true;
            }
        }
        return false;
    }

    public function customAccess($feature) {
        return $this->checkItem('access', $feature);
    }

    public function customCreate($feature) {
        return $this->checkItem('create', $feature);
    }

    public function customEdit($feature) {
        return $this->checkItem('edit', $feature);
    }

    public function customShow($feature) {
        return $this->checkItem('show', $feature);
    }

    public function customDelete($feature) {
        return $this->checkItem('delete', $feature);
    }
}
