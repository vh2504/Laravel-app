<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateJobCategoryJobsTable.
 */
class CreateJobCategoryJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_category_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('job_category_id')->comment('Job category id');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');

            $table->unsignedBigInteger('job_id')->comment('Job id');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

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
        Schema::drop('job_category_jobs');
    }
}