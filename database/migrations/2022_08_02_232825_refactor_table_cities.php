<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * @var string
     */
    protected string $table = 'cities';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists($this->table);

        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            # Add new columns
            $table->string('name')->index();

            $table->unsignedInteger('prefecture_id')->comment('prefectures.id');
            $table->foreign('prefecture_id')->references('id')->on('prefectures')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table, function (Blueprint $table) {
            # Remove old table
            $table->removeColumn('name');
            $table->dropForeign(['prefecture_id']);
        });
    }
};
