<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fmt_it_09_proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique();
            $table->string('proyecto');
            $table->date('fecha');
            $table->foreignId('user_id_creador')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fmt_it_09_proyectos');
    }
};