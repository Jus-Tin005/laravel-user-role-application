<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;
use App\Models\Permission;


class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = ['user','role','product','customer','sale'];
        $permissions = ['access','create','edit','show','delete'];

        foreach($features as $feature){
            $feature_id = Feature::create(['name' => $feature]);

            foreach($permissions as $permission){
               Permission::create([
                'title' => $permission,
                'feature_id' => $feature_id->id
               ]);
            }
        }

    }
}
