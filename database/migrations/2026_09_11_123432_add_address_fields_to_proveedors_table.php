<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('proveedors', function (Blueprint $table) {
            $table->string('domicilio')->nullable()->after('email');
            $table->string('colonia')->nullable()->after('domicilio');
            $table->string('municipio')->nullable()->after('colonia');
            $table->string('ciudad')->nullable()->after('municipio');
            $table->string('cp', 10)->nullable()->after('ciudad');
            $table->string('pais')->nullable()->default('México')->after('cp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proveedors', function (Blueprint $table) {
            $table->dropColumn(['domicilio', 'colonia', 'municipio', 'ciudad', 'cp', 'pais']);
        });
    }
};