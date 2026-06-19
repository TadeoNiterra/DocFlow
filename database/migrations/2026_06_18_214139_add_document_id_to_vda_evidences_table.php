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
        Schema::table('vda_evidences', function (Blueprint $table) {
            // 🔥 Solución para SQL Server: Usamos noActionOnDelete() para evitar conflictos de rutas múltiples
            $table->foreignId('document_id')
                ->nullable()
                ->after('external_url')
                ->constrained('documents')
                ->noActionOnDelete(); // ✅ SQL Server aceptará esto perfectamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vda_evidences', function (Blueprint $table) {
            $table->dropForeign(['document_id']);
            $table->dropColumn('document_id');
        });
    }
};