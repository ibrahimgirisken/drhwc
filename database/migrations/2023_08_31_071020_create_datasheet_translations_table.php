<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasheetTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasheet_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('datasheet_id')->unsigned();
            $table->string('locale')->index();
            $table->string('productName')->nullable();
            $table->string('content')->nullable();
            $table->string('slug')->nullable();
            $table->string('path')->nullable();
            $table->timestamps();

            $table->unique(['datasheet_id', 'locale']);
            $table->foreign('datasheet_id')->references('id')->on('datasheets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datasheet_translations');
    }
}
