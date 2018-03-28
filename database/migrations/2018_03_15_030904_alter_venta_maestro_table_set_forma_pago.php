<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterVentaMaestroTableSetFormaPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('venta_maestro', function (Blueprint $table) {
            $table->string('forma_pago', 250)->nullable()->after('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('venta_maestro', function (Blueprint $table) {
            $table->dropColumns(['forma_pago']);
        });
    }
}
