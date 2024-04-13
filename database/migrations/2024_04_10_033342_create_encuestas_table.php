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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('Id_cliente');
            $table->foreign('Id_cliente')->references('id')->on('cliente');
            $table->timestamp('fecha')->useCurrent();
            $table->integer('calificacion_amabilidad');
            $table->integer('calificacion_exactitud');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('encuestas');
    }
    
};
