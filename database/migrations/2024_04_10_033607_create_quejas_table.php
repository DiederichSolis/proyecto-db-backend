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
    Schema::create('quejas', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedBigInteger('Id_cliente');
        $table->foreign('Id_cliente')->references('id')->on('cliente');
        $table->timestamp('fecha')->useCurrent();
        $table->text('motivo');
        $table->text('clasificacion');
        $table->text('persona');
        $table->unsignedBigInteger('Id_bebida');
        $table->foreign('Id_bebida')->references('id')->on('drinks');
        $table->unsignedBigInteger('Id_plato');
        $table->foreign('Id_plato')->references('id')->on('platos');
        $table->unsignedBigInteger('Id_mesa');
        $table->foreign('Id_mesa')->references('id')->on('mesas');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('quejas');
}

};
