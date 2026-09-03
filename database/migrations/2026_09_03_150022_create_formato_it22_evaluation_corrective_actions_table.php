<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formato_it22_evaluation_corrective_actions', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('formato_it22_evaluation_id')
                ->constrained('formato_it22_evaluations')
                ->cascadeOnDelete();

            $table->string('item')->nullable();
            $table->text('concern');    // Hallazgo / Inquietud
            $table->text('action');     // Acción Correctiva Propuesta
            $table->string('responsible');
            $table->date('start_date');
            $table->date('close_date')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formato_it22_evaluation_corrective_actions');
    }
};