<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->unsignedInteger('pre_id');
            $table->foreign('pre_id')->references('id')->on('prefectures')->onDelete('cascade');
            $table->increments('id');

            $table->string('city_ja', 255)->nullable();
            $table->string('city_en', 255)->nullable();
            $table->string('ward', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}