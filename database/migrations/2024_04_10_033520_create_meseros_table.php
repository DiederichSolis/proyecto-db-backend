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
        $table->increments('id');
        $table->string('nombre', 100);
        $table->integer('Id_mesa')->unsigned();
        $table->foreign('Id_mesa')->references('id')->on('mesas');
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
    Schema::dropIfExists('meseros');
}
};
