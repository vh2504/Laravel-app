<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * @var string
     */
    private string $table = 'line_stations';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('line_id')->comment('lines.id');
            $table->foreign('line_id')->references('id')->on('lines')->onDelete('cascade');

            $table->unsignedInteger('from_id')->comment('stations.id');
            $table->foreign('from_id')->references('id')->on('stations')->onDelete('cascade');

            $table->unsignedInteger('destination_id')->comment('stations.id');
            $table->foreign('destination_id')->references('id')->on('stations')->onDelete('cascade');

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
        Schema::dropIfExists($this->table);
    }
};
