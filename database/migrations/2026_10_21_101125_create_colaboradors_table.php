<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->id();
            $table->string('id_colaborador')->unique(); // Clave principal única
            $table->string('name');
            $table->string('lastname');

            $table->foreignId('departamento_id')
                ->nullable()
                ->constrained('departamentos')
                ->nullOnDelete();
                

            $table->foreignId('puesto_id')
                ->nullable()
                ->constrained('puestos')
                ->nullOnDelete();
                
            $table->string('email')->unique();

            // Declaramos como nullable y sin ->unique() estricto
            $table->string('id_sap')->nullable();
            $table->string('id_vpn')->nullable();
            $table->string('id_cofidi')->nullable();
            $table->string('id_AD')->nullable();
            $table->string('num_tarjeta')->nullable();

            $table->boolean('DDEX')->default(false);
            $table->timestamps();
        });

        // Crear Índices Únicos Filtrados en SQL Server (Ignoran valores NULL)
        DB::statement('CREATE UNIQUE INDEX colaboradors_id_sap_unique ON colaboradors (id_sap) WHERE id_sap IS NOT NULL');
        DB::statement('CREATE UNIQUE INDEX colaboradors_id_vpn_unique ON colaboradors (id_vpn) WHERE id_vpn IS NOT NULL');
        DB::statement('CREATE UNIQUE INDEX colaboradors_id_cofidi_unique ON colaboradors (id_cofidi) WHERE id_cofidi IS NOT NULL');
        DB::statement('CREATE UNIQUE INDEX colaboradors_id_ad_unique ON colaboradors (id_AD) WHERE id_AD IS NOT NULL');
        DB::statement('CREATE UNIQUE INDEX colaboradors_num_tarjeta_unique ON colaboradors (num_tarjeta) WHERE num_tarjeta IS NOT NULL');
    }

    public function down(): void
    {
        Schema::dropIfExists('colaboradors');
    }
};