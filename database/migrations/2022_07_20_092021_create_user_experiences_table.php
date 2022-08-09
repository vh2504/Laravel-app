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
        Schema::create('user_experiences', function (Blueprint $table) {
            $table->comment('職務経歴');
            $table->id('id');
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('job_collection_id')->nullable();
			$table->foreign('job_collection_id')->references('id')->on('job_collections')->onDelete('cascade');

            $table->unsignedBigInteger('job_category_id')->nullable();
			$table->foreign('job_category_id')->references('id')->on('categories')->onDelete('cascade');
            
            $table->string('company_name', 255)->nullable()->comment('勤務先名');
            $table->text('job_content')->nullable()->comment('仕事内容');
            $table->string('start_month', 10)->nullable()->comment('月の始まり');
            $table->string('start_year', 10)->nullable()->comment('開始年');
            $table->string('end_month', 10)->nullable()->comment('月末');
            $table->string('end_year', 10)->nullable()->comment('勤務終了');
            $table->smallInteger('job_situation')->nullable()->comment('0: 選択する, 1: 正職員, 2: 契約職員, 3: パート・バイト, 4: 業務委託');
            $table->smallInteger('position')->nullable()->comment('0: 選択する, 1: なし, 2: 医院長/副医院長, 3: その他');
            $table->smallInteger('salary_type')->nullable()->comment('希望年収');
            $table->string('salary', 20)->nullable()->comment('希望年収');

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
        Schema::dropIfExists('user_experiences');
    }
};
