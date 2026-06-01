<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Ej: PRO-CAL-001
            $table->string('name');           // Ej: Manual de Gestión de Calidad
            $table->text('description')->nullable(); 
            $table->string('type', 50);       // Ej: Manual, Procedimiento, Formato

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};