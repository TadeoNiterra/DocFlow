<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_deletion_controls', function (Blueprint $table) {
            $table->id();
            $table->string('usuario')->comment('Nombre / Cuenta del usuario');
            $table->date('fecha_baja');
            $table->date('fecha_final_periodo')->nullable();
            $table->integer('dias_revision_respaldos')->default(30)->comment('Días de revisión');
            $table->date('fecha_autorizacion_eliminacion')->nullable();
            $table->date('fecha_eliminacion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_deletion_controls');
    }
};