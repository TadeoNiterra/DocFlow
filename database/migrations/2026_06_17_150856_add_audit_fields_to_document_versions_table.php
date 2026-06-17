<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('document_versions', function (Blueprint $table) {
            // Relaciones con la tabla de usuarios (pueden ser nulos al inicio)
            $table->foreignId('created_by_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('reviewed_by_id')->nullable()->constrained('users')->nullOnDelete();

            // Fechas de control de cambios TISAX
            $table->timestamp('reviewed_at')->nullable();       // Fecha de revisión
            $table->timestamp('last_reviewed_at')->nullable();  // Fecha de última revisión
            $table->timestamp('approved_at')->nullable();       // Fecha de aprobación
        });
    }

    public function down(): void
    {
        Schema::table('document_versions', function (Blueprint $table) {
            $table->dropColumn([
                'created_by_id',
                'reviewed_by_id',
                'reviewed_at',
                'last_reviewed_at',
                'approved_at'
            ]);
        });
    }
};