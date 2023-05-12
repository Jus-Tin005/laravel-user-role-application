<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;



class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $admin_permissions = Permission::all();
        Role::findOrFail(2)->permissions()->sync($admin_permissions->pluck('id'));

        $admin_permissions = Permission::all();
        Role::findOrFail(3)->permissions()->sync($admin_permissions->pluck('id'));

        $admin_permissions = Permission::all();
        Role::findOrFail(4)->permissions()->sync($admin_permissions->pluck('id'));

        $admin_permissions = Permission::all();
        Role::findOrFail(5)->permissions()->sync($admin_permissions->pluck('id'));
       

    
    }
}
