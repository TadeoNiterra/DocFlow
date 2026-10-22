<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('modelo_equipos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo'); // Laptop, Desktop, iPhone, Android, Monitor
            $table->string('marca'); // Lenovo, Apple, Dell, Honor
            $table->string('modelo'); // ThinkPad T16, iPhone 14 128GB, X8A

            // Especificaciones técnicas de la variante/modelo
            $table->string('processor')->nullable(); // Core Ultra 7
            $table->string('ram_memory')->nullable(); // 32 GB
            $table->string('ssd')->nullable(); // 512 GB
            $table->string('screen')->nullable(); // 15"
            $table->string('type_laptop')->nullable(); // SPECIAL, STANDARD

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modelo_equipos');
    }
};