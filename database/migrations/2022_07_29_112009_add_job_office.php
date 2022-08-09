<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * @var string
     */
    protected string $table = 'jobs';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->unsignedBigInteger('collection_id')->comment('職種分類選択')->after('title');
            $table->foreign('collection_id')->references('id')->on('job_collections')->onDelete('cascade');

            $table->unsignedBigInteger('category_id')->after('title');
            $table->foreign('category_id')->references('id')->on('job_categories')->onDelete('cascade');

            $table->string('postal_code')->nullable()->comment('郵便番号');
            $table->unsignedInteger('city_id')->nullable()->comment('都道府県');
            $table->unsignedInteger('prefecture_id')->nullable()->comment('市区町村');
            $table->jsonb('access')->nullable()->comment('アクセス');
            $table->string('address')->change();
        });

        Schema::dropIfExists('job_category_jobs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropColumn('postal_code');
            $table->dropColumn('prefecture_id');
            $table->dropColumn('city_id');
            $table->dropColumn('access');
            $table->dropForeign('jobs_collection_id_foreign');

            $table->dropForeign('category_id');
            $table->dropColumn('category_id');
        });
    }
};
