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
                                    'role_id'        => 1,
                                    'remember_token' => null,
                                ],
                                [
                                    'name'           => 'Eh Hlaing',
                                    'email'          => 'hlaing777@gmail.com',
                                    'password'       => bcrypt('hlaing777'),
                                    'role_id'        => 2,
                                    'remember_token' => null,
                                ],
                                [
                                    'name'           => 'Htet Htet',
                                    'email'          => 'htet2023@gmail.com',
                                    'password'       => bcrypt('htet2023'),
                                    'role_id'        => 3,
                                    'remember_token' => null,
                                ],
            ];

            foreach($users as $key => $user){
                User::create([                  
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'password' => $user['password'],
                        'role_id' => $user['role_id'],
                ]);
            }
     }

}





