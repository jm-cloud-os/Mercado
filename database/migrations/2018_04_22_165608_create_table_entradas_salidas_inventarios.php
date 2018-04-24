<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEntradasSalidasInventarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas_salidas_inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('producto_id')->nullable();
            $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('almacen_id')->nullable();
            $table->foreign('almacen_id')->references('id')->on('almacenes')->onUpdate('cascade')->onDelete('cascade');
            
            $table->double('cantidad')->nullable();
            $table->string('movimiento', 255)->nullable();//entrada, salida
            $table->string('tipo', 255)->nullable();//venta, baja, alta
            $table->text('descripcion')->nullable();//requerido si es baja de inventario
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas_salidas_inventarios');
    }
}
