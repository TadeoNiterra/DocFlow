<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_13_evidencias', function (Blueprint $table) {
            $table->id();
            $table->string('usuario', 50);
            $table->string('base', 50);
            $table->dateTime('fecha')->nullable();
            $table->string('version', 50);
            $table->string('descripcion', 255)->nullable();
            $table->string('status', 10);
            $table->string('observaciones', 50)->nullable();
            $table->string('rutaEvidencia', 255)->nullable();
            $table->dateTime('fecha_nueva')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_13_evidencias');
    }
};