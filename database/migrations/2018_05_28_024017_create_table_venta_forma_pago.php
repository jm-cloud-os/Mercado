<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVentaFormaPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_forma_pago', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('venta_maestro_id')->nullable();
            $table->foreign('venta_maestro_id')->references('id')->on('venta_maestro')->onUpdate('cascade')->onDelete('cascade');
            $table->string('forma', 255)->nullable();
            $table->decimal('cantidad', 12, 2)->nullable();
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
        Schema::dropIfExists('venta_forma_pago');
    }
}
