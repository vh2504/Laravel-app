<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_job_city_desine', function (Blueprint $table) {
            $table->comment('希望勤務地');
            $table->id('id');

            $table->unsignedBigInteger('user_job_desine_id')->nullable();
            $table->foreign('user_job_desine_id')->references('id')->on('user_job_desines')->onDelete('cascade');

            $table->unsignedInteger('city_id')->nullable();
			$table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->unsignedInteger('prefecture_id');
            $table->foreign('prefecture_id')->references('id')->on('prefectures')->onDelete('cascade');

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
        Schema::dropIfExists('user_job_city_desine');
    }
};
