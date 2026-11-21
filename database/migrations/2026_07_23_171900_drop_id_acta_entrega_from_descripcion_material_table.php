<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * feat(database): elimina la columna id_acta_entrega de descripcion_material
 */
return new class extends Migration
{
    /** Ejecuta la migración (elimina). */
    public function up(): void
    {
        // Desactivar temporalmente la comprobación de FK
        Schema::disableForeignKeyConstraints();

        // Eliminar la columna (las FK relacionadas se eliminan automáticamente)
        Schema::table('descripcion_material', function (Blueprint $table) {
            $table->dropColumn('id_acta_entrega');
        });

        // Reactivar la comprobación de FK
        Schema::enableForeignKeyConstraints();
    }

    /** Revierte la migración (recrea la columna). */
    public function down(): void
    {
        Schema::table('descripcion_material', function (Blueprint $table) {
            $table->foreignId('id_acta_entrega')
                  ->nullable()
                  ->constrained('actas_entrega')
                  ->onDelete('cascade');
        });
    }
};
