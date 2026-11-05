<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('recertificacion_detalles', function (Blueprint $table) {
            // Hacemos colaborador_id opcional (ya no depende de la tabla local)
            $table->foreignId('colaborador_id')->nullable()->change();

            // Identificadores y datos nativos de Active Directory
            $table->string('guid_ad')->nullable()->index(); // objectGuid único e inmutable en AD
            $table->string('nombre_completo_ad')->nullable();
            $table->string('email_ad')->nullable();
            $table->string('distinguished_name')->nullable();

            // Clasificación comparativa contra el trimestre anterior
            $table->enum('tipo_cambio', [
                'NUEVO',              // Creado en este periodo
                'ELIMINADO',          // Borrado del AD respecto al trimestre previo
                'INHABILITADO',       // Se desactivó la cuenta
                'REACTIVADO',         // Estaba desactivada y se volvió a activar
                'SIN_CAMBIOS',        // Se mantiene vigente
            ])->default('SIN_CAMBIOS');
        });

        // Columnas resumen en la cabecera
        Schema::table('recertificacions', function (Blueprint $table) {
            $table->integer('total_nuevos')->default(0);
            $table->integer('total_inhabilitados')->default(0);
            $table->integer('total_reactivados')->default(0);
            $table->integer('total_eliminados')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('recertificacion_detalles', function (Blueprint $table) {
            $table->dropColumn(['guid_ad', 'nombre_completo_ad', 'email_ad', 'distinguished_name', 'tipo_cambio']);
        });

        Schema::table('recertificaciones', function (Blueprint $table) {
            $table->dropColumn(['total_nuevos', 'total_inhabilitados', 'total_reactivados', 'total_eliminados']);
        });
    }
};