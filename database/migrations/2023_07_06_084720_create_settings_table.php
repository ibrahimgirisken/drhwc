<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200)->nullable();
            $table->string('description',160)->nullable();
            $table->string('keywords',300)->nullable();
            $table->string('logo',50)->nullable();
            $table->string('telephone',20)->nullable();
            $table->string('e-mail',200)->nullable();
            $table->string('address',300)->nullable();
            $table->string('facebook',200)->nullable();
            $table->string('googleMaps',500)->nullable();
            $table->string('instagram',200)->nullable();
            $table->string('twitter',200)->nullable();
            $table->string('status',3)->nullable();
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
        Schema::dropIfExists('settings');
    }
}
