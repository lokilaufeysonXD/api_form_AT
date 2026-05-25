<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Ejecuta la migración.
     */
    public function up(): void
    {
        Schema::table('descripcion_material', function (Blueprint $table) {
            $table->decimal('numero_orden_produccion', 15, 5)->change();
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::table('descripcion_material', function (Blueprint $table) {
            $table->decimal('numero_orden_produccion', 10, 2)->change();
        });
    }
};
?>
