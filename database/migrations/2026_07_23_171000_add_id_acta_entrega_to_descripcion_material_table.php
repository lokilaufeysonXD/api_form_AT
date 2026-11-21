<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * feat(database): agrega la columna id_acta_entrega a descripcion_material
 *
 * Qué cambió
 *   - Añade la columna id_acta_entrega como foreignId nullable.
 *   - Crea la clave foránea hacia la tabla actas_entrega.
 *
 * Por qué
 *   - La columna fue eliminada previamente y ahora es necesaria para la relación.
 *
 * Cómo probarlo
 *   1. Ejecutar `php artisan migrate`.
 *   2. Verificar que la tabla tenga la columna y la FK:
 *        SHOW CREATE TABLE descripcion_material;
 *   3. Ejecutar `php artisan migrate:rollback --step=1` y comprobar que la columna se elimina.
 */
return new class extends Migration
{
    /** Ejecuta la migración (añade la columna). */
    public function up(): void
    {
        // Asegurarse de que la columna no exista ya
        if (!Schema::hasColumn('descripcion_material', 'id_acta_entrega')) {
            // Desactivar temporalmente la comprobación de claves foráneas
            Schema::disableForeignKeyConstraints();

            Schema::table('descripcion_material', function (Blueprint $table) {
                $table->foreignId('id_acta_entrega')
                      ->nullable()
                      ->constrained('actas_entrega')
                      ->onDelete('cascade');
            });

            // Reactivar la comprobación de claves foráneas
            Schema::enableForeignKeyConstraints();
        }
    }

    /** Revierte la migración (elimina la columna). */
    public function down(): void
    {
        if (Schema::hasColumn('descripcion_material', 'id_acta_entrega')) {
            Schema::disableForeignKeyConstraints();
            Schema::table('descripcion_material', function (Blueprint $table) {
                $table->dropColumn('id_acta_entrega');
            });
            Schema::enableForeignKeyConstraints();
        }
    }
};
