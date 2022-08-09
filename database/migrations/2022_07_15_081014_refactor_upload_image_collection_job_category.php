<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_collections', function (Blueprint $table) {
            $table->renameColumn('icon', 'image');
        });

        Schema::table('job_categories', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->string('image')->nullable()->after('alias');
            $table->smallInteger('is_popular')->default(0)->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('image', 'icon');
        });
        Schema::table('job_categories', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->smallInteger('type')->comment('0: 診療科目の特徴, 1: サービス形態の特徴, 2: 仕事内容の特徴, 3: 給与・待遇・福利厚生の特徴, 4: 勤務時間の特徴, 5: 休日の特徴, 6: 応募要件の特徴, 7: アクセスの特徴');
        });
    }
};
