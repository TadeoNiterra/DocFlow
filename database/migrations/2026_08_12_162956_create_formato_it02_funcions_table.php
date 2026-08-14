<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_02_funcions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained('fmt_it_02_categorias')->cascadeOnDelete();
            $table->string('nombre', 255);
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_02_funcions');
    }
};