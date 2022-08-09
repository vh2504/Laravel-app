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
        Schema::create('user_job_desine_situation', function (Blueprint $table) {
            $table->comment('希望勤務形態');
            $table->id('id');

            $table->unsignedBigInteger('user_job_desine_id')->nullable();
            $table->foreign('user_job_desine_id')->references('id')->on('user_job_desines')->onDelete('cascade');

            $table->smallInteger('job_situation')->nullable()->comment('0: 選択する, 1: 正職員, 2: 契約職員, 3: パート・バイト, 4: 業務委託');

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
        Schema::dropIfExists('user_job_desine_situation');
    }
};
