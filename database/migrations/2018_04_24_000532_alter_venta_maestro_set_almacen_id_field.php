<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterVentaMaestroSetAlmacenIdField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('venta_maestro', function (Blueprint $table) {
            $table->unsignedInteger('almacen_id')->nullable()->after('user_id');
            $table->foreign('almacen_id')->references('id')->on('almacenes')->onUpdate('cascade')->onDelete('cascade');
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
            $table->dropColumn(['almacen_id']);
        });
    }
}
