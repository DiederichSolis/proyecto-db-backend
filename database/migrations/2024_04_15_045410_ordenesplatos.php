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
        Schema::create('ordenesplatos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Id_cuenta')->unsigned();
            $table->foreign('Id_cuenta')->references('id')->on('cuenta');
            $table->integer('Id_plato')->unsigned();
            $table->foreign('Id_plato')->references('id')->on('platos');
            $table->integer('cantidad_platos');
            $table->boolean('estado')->default(false);
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
        Schema::dropIfExists('ordenesplatos');
    }
};