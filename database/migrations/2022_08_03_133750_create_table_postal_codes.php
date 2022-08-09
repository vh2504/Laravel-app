<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * @var string
     */
    protected string $table = 'postal_codes';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();

            $table->unsignedInteger('city_id')->comment('cities.id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->char('first_code', 20)->comment('first zip code')->index();
            $table->char('last_code', 20)->comment('last zip code')->index();
            $table->char('postal_code', 20)->comment('postal_code = {first_code}-{last_code}')->index();
            $table->char('zip_code')->comment('zip_code = {first_code}{last_code}')->index();

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
