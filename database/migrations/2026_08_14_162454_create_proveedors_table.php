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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('razonSocial');
            $table->string('actividad');
            $table->string('status');
            $table->string('departamentoResponsable');
            $table->string('personaContacto')->nullable();
            $table->string('numeroContacto')->nullable();
            $table->string('email')->nullable();
            $table->year('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};