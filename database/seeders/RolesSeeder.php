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
                'title' => 'Super Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Admin',
            ],
           
            [
                'id'    => 3,
                'title' => 'Accountant',
            ],
            [
                'id'    => 4,
                'title' => 'Cashier',
            ],
            [
                'id'    => 5,
                'title' => 'Manager',
            ],
        ];

        Role::insert($roles);
    }
}
