<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'khuntun',
                'email'          => 'khuntun984@gmail.com',
                'password'       => bcrypt('khuntun984'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Eh Hlaing',
                'email'          => 'hlaing777@gmail.com',
                'password'       => bcrypt('hlaing777'),
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Htet Htet',
                'email'          => 'htet2023@gmail.com',
                'password'       => bcrypt('htet2023'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
