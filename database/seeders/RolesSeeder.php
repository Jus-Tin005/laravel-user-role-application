<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'name' => 'Super Admin',
            ],
            [
                'id'    => 2,
                'name' => 'Admin',
            ],
           
            [
                'id'    => 3,
                'name' => 'Accountant',
            ],
            [
                'id'    => 4,
                'name' => 'Cashier',
            ],
            [
                'id'    => 5,
                'name' => 'Manager',
            ],
        ];

        Role::insert($roles);
    }
}
