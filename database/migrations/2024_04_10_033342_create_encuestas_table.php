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
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
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
