<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\SubCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CategoryProviderSeeder::class,
            ProviderSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class
        ]);
    }
}
