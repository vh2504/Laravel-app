<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * @var string
     */
    private string $table = 'stations';

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
            $table->string('name')->comment('station name')->index();
            $table->char('code', 50)->index()->nullable()->comment('station cd');
            $table->char('line_code', 50)->index()->nullable()->comment('line cd');
            $table->char('postal_code', 20)->comment('postal code')->index();
            $table->string('address')->nullable();
            $table->char('lat', 50)->nullable();
            $table->char('lon', 50)->nullable();
            $table->timestamps();

            $table->index(['code', 'line_code']);
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists($this->table);
        Schema::enableForeignKeyConstraints();
    }
};
