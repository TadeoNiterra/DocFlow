<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('recertificacion_detalles', function (Blueprint $table) {
            if (! Schema::hasColumn('recertificacion_detalles', 'departamento_ad')) {
                $table->string('departamento_ad')->nullable();
            }

            if (! Schema::hasColumn('recertificacion_detalles', 'clasificacion')) {
                $table->string('clasificacion')->nullable();
            }

            if (! Schema::hasColumn('recertificacion_detalles', 'tipo_cuenta')) {
                $table->string('tipo_cuenta')->nullable();
            }

            if (! Schema::hasColumn('recertificacion_detalles', 'mes_recertificacion')) {
                $table->string('mes_recertificacion')->nullable();
            }

            if (! Schema::hasColumn('recertificacion_detalles', 'fecha_creacion_ad')) {
                $table->dateTime('fecha_creacion_ad')->nullable();
            }

            if (! Schema::hasColumn('recertificacion_detalles', 'fecha_recertificacion')) {
                $table->dateTime('fecha_recertificacion')->nullable();
            }

            if (! Schema::hasColumn('recertificacion_detalles', 'fecha_cambio_ad')) {
                $table->dateTime('fecha_cambio_ad')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('recertificacion_detalles', function (Blueprint $table) {
            $table->dropColumn([
                'departamento_ad',
                'clasificacion',
                'tipo_cuenta',
                'mes_recertificacion',
                'fecha_creacion_ad',
                'fecha_recertificacion',
                'fecha_cambio_ad',
            ]);
        });
    }
};