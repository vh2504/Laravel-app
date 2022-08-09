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
            $table->text('process')->nullable()->change();
            $table->jsonb('address')->comment('アクセス')->nullable()->after('process');
            $table->smallInteger('status')->default(0)->after('address');
            $table->smallInteger('is_popular')->default(0)->after('status');
            $table->jsonb('content')->nullable()->after('title');

            $table->dropForeign('jobs_offices_id_foreign');
            $table->dropColumn('offices_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->jsonb('process')->change();
            $table->dropColumn('address');
            $table->dropColumn('status');
            $table->dropColumn('is_popular');
            $table->dropColumn('content');
        });
    }
};
