<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Ejecutar la migración para crear la tabla desde cero.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // CAMPOS DE CONTROL DOCFLOW (Nuevos desde el origen)
            $table->string('role', 30)->default('user');                 // admin o user
            $table->string('is_active', 20)->default('Activo');              // Activo o Inactivo
            $table->string('default_raci_type', 30)->nullable();          // Responsible, Accountable, etc.

            $table->rememberToken();
            $table->timestamps();
        });

        // Tablas secundarias nativas de Laravel para sesiones y contraseñas (Opcionales pero recomendadas)
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Revertir la migración eliminando las tablas.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};