<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_template', function (Blueprint $table) {
            $table->id(); // automatically creates the 'id' column as an auto-incrementing primary key
            $table->integer('campaign_id');
            $table->string('page', 10);
            $table->string('subject', 255);
            $table->text('message');
            $table->timestamps(0); // created_at and updated_at columns with 0 fractional seconds
            
            // Optionally, add the primary key constraint if necessary
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_template');
    }
}
