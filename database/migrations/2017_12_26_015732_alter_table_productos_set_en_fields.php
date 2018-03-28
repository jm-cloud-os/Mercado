<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProductosSetEnFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('nombre_en')->nullable()->after('nombre_es');
            $table->text('descripcion_corta_en')->nullable()->after('descripcion_corta_es');
            $table->text('descripcion_larga_en')->nullable()->after('descripcion_larga_es');
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
            $table->dropColumn(['nombre_en', 'descripcion_corta_en', 'descripcion_larga_en']);
        });
    }
}
