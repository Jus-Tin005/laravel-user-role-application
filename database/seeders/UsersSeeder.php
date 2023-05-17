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
    public function run(){

            $users = [
                    [
                        'name'           => 'khuntun',
                        'email'          => 'khuntun984@gmail.com',
                        'password'       => bcrypt('khuntun984'),
                        'remember_token' => null,
                    ],
                    [
                        'name'           => 'Eh Hlaing',
                        'email'          => 'hlaing777@gmail.com',
                        'password'       => bcrypt('hlaing777'),
                        'remember_token' => null,
                    ],
                    [
                        'name'           => 'Htet Htet',
                        'email'          => 'htet2023@gmail.com',
                        'password'       => bcrypt('htet2023'),
                        'remember_token' => null,
                    ],
            ];

            foreach($users as $user){
                User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                ]);
            }
     }

}





