<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameFieldsOnTableProductos1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->renameColumn('nombre', 'nombre_es');
            $table->renameColumn('descripcion_corta', 'descripcion_corta_es');
            $table->renameColumn('descripcion_larga', 'descripcion_larga_es');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->renameColumn('nombre_es', 'nombre');
            $table->renameColumn('descripcion_corta_es', 'descripcion_corta');
            $table->renameColumn('descripcion_larga_es', 'descripcion_larga');
        });
    }
}
