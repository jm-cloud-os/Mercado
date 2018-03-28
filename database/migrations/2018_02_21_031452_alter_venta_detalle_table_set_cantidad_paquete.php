<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterVentaDetalleTableSetCantidadPaquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('venta_detalle', function (Blueprint $table) {
            $table->double('cantidad_paquetes')->default(0)->after('en_paquete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('venta_detalle', function (Blueprint $table) {
            $table->dropColumn(['cantidad_paquetes']);
        });
    }
}
