<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->date('publish_date')->nullable();
            $table->bigInteger('season_id')->unsigned();
            $table->timestamps(0); // Equivalent to created_at & updated_at (no precision)
            $table->softDeletes(); // This will add deleted_at column for soft deletes
            $table->bigInteger('campaign_id')->unsigned()->nullable();
            $table->string('video_link')->nullable();
            $table->string('slug')->nullable();
            $table->string('author')->nullable();

            // Foreign key constraints
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
