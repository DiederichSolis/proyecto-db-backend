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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Id_cuenta')->unsigned();
            $table->foreign('Id_cuenta')->references('id')->on('cuenta');
            $table->integer('Id_plato')->unsigned();
            $table->foreign('Id_plato')->references('id')->on('platos');
            $table->integer('Id_bebida')->unsigned();
            $table->foreign('Id_bebida')->references('id')->on('drinks');
            $table->integer('cantidad');
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
        Schema::dropIfExists('ordenes');
    }
};