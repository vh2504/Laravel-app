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
        Schema::table('users', function(Blueprint $table) {
            $table->smallInteger('status')->defauld(1)->comment('1: Active, 2: InActive');
            $table->string('first_name', 255)->nullable()->comment('名前');
            $table->string('last_name', 255)->nullable();
            $table->string('first_name_hira', 255)->nullable()->comment('ふりがな');
            $table->string('last_name_hira', 255)->nullable();
            $table->smallInteger('sex')->nullable()->comment('性別');
            $table->string('email2', 255)->nullable();
            $table->text('note')->nullable();
            $table->smallInteger('job_situation')->nullable()->comment('0: 選択する, 1: 正職員, 2: 契約職員, 3: パート・バイト, 4: 業務委託');
            $table->smallInteger('dependant')->nullable()->comment('配偶者');
            $table->smallInteger('marital_status')->nullable()->comment('夫婦');
            $table->text('info')->nullable()->comment('自己PR');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('first_name_hira');
            $table->dropColumn('last_name_hira');
            $table->dropColumn('sex');
            $table->dropColumn('email2');
            $table->dropColumn('note');
            $table->dropColumn('job_situation');
            $table->dropColumn('dependant');
            $table->dropColumn('marital_status');
            $table->dropColumn('info');
            $table->dropColumn('favourite');
		});
    }
};
