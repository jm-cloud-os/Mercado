<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave', 255)->nullable();
            $table->string('nombre', 255)->nullable();
            $table->text('descripcion_corta')->nullable();
            $table->text('descripcion_larga')->nullable();
            $table->text('video')->nullable();
            $table->double('largo', 8, 2)->nullable();
            $table->double('ancho', 8, 2)->nullable();
            $table->double('alto', 8, 2)->nullable();
            $table->double('peso', 8, 2)->nullable();
            $table->double('disponibilidad', 8, 2)->nullable();
            $table->double('punto_reorden', 8, 2)->nullable();
            $table->decimal('costo', 8, 2)->nullable();
            $table->decimal('precio_individual', 8, 2)->nullable();
            $table->decimal('precio_paquete', 8, 2)->nullable();
            $table->smallInteger('disponible_mostrador')->nullable(false);
            $table->smallInteger('disponible_web')->nullable(false);
            
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
        Schema::dropIfExists('productos');
    }
}
