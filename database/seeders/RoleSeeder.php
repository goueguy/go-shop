<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            "Super Admin",
            "Admin",
            "Utilisateur",
            "Client"
        ];
        foreach($roles as $role){
            Role::create([
                'name'=>$role,
                'slug'=>Str::slug($role)
            ]);
        }
    }
}
