<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Ejecuta la migración.
     *
     * Cambia el tipo de la columna `numero_orden_produccion` en la tabla
     * `descripcion_material` de INT a DECIMAL(10,2).
     */
    public function up(): void
    {
        Schema::table('descripcion_material', function (Blueprint $table) {
            $table->decimal('numero_orden_produccion', 10, 2)->change();
        });
    }

    /**
     * Revierte la migración.
     *
     * Vuelve la columna a tipo INTEGER.
     */
    public function down(): void
    {
        Schema::table('descripcion_material', function (Blueprint $table) {
            $table->integer('numero_orden_produccion')->change();
        });
    }
};
