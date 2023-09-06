<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("category_id")->nullable();
            $table->string("code", 50)->nullable();
            $table->string("image1", 100)->nullable();
            $table->string("image2", 100)->nullable();
            $table->string("image3", 100)->nullable();
            $table->string("image3D", 100)->nullable();
            $table->integer("order")->default(1);
            $table->string("status")->nullable();
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
        Schema::dropIfExists('products');
    }
}
