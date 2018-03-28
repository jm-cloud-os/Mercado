<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaqueteProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete_producto', function (Blueprint $table) {
            $table->unsignedInteger('paquete_id')->nullable();
            $table->foreign('paquete_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('producto_id')->nullable();
            $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('cantidad')->default(0);
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
        Schema::dropIfExists('paquete_producto');
    }
}
