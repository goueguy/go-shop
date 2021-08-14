<?php

namespace Database\Seeders;

use App\Models\CategoryProvider;
use Illuminate\Database\Seeder;

class CategoryProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "INFORMATIQUE",
            "ALIMENTAIRE",
            "MODE",
            "ELECTROMENAGER",
            "PRODUIT COSMETIQUE"
        ];
        foreach($categories as $category){
            CategoryProvider::create([
                'name'=>$category
            ]);
        }
    }
}
