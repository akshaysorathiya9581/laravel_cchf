<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenGraphsTable extends Migration
{
    public function up()
    {
        Schema::create('open_graphs', function (Blueprint $table) {
            $table->id(); // Creates 'id' as the primary key with auto-increment
            $table->string('page', 10); // Page column (varchar(10))
            $table->string('og_title', 255); // Open Graph Title (varchar(255))
            $table->string('og_image', 255)->nullable(); // Open Graph Image (varchar(255), nullable)
            $table->string('og_description', 555); // Open Graph Description (varchar(555))
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // deleted_at for soft deletes
        });
    }

    public function down()
    {
        Schema::dropIfExists('open_graphs');
    }
}
