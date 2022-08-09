<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateJobsTable.
 */
class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255);
            $table->jsonb('description')->nullable()->comment('仕事内容(feature_ids, text)');
            $table->jsonb('service_form')->nullable()->comment('診療科目・サービス形態');
            $table->jsonb('salary')->nullable()->comment('(給与: type, Min, max | 給与の備考)');
            $table->jsonb('treatment')->nullable()->comment('待遇: (tags, text)');
            $table->jsonb('working_time')->nullable()->comment('勤務時間 (tags, text)');
            $table->jsonb('holiday')->nullable()->comment('休日 (tags, text)');
            $table->jsonb('special_leave')->nullable()->comment('長期休暇・特別休暇');
            $table->jsonb('requirement')->nullable()->comment('応募条件');
            $table->jsonb('process')->nullable()->comment('選考プロセス');

            $table->unsignedInteger('created_by_id')->comment('Created by admin id');
            $table->foreign('created_by_id')->references('id')->on('admins')->onDelete('cascade');

            $table->unsignedBigInteger('offices_id')->comment('Office id');
            $table->foreign('offices_id')->references('id')->on('offices')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jobs');
    }
}