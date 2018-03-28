<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_detalle', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedInteger('venta_maestro_id')->nullable();
            $table->foreign('venta_maestro_id')->references('id')->on('venta_maestro')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedInteger('producto_id')->nullable();
            $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedInteger('paquete_id')->nullable();
            $table->foreign('paquete_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('cascade');
            
            $table->string('nombre_producto', 255)->nullable();
            $table->string('nombre_paquete', 255)->nullable();
            $table->double('cantidad', 15, 2)->default(0);
            $table->decimal('precio', 8, 2)->default(0);
            $table->tinyInteger('en_paquete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta_detalle');
    }
}
