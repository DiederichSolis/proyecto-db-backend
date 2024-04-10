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
    Schema::create('meseros', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->unsignedBigInteger('area_id');
        $table->foreign('area_id')->references('id')->on('areas_restaurante');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('meseros');
}

};
