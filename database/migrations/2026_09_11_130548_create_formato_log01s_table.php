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
        Schema::create('formato_log01s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proveedor_id')
                ->nullable()
                ->constrained('proveedors')
                ->nullOnDelete();
            $table->string('area');
            $table->boolean('tipo');
            $table->date('fecha');
            $table->date('fechaAnterior');
            $table->string('producto');
            $table->integer('precio')->unsigned();
            $table->integer('respuesta')->unsigned();
            $table->integer('experiencia')->unsigned();
            $table->integer('pago')->unsigned();
            $table->integer('pregunta1')->unsigned();
            $table->integer('pregunta2')->unsigned();
            $table->integer('pregunta3')->unsigned();
            $table->integer('pregunta4')->unsigned();
            $table->integer('pregunta5')->unsigned();
            $table->integer('pregunta6')->unsigned();
            $table->integer('pregunta7')->unsigned();
            $table->integer('pregunta8')->unsigned();
            $table->integer('pregunta9')->unsigned();
            $table->integer('pregunta10')->unsigned();
            $table->integer('pregunta11')->unsigned();
            $table->integer('pregunta12')->unsigned();
            $table->integer('pregunta13')->unsigned();
            $table->integer('pregunta14')->unsigned();
            $table->integer('pregunta15')->unsigned();
            $table->string('evaluador');
            $table->boolean('contrato');
            $table->boolean('vigencia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formato_log01s');
    }
};