<?php

use App\Models\User;
use App\Models\Provider;
use App\Models\SousCategorie;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price',10,2);
            $table->integer('quantity');
            $table->string('slug')->unique();
            $table->enum('statut',['Inactif','Actif'])->default('Inactif')->nullable();
            $table->enum('status_stock',['en stock','epuise'])->default('en stock');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(SousCategorie::class);
            $table->foreignIdFor(Provider::class);
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
        Schema::dropIfExists('articles');
    }
}
