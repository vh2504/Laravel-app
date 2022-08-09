<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateJobCategoryJobCollectionsTable.
 */
class CreateJobCategoryJobCollectionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_category_job_collections', function (Blueprint $table) {
			$table->bigIncrements('id');

			$table->unsignedBigInteger('job_collection_id')->comment('Job collection id');
			$table->foreign('job_collection_id')->references('id')->on('job_collections')->onDelete('cascade');

			$table->unsignedBigInteger('job_category_id')->comment('Job category id');
			$table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');

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
		Schema::drop('job_category_job_collections');
	}
}