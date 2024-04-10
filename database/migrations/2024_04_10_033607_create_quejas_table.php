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
        $table->id();
        $table->unsignedBigInteger('cliente_id');
        $table->foreign('cliente_id')->references('id')->on('clientes');
        $table->timestamp('fecha')->useCurrent();
        $table->text('motivo');
        $table->text('clasificacion');
        $table->text('persona');
        $table->unsignedBigInteger('producto_id')->nullable();
        $table->foreign('producto_id')->references('id')->on('productos');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('quejas');
}

};
