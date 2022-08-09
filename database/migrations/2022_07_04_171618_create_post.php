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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('creator_id')->nullable();
            $table->foreign('creator_id')->references('id')->on('admins')->onDelete('set null');
            $table->unsignedInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('admins')->onDelete('set null');
            $table->string('title', 500);
            $table->string('image', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->text('summary')->nullable();
            $table->longText('content');
            $table->integer('view_count')->default(0);
            $table->smallInteger('status')->default(1)->comment('0:拒否, 1:承認待ち, 2: 投稿待ち, 3: 未公開');
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
};
