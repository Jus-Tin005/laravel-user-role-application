<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'access', 
            ],
            [
                'id'    => 2,
                'title' => 'create',
            ],
            [
                'id'    => 3,
                'title' => 'edit',
            ],
            [
                'id'    => 4,
                'title' => 'show',
            ],
            [
                'id'    => 5,
                'title' => 'delete',
            ],  
        ];

        Permission::insert($permissions);
    }
}
