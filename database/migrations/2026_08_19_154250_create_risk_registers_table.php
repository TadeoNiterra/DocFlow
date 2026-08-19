<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('risk_registers', function (Blueprint $table) {
            $table->id();

            // 1. Identificación
            $table->string('code_id')->comment('ID único ej. R.TI.001');
            $table->string('proceso')->default('Sistemas');
            $table->text('asset')->nullable()->comment('Activo afectado');

            // 2. Vulnerabilidad y Amenaza
            $table->string('tipo_vulnerabilidad')->nullable();
            $table->string('vulnerabilidad')->nullable();
            $table->string('tipo_amenaza')->nullable();
            $table->string('amenaza')->nullable();
            $table->text('risk_description')->nullable();
            $table->string('risk_owner')->nullable();
            $table->text('impact_description')->nullable();

            // 3. Evaluación de Riesgo Inherente
            $table->decimal('prob', 5, 4)->default(0.0100)->comment('0.01 a 1.0');
            $table->decimal('impact', 5, 4)->default(0.0100)->comment('0.01 a 1.0');
            $table->decimal('priority', 5, 4)->storedAs('prob * impact')->comment('Calculado automáticamente (P x I)');

            // 4. Plan de Mitigación y Controles
            $table->string('categoria_control')->nullable();
            $table->text('mitigation_description')->nullable();
            $table->text('mitigation_description_2')->nullable();
            $table->string('m_cost')->nullable();
            $table->decimal('m_status', 5, 4)->default(1.0000)->comment('Porcentaje de avance (0 a 1)');
            $table->decimal('treatment_plan', 5, 4)->default(0.2500);

            // 5. Evaluación de Riesgo Residual
            $table->decimal('prob_2', 5, 4)->default(0.0100);
            $table->decimal('impact_2', 5, 4)->default(0.0100);
            $table->decimal('priority_2', 5, 4)->storedAs('prob_2 * impact_2')->comment('Calculado automáticamente (P2 x I2)');
            $table->decimal('current_risk_rating', 5, 4)->nullable();

            // 6. Seguimiento y Respaldo
            $table->text('comentarios_residuales')->nullable();
            $table->date('date_last_reviewed')->nullable();
            $table->string('updated_by')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('risk_registers');
    }
};