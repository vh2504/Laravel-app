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
        Schema::create('user_degreess', function (Blueprint $table) {
            $table->comment('学歴');
            $table->id('id');
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->smallInteger('degrees_type')->nullable()->comment('0: 選択する, 1: 高等学校, 2: 高等専門学校, 3: 短期大学, 4: 大学, 5: 大学院(修士), 6: 大学院(博士), 7: 専門学校, 8: その他');
            $table->string('school_name', 255)->nullable()->comment('学校名');
            $table->string('department', 255)->nullable()->comment('学部・学科');
            $table->string('major', 255)->nullable()->comment('専攻');
            $table->smallInteger('degree')->nullable()->comment('1: 選択する, 2: 卒業, 3: 中退, 4: 卒業見込');
            $table->string('graduation_year', 10)->nullable()->comment('卒業年');
            $table->string('graduation_month', 10)->nullable()->comment('卒業月');
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
        Schema::dropIfExists('user_degreess');
    }
};
