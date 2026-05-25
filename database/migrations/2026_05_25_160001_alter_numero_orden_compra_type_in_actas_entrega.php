<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('actas_entrega', function (Blueprint $table) {
            $table->string('numero_orden_compra')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actas_entrega', function (Blueprint $table) {
            $table->integer('numero_orden_compra')->change();
        });
    }
};
