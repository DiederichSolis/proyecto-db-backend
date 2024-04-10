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
        Schema::create('mesas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas_restaurante');
            $table->integer('capacidad');
            $table->boolean('movible');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mesas');
    }
};
