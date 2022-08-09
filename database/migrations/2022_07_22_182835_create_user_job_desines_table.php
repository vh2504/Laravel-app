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
        Schema::create('user_job_desines', function (Blueprint $table) {
            $table->comment('希望条件');
            $table->id('id');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('salary', 20)->nullable()->comment('希望年収');
            $table->smallInteger('expectation')->nullable()->comment('0: 特になし, 1: 今すぐに, 2: 1ヶ月以内, 3: 3ヶ月以, 4: 3ヶ月以上先');
            
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
        Schema::dropIfExists('user_job_desines');
    }
};
