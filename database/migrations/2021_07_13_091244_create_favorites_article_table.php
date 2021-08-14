<?php

use App\Models\Article;
use App\Models\Favorite;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites_article', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Favorite::class);
            $table->foreignIdFor(Article::class);
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
        Schema::dropIfExists('favorites_article');
    }
}
