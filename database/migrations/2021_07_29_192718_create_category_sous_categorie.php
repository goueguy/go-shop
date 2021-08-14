<?php

use App\Models\Category;
use App\Models\SousCategorie;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorySousCategorie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_sous_categorie', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(SousCategorie::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_sous_categorie');
    }
}
