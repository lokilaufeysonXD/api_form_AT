<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Ejecuta la migración.
     * Permite que el campo numero_orden_produccion acepte valores nulos.
     */
    public function up(): void
    {
        Schema::table('descripcion_material', function (Blueprint $table) {
            $table->string('numero_orden_produccion')->nullable()->change();
        });
    }

    /**
     * Revierte la migración.
     * Restaura el campo numero_orden_produccion como no nulo.
     */
    public function down(): void
    {
        Schema::table('descripcion_material', function (Blueprint $table) {
            $table->string('numero_orden_produccion')->nullable(false)->change();
        });
    }
};
?>
