<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('document_versions', function (Blueprint $table) {
            // 1. Creamos las columnas primero como enteros normales que aceptan nulos
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->unsignedBigInteger('reviewed_by_id')->nullable();

            // Fechas de control de cambios TISAX
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('last_reviewed_at')->nullable();
            $table->timestamp('approved_at')->nullable();

            // 2. Declaramos las llaves foráneas con 'no action' para calmar a SQL Server
            $table->foreign('created_by_id')
                ->references('id')
                ->on('users')
                ->onDelete('no action');

            $table->foreign('reviewed_by_id')
                ->references('id')
                ->on('users')
                ->onDelete('no action');
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