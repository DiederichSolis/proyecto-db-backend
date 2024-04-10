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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mesa_id')->unsigned();
            $table->foreign('mesa_id')->references('id')->on('mesas');
            $table->timestamp('fecha_apertura')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_cierre')->nullable();
            $table->decimal('total', 10, 2);
            $table->decimal('propina', 10, 2);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
    
};
