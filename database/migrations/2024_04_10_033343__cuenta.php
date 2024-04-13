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
        Schema::create('cuenta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Id_mesa')->unsigned();
            $table->foreign('Id_mesa')->references('id')->on('mesas');
            $table->integer('Id_cliente')->unsigned();
            $table->foreign('Id_cliente')->references('id')->on('cliente');
            $table->boolean('estado');
            $table->float('total');
            $table->date('fecha');
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
        Schema::dropIfExists('cuenta');
    }
};