<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formato_it22_evaluations', function (Blueprint $table) {
            $table->id();

            // 🟢 Relación directa con la tabla proveedors
            $table->foreignId('proveedor_id')
                ->nullable()
                ->constrained('proveedors')
                ->nullOnDelete();

            // Metadatos de la Evaluación F-IT-22
            $table->string('supplier_name'); // Almacena el nombre del proveedor para históricos
            $table->string('supplier_representative')->nullable();
            $table->enum('audit_type', ['precalificacion', 'autoevaluacion', 'otro'])->default('autoevaluacion');
            $table->string('audit_type_other')->nullable();
            $table->date('evaluation_date');
            $table->decimal('target_score', 5, 2)->default(85.00);
            $table->decimal('previous_score', 5, 2)->nullable();
            $table->string('evaluator_name');
            $table->string('telephone')->nullable();
            $table->string('sow')->nullable(); // Statement of Work
            $table->string('sla')->nullable(); // Service Level Agreement
            $table->string('evaluation_period')->nullable();
            $table->string('evaluation_reason')->nullable();

            // Antecedentes del Proveedor
            $table->boolean('bg_has_certifications')->default(false);
            $table->string('bg_market_time')->nullable();
            $table->boolean('bg_has_support_channels')->default(false);
            $table->boolean('bg_has_247_support')->default(false);
            $table->text('bg_comments')->nullable();

            // Calificación de Controles (10 Ítems: 0 a 3 Pts cada uno)
            $table->unsignedTinyInteger('q1_score')->default(0);  // Certificaciones
            $table->unsignedTinyInteger('q2_score')->default(0);  // Accesos Físicos - Políticas
            $table->unsignedTinyInteger('q3_score')->default(0);  // Accesos Físicos - Registro
            $table->unsignedTinyInteger('q4_score')->default(0);  // Accesos Físicos - Infraestructura
            $table->unsignedTinyInteger('q5_score')->default(0);  // Accesos Lógicos - Políticas
            $table->unsignedTinyInteger('q6_score')->default(0);  // Accesos Lógicos - Autenticación
            $table->unsignedTinyInteger('q7_score')->default(0);  // Accesos Lógicos - Recuperación
            $table->unsignedTinyInteger('q8_score')->default(0);  // Dominio Protegido
            $table->unsignedTinyInteger('q9_score')->default(0);  // Info Legal / Contractual
            $table->unsignedTinyInteger('q10_score')->default(0); // Aviso de Privacidad

            // Desglose de Puntuación por Secciones (Para la tabla de resumen F-IT-22)
            $table->unsignedTinyInteger('sec1_score')->default(0);   // Máx 3 Pts
            $table->decimal('sec1_percent', 5, 2)->default(0.00);

            $table->unsignedTinyInteger('sec2_score')->default(0);   // Máx 9 Pts
            $table->decimal('sec2_percent', 5, 2)->default(0.00);

            $table->unsignedTinyInteger('sec3_score')->default(0);   // Máx 9 Pts
            $table->decimal('sec3_percent', 5, 2)->default(0.00);

            $table->unsignedTinyInteger('sec4_score')->default(0);   // Máx 3 Pts
            $table->decimal('sec4_percent', 5, 2)->default(0.00);

            $table->unsignedTinyInteger('sec5_score')->default(0);   // Máx 6 Pts
            $table->decimal('sec5_percent', 5, 2)->default(0.00);

            // Totales Generales Calculados
            $table->unsignedTinyInteger('actual_score')->default(0); // Máx 30 Pts
            $table->decimal('percentage', 5, 2)->default(0.00);
            $table->enum('classification', ['calificado', 'sujeto_a_mejora', 'evaluacion_extraordinaria'])->default('evaluacion_extraordinaria');

            // Remediación y Usuario Registrador
            $table->boolean('requires_remediation')->default(false);
            $table->date('remediation_deadline')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formato_it22_evaluations');
    }
};