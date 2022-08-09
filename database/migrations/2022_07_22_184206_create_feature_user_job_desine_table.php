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
        Schema::create('feature_user_job_desine', function (Blueprint $table) {
            $table->comment('こだわり条件');
            $table->id('id');

            $table->unsignedBigInteger('user_job_desine_id')->nullable();
            $table->foreign('user_job_desine_id')->references('id')->on('user_job_desines')->onDelete('cascade');

            $table->unsignedBigInteger('feature_id')->nullable();
			$table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');

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
        Schema::dropIfExists('feature_user_job_desine');
    }
};
