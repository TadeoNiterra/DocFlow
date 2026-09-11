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
        Schema::table('evidencia_proveedors', function (Blueprint $table) {
            // Se agrega la columna 'categoria' después de la relación con el proveedor
            $table->string('categoria')->default('otros')->after('proveedor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evidencia_proveedors', function (Blueprint $table) {
            $table->dropColumn('categoria');
        });
    }
};