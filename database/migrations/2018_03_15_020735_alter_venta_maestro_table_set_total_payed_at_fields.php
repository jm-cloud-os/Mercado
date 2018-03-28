<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterVentaMaestroTableSetTotalPayedAtFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('venta_maestro', function (Blueprint $table) {
            $table->timestamp('payed_at')->nullable()->after('user_id');
            $table->string('status', 255)->nullable()->after('user_id');
            $table->decimal('total', 12, 2)->default(0)->after('user_id');
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
            $table->dropColumn(['payed_at', 'status', 'total']);
        });
    }
}
