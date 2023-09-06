<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->string('image1',100)->nullable();
            $table->string('image2',100)->nullable();
            $table->string('image3',100)->nullable();
            $table->integer("order")->default(1);
            $table->string("status")->nullable();
            $table->timestamps();

            // $table->foreign('menu_id')->references('menu_id')->on('menu_translation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
