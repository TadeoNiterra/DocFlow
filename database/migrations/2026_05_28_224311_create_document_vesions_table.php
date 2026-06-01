<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('document_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained('documents')->onDelete('cascade');
            $table->string('version_number', 30);
            $table->text('change_description');
            $table->string('file_path');
            $table->string('file_name');

            // CAMBIO: El estatus pertenece de forma exclusiva a la versión
            $table->string('status', 30)->default('draft'); // draft, terminado, aprobado

            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_versions');
    }
};