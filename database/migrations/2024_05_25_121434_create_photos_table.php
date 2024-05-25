<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('filename')->nullable()->default(null);
            $table->string('filepath')->nullable()->default(null);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
