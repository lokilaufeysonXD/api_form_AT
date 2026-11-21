<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración para añadir la columna id_acta_entrega y su clave foránea.
 * Si la columna ya existe, no realiza ninguna acción adicional.
 */
return new class extends Migration
{
    /** Ejecuta la migración. */
    public function up(): void
    {
        // Añadir la columna solo si no existe
        if (!Schema::hasColumn('descripcion_material', 'id_acta_entrega')) {
            Schema::table('descripcion_material', function (Blueprint $table) {
                $table->foreignId('id_acta_entrega')
                      ->nullable()
                      ->constrained('actas_entrega')
                      ->onDelete('cascade');
            });
        }
    }

    /** Revierte la migración. */
    public function down(): void
    {
        Schema::table('descripcion_material', function (Blueprint $table) {
            $table->dropForeign(['id_acta_entrega']);
            $table->dropColumn('id_acta_entrega');
        });
    }
};
