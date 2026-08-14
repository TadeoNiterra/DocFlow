<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_02_categorias', function (Blueprint $table) {
            $table->id();
            $table->enum('matriz_tipo', ['funciones', 'recursos'])->default('funciones');
            $table->string('nombre', 150);
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_02_categorias');
    }
};