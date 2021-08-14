<?php

namespace Database\Seeders;

use App\Models\SousCategorie;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SousCategorie::factory()->count(10)->create();
    }
}
