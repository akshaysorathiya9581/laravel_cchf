<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer_roles', function (Blueprint $table) {
            $table->id();  // This creates an auto-incrementing 'id' column
            $table->string('name');  // This creates a 'name' column of type varchar(255)
            $table->timestamps();  // This creates 'created_at' and 'updated_at' timestamp columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteer_roles');
    }
}
