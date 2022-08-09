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
        Schema::create('user_job_category_job_desine', function (Blueprint $table) {
            $table->comment('希望職種/経験年数');
            $table->id('id');

            $table->unsignedBigInteger('user_job_desine_id')->nullable();
            $table->foreign('user_job_desine_id')->references('id')->on('user_job_desines')->onDelete('cascade');

            $table->unsignedBigInteger('job_category_id')->nullable();
			$table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');

            $table->smallInteger('career_year')->nullable()->comment('キャリア年');
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
        Schema::dropIfExists('user_job_category_job_desine');
    }
};
