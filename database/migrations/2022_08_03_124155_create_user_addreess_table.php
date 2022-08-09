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
        // 住所
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('pre_id')->nullable();
            $table->foreign('pre_id')->references('id')->on('prefectures')->onDelete('cascade');
            $table->unsignedInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('postal_code')->nullable()->comment('郵便番号');
            $table->string('address', 255)->nullable()->comment('住所');
            $table->string('town', 255)->nullable()->comment('街');
            $table->string('address_hira', 255)->nullable()->comment('住所');
            $table->string('number_phone', 20)->nullable()->comment('電話番号');

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
        Schema::dropIfExists('user_addresses');
    }
};
