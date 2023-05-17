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
        $roles = ['Super Admin','Admin','Accountant','Cashier','Manager'];

                 foreach($roles as  $role){
                            Role::create(['name' => $role]);    
                     }
    }
}
