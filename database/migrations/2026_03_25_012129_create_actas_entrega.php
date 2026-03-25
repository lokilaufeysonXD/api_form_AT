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
        Schema::create('actas_entrega', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('fecha_entrega');
            $table->foreignId('id_cliente')->constrained('nombre_cliente');
            $table->integer('numero_orden_compra');
            $table->foreignId('id_orden_produccion')->constrained('descripcion_material');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actas_entrega');
    }
};
