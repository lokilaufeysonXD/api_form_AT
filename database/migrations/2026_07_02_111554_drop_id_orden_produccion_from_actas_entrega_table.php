<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('actas_entrega', function (Blueprint $table) {
            $table->dropForeign(['id_orden_produccion']);
            $table->dropColumn('id_orden_produccion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actas_entrega', function (Blueprint $table) {
            $table->foreignId('id_orden_produccion')->nullable()->constrained('descripcion_material');
        });
    }
};
