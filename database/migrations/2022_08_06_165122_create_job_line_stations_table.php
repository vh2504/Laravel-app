<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateJobLineStationsTable.
 */
return new class extends Migration {
    /**
     * @var string
     */
    private string $table = 'job_line_stations';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('job_id')->comment('jobs.id');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

            $table->unsignedInteger('line_id')->comment('沿線');
            $table->foreign('line_id')->references('id')->on('lines')->onDelete('cascade');

            $table->unsignedInteger('station_id')->comment('駅');
            $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');

            $table->string('distance')->comment('徒歩時間（分）');

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists($this->table);
        Schema::enableForeignKeyConstraints();
    }
};
