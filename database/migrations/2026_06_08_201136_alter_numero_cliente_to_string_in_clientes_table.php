<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Cambia la columna numero_cliente de integer a string
     * para soportar ceros al inicio y formatos con decimales.
     */
    public function up(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('numero_cliente')->nullable()->change();
        });
    }

    /**
     * Revierte el cambio, volviendo numero_cliente a integer.
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->integer('numero_cliente')->nullable()->change();
        });
    }
};
