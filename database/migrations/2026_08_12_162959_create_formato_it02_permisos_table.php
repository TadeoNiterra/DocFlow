<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_02_permisos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rol_id')->constrained('fmt_it_02_rols')->cascadeOnDelete();
            $table->foreignId('funcion_id')->constrained('fmt_it_02_funcions')->cascadeOnDelete();
            $table->enum('valor', ['D', 'P', 'N'])->default('N');
            $table->timestamps();

            $table->unique(['rol_id', 'funcion_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_02_permisos');
    }
};