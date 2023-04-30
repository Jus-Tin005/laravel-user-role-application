<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Feature;


class PermissionFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = Permission::offset(0)->limit(4)->get();
        Feature::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $admin_permissions = Permission::offset(0)->limit(5)->get();
        Feature::findOrFail(2)->permissions()->sync($admin_permissions->pluck('id')); 
        
        $admin_permissions = Permission::offset(1)->limit(3)->get();
        Feature::findOrFail(3)->permissions()->sync($admin_permissions->pluck('id'));

        $admin_permissions = Permission::offset(3)->limit(1)->get();
        Feature::findOrFail(4)->permissions()->sync($admin_permissions->pluck('id'));

        $admin_permissions = Permission::offset(1)->limit(3)->get();
        Feature::findOrFail(5)->permissions()->sync($admin_permissions->pluck('id'));
    }
}
