<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $superadmin = User::create([
            'name' => "goueguy",
            'lastname'=>'jean-louis',
            'email' => 'jlagoueguy@gmail.com',
            'password'=>Hash::make("goueguy0000"),
            'telephone'=>"0700719067",
            'role_id'=>1
        ]);

        $superadmin = User::create([
            'name' => "keita",
            'lastname'=>'karim',
            'email' => 'keita@gmail.com',
            'password'=>Hash::make("admin0000"),
            'telephone'=>"0709909290",
            'role_id'=>1
        ]);


        $admin = User::create([
            'name' => "yao",
            'email' => 'muriel.yao@gmail.com',
            'password'=>Hash::make("yao0000"),
            'telephone'=>"0750019067",
            'lastname'=>'muriel',
            'role_id'=>2

        ]);

        $utilisateur = User::create([
            'name' => "charone",
            'lastname'=>'charone',
            'email' => 'charone.kassi@gmail.com',
            'password'=>Hash::make("charone0000"),
            'telephone'=>"0700019067",
            'role_id'=>3
        ]);

        $client = User::create([
            'name' => "jean",
            'email' => 'marc.jean@gmail.com',
            'password'=>Hash::make("marc0000"),
            'telephone'=>"0702019067",
            'lastname'=>'muriel',
            'role_id'=>4
        ]);

        $superadmin->role->permissions()->sync([1,2,3,4,5,6,7,8,9]);
        $admin->role->permissions()->sync([1,2]);
        $client->role->permissions()->sync([4]);
        $utilisateur->role->permissions()->sync([4]);

    }
}
