<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateJobCategoriesTable.
 */
class CreateJobCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('alias')->nullable();
            $table->smallInteger('type')->comment('0: 診療科目の特徴, 1: サービス形態の特徴, 2: 仕事内容の特徴, 3: 給与・待遇・福利厚生の特徴, 4: 勤務時間の特徴, 5: 休日の特徴, 6: 応募要件の特徴, 7: アクセスの特徴');

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
        Schema::drop('job_categories');
    }
}
