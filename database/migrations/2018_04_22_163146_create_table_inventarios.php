<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInventarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedInteger('producto_id')->nullable();
            $table->foreign('producto_id')->references('id')->on('productos')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedInteger('almacen_id')->nullable();
            $table->foreign('almacen_id')->references('id')->on('almacenes')->onUpdate('cascade')->onDelete('cascade');
            $table->double('cantidad')->nullable();
            
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
        Schema::dropIfExists('inventarios');
    }
}
