<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permission = [
            "Manage Users",
            "Manage Articles",
            "Manage Providers",
            "Manage Customers",
            "Manage Roles",
            "Manage Permissions",
            "Manage Orders",
            "Manage Payments",
            "Manage Categories",
            "Manage Menus"
        ];
        foreach($permission as $permission){
            Permission::create(['name'=>$permission]);
        }
    }
}
