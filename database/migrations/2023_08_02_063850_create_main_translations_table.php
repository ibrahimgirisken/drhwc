<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_translations', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('main_id')->unsigned();
            $table->string("locale")->index();
            $table->string("title",150)->nullable();
            $table->string("slug",150)->nullable();
            $table->string("brief",150)->nullable();
            $table->text("content")->nullable();
            $table->timestamps();

            $table->unique(['main_id','locale']);
            $table->foreign('main_id')->references('id')->on('main')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_translations');
    }
}
