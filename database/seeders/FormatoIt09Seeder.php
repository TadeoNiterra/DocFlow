<?php

namespace Database\Seeders;

use App\Models\FormatoIt09Activo;
use App\Models\FormatoIt09Proyecto;
use App\Models\FormatoIt09Riesgo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatoIt09Seeder extends Seeder
{
    private function generarFolio(string $fecha, int $consecutivo): string
    {
        $year = Carbon::parse($fecha)->format('Y');
        $pad = str_pad($consecutivo, 3, '0', STR_PAD_LEFT);

        return "FMT-IT09-{$year}-{$pad}";
    }

    public function run(): void
    {
        $creador = User::where('email', 'jesus.marron@niterragroup.com')->first()
            ?? User::first()
            ?? User::create([
                'name'     => 'Administrador TI',
                'email'    => 'admin.it@niterragroup.com',
                'password' => bcrypt('password123'),
            ]);

        $proyectosData = [
            // -------------------------------------------------------------
            // 1. Implementación de PAM (Rev. 0)
            // -------------------------------------------------------------
            [
                'proyecto' => 'Implementación de PAM',
                'fecha'    => '2024-03-01',
                'activos'  => [],
                'riesgos'  => [
                    [
                        'numero' => 1,
                        'riesgo_problema' => 'Intercambio de información con proveedores.',
                        'c' => true, 'i' => false, 'd' => false,
                        'probabilidad' => 2, 'severidad' => 4, 'puntaje' => 8,
                        'nivel_riesgo' => 'M',
                        'tratamiento_causa' => 'Firma de acuerdo de no divulgación',
                    ],
                    [
                        'numero' => 2,
                        'riesgo_problema' => 'Control de accesos a información',
                        'c' => true, 'i' => false, 'd' => true,
                        'probabilidad' => 1, 'severidad' => 4, 'puntaje' => 4,
                        'nivel_riesgo' => 'L',
                        'tratamiento_causa' => "Aplicación de la POL-IT-05 Política de control de accesos\nPOL-IT-02 Rev. 0 Política de clasificación y manejo de información.docx",
                    ],
                    [
                        'numero' => 3,
                        'riesgo_problema' => 'Afectación de la continuidad de servicios de IT',
                        'c' => false, 'i' => true, 'd' => true,
                        'probabilidad' => 1, 'severidad' => 3, 'puntaje' => 3,
                        'nivel_riesgo' => 'L',
                        'tratamiento_causa' => 'POL-IT-13 Rev. 0 Política de gestión de riesgos en proyectos',
                    ],
                    [
                        'numero' => 5,
                        'riesgo_problema' => 'Pérdida o robo de la información',
                        'c' => true, 'i' => true, 'd' => true,
                        'probabilidad' => 1, 'severidad' => 4, 'puntaje' => 4,
                        'nivel_riesgo' => 'L',
                        'tratamiento_causa' => 'POL-IT-13 Rev. 0 Política de gestión de riesgos en proyectos',
                    ],
                    [
                        'numero' => 7,
                        'riesgo_problema' => 'Rotación del personal',
                        'c' => true, 'i' => false, 'd' => true,
                        'probabilidad' => 2, 'severidad' => 2, 'puntaje' => 4,
                        'nivel_riesgo' => 'L',
                        'tratamiento_causa' => 'PO-IT-03 Rev. 0 Creación, modificación y eliminación de usuarios.',
                    ],
                    [
                        'numero' => 9,
                        'riesgo_problema' => 'Ataque cibernético',
                        'c' => false, 'i' => true, 'd' => false,
                        'probabilidad' => 1, 'severidad' => 3, 'puntaje' => 3,
                        'nivel_riesgo' => 'L',
                        'tratamiento_causa' => "POL-IT-07 Rev. 0 Política de seguridad en redes\nPOL-IT-13 Rev. 0 Política de gestión de riesgos en proyectos",
                    ],
                ],
            ],

            // -------------------------------------------------------------
            // 2. Manage Engine (Rev. 1)
            // -------------------------------------------------------------
            [
                'proyecto' => 'Manage Engine',
                'fecha'    => '2024-07-20',
                'activos'  => [
                    ['id_activo' => 'DM', 'activo' => 'Dispositivos moviles', 'clasificacion' => 'Privado', 'revision_inicial' => '2024-08-06', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2024-09-06', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2024-10-04', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'SV', 'activo' => 'Servidores', 'clasificacion' => 'Confidencial', 'revision_inicial' => '2024-08-06', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2024-09-06', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2024-10-04', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'BD', 'activo' => 'Bases de datos', 'clasificacion' => 'Confidencial', 'revision_inicial' => '2024-08-06', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2024-09-06', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2024-10-04', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'SW', 'activo' => 'Herramientas de software', 'clasificacion' => 'Privado', 'revision_inicial' => '2024-08-06', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2024-09-06', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2024-10-04', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'IN', 'activo' => 'Información', 'clasificacion' => 'Clasificado', 'revision_inicial' => '2024-08-06', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2024-09-06', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2024-10-04', 'resultado_final' => 'clasificacion adecuada'],
                ],
                'riesgos'  => [
                    ['numero' => 1, 'riesgo_problema' => 'Intercambio de información con proveedores.', 'c' => true, 'i' => false, 'd' => false, 'probabilidad' => 2, 'severidad' => 4, 'puntaje' => 8, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Firma de NDA y acuerdo de no divulgación'],
                    ['numero' => 2, 'riesgo_problema' => 'Control de accesos a información confidencial', 'c' => true, 'i' => false, 'd' => true, 'probabilidad' => 1, 'severidad' => 4, 'puntaje' => 4, 'nivel_riesgo' => 'L', 'tratamiento_causa' => 'Aplicación de la PO-TI-04 Política de control de accesos'],
                    ['numero' => 3, 'riesgo_problema' => 'Afectación de la continuidad de servicios de IT', 'c' => false, 'i' => true, 'd' => true, 'probabilidad' => 1, 'severidad' => 3, 'puntaje' => 3, 'nivel_riesgo' => 'L', 'tratamiento_causa' => 'Plan de recuperación de desastres y continuidad de negocio'],
                    ['numero' => 4, 'riesgo_problema' => 'Uso de dispositivos no autorizados', 'c' => true, 'i' => true, 'd' => false, 'probabilidad' => 2, 'severidad' => 4, 'puntaje' => 8, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'PO-TI-07 Política de dispositivos móviles'],
                    ['numero' => 5, 'riesgo_problema' => 'Pérdida o robo de la información', 'c' => true, 'i' => true, 'd' => true, 'probabilidad' => 2, 'severidad' => 4, 'puntaje' => 8, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Plan de recuperación de desastres y continuidad de negocio'],
                    ['numero' => 6, 'riesgo_problema' => 'Falta de respaldos', 'c' => false, 'i' => true, 'd' => true, 'probabilidad' => 1, 'severidad' => 1, 'puntaje' => 0, 'nivel_riesgo' => 'L', 'tratamiento_causa' => 'Reporte de prueba de continuidad'],
                    ['numero' => 7, 'riesgo_problema' => 'Rotación del personal', 'c' => true, 'i' => false, 'd' => true, 'probabilidad' => 2, 'severidad' => 2, 'puntaje' => 4, 'nivel_riesgo' => 'L', 'tratamiento_causa' => 'PR-RH-004 Procedimiento de Recursos Humanos'],
                    ['numero' => 8, 'riesgo_problema' => 'Incumplimiento a acuerdos contractuales o requisitos legales', 'c' => true, 'i' => false, 'd' => false, 'probabilidad' => 1, 'severidad' => 3, 'puntaje' => 3, 'nivel_riesgo' => 'L', 'tratamiento_causa' => 'PR-EHS-004 Rev. 12 Requisitos legales'],
                    ['numero' => 9, 'riesgo_problema' => 'Ataque cibernético', 'c' => false, 'i' => true, 'd' => false, 'probabilidad' => 1, 'severidad' => 3, 'puntaje' => 3, 'nivel_riesgo' => 'L', 'tratamiento_causa' => '5.2.3 Implementación y mantenimiento de antivirus'],
                    ['numero' => 10, 'riesgo_problema' => 'Desastres naturales', 'c' => false, 'i' => false, 'd' => true, 'probabilidad' => 2, 'severidad' => 2, 'puntaje' => 4, 'nivel_riesgo' => 'L', 'tratamiento_causa' => 'Plan de recuperación de desastres y continuidad de negocio'],
                ],
            ],

            // -------------------------------------------------------------
            // 3. Migración a Google (Rev. 1)
            // -------------------------------------------------------------
            [
                'proyecto' => 'Migración a Google',
                'fecha'    => '2025-01-20',
                'activos'  => [
                    ['id_activo' => 'DM', 'activo' => 'Dispositivos moviles', 'clasificacion' => 'Privado', 'revision_inicial' => '2024-12-09', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2025-01-06', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2025-01-20', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'SV', 'activo' => 'Servidores', 'clasificacion' => 'Confidencial', 'revision_inicial' => '2024-12-09', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2025-01-06', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2025-01-20', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'BD', 'activo' => 'Bases de datos', 'clasificacion' => 'Confidencial', 'revision_inicial' => '2024-12-09', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2025-01-06', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2025-01-20', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'SW', 'activo' => 'Herramientas de software', 'clasificacion' => 'Privado', 'revision_inicial' => '2024-12-09', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2025-01-06', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2025-01-20', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'IN', 'activo' => 'Información', 'clasificacion' => 'Clasificado', 'revision_inicial' => '2024-12-09', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2025-01-06', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2025-01-20', 'resultado_final' => 'clasificacion adecuada'],
                ],
                'riesgos'  => [
                    ['numero' => 1, 'riesgo_problema' => 'Pérdida parcial o total de correos electrónicos durante la migración', 'c' => true, 'i' => true, 'd' => true, 'probabilidad' => 3, 'severidad' => 4, 'puntaje' => 12, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Migración por fases, respaldos previos, validaciones automáticas'],
                    ['numero' => 2, 'riesgo_problema' => 'Archivos con formatos incompatibles (Excel a Sheets, Word a Docs)', 'c' => true, 'i' => true, 'd' => false, 'probabilidad' => 3, 'severidad' => 3, 'puntaje' => 9, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Validación de compatibilidad, conversión automatizada o uso de Google Drive para escritorio'],
                    ['numero' => 3, 'riesgo_problema' => 'Pérdida de permisos o configuraciones de acceso en archivos', 'c' => true, 'i' => true, 'd' => true, 'probabilidad' => 3, 'severidad' => 4, 'puntaje' => 12, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Auditoría de permisos antes y después, herramientas de migración compatibles'],
                    ['numero' => 4, 'riesgo_problema' => 'Falta de conocimiento del personal en uso de herramientas de Google', 'c' => true, 'i' => true, 'd' => false, 'probabilidad' => 4, 'severidad' => 3, 'puntaje' => 12, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Plan de capacitación, videos, guías, soporte interno'],
                    ['numero' => 5, 'riesgo_problema' => 'Error en la migración de calendarios, eventos duplicados o perdidos', 'c' => true, 'i' => true, 'd' => false, 'probabilidad' => 3, 'severidad' => 3, 'puntaje' => 9, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Migración piloto, validación por usuario, uso de herramientas nativas de Google'],
                    ['numero' => 6, 'riesgo_problema' => 'Interrupción temporal en los servicios durante la migración', 'c' => true, 'i' => true, 'd' => false, 'probabilidad' => 2, 'severidad' => 4, 'puntaje' => 8, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Migración fuera de horario laboral, comunicación previa con usuarios'],
                    ['numero' => 7, 'riesgo_problema' => 'Fallos en la integración con aplicaciones de terceros (ej. CRM, ERP)', 'c' => true, 'i' => true, 'd' => false, 'probabilidad' => 2, 'severidad' => 4, 'puntaje' => 8, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Identificación previa de dependencias, pruebas de integración'],
                    ['numero' => 8, 'riesgo_problema' => 'Pérdida de metadatos de documentos (fechas, autores, versiones)', 'c' => true, 'i' => false, 'd' => false, 'probabilidad' => 2, 'severidad' => 3, 'puntaje' => 6, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Uso de herramientas que respeten metadatos, documentación del proceso'],
                    ['numero' => 9, 'riesgo_problema' => 'Riesgos de cumplimiento legal o normativo por mal manejo de datos', 'c' => true, 'i' => true, 'd' => true, 'probabilidad' => 2, 'severidad' => 5, 'puntaje' => 10, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Involucrar a equipo legal, validar políticas de privacidad y retención'],
                    ['numero' => 10, 'riesgo_problema' => 'Acceso no autorizado a información migrada (configuración incorrecta)', 'c' => true, 'i' => true, 'd' => true, 'probabilidad' => 3, 'severidad' => 4, 'puntaje' => 12, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Auditorías de seguridad, doble validación de cuentas, MFA'],
                ],
            ],

            // -------------------------------------------------------------
            // 4. BFISKUR (Rev. 1)
            // -------------------------------------------------------------
            [
                'proyecto' => 'BFISKUR',
                'fecha'    => '2025-01-20',
                'activos'  => [
                    ['id_activo' => 'DM', 'activo' => 'Dispositivos moviles', 'clasificacion' => 'N/A', 'revision_inicial' => null, 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => null, 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => null, 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'SV', 'activo' => 'Servidores', 'clasificacion' => 'N/A', 'revision_inicial' => null, 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => null, 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => null, 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'BD', 'activo' => 'Bases de datos', 'clasificacion' => 'N/A', 'revision_inicial' => null, 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => null, 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => null, 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'SW', 'activo' => 'Herramientas de software', 'clasificacion' => 'Privado', 'revision_inicial' => '2024-06-20', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2024-09-04', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2025-04-14', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'IN', 'activo' => 'Información', 'clasificacion' => 'Clasificado', 'revision_inicial' => '2024-06-20', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2024-09-04', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2025-04-14', 'resultado_final' => 'clasificacion adecuada'],
                ],
                'riesgos'  => [
                    ['numero' => 1, 'riesgo_problema' => 'problema en la descarga de XML', 'c' => false, 'i' => true, 'd' => true, 'probabilidad' => 2, 'severidad' => 1, 'puntaje' => 2, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 2, 'riesgo_problema' => 'problema con la conexión con SAT', 'c' => false, 'i' => false, 'd' => true, 'probabilidad' => 2, 'severidad' => 2, 'puntaje' => 4, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 3, 'riesgo_problema' => 'Pérdida de permisos o configuraciones de acceso a usuarios', 'c' => true, 'i' => true, 'd' => true, 'probabilidad' => 1, 'severidad' => 3, 'puntaje' => 3, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 4, 'riesgo_problema' => 'Falta de conocimiento del personal en uso de BFISKUR', 'c' => false, 'i' => false, 'd' => true, 'probabilidad' => 2, 'severidad' => 3, 'puntaje' => 6, 'nivel_riesgo' => 'M', 'tratamiento_causa' => null],
                    ['numero' => 5, 'riesgo_problema' => 'mala introduccion de datos y realice una simulacion con datos erroneos', 'c' => false, 'i' => false, 'd' => true, 'probabilidad' => 2, 'severidad' => 1, 'puntaje' => 2, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 6, 'riesgo_problema' => 'Riesgos de cumplimiento legal o normativo por mal manejo de datos', 'c' => true, 'i' => true, 'd' => true, 'probabilidad' => 2, 'severidad' => 2, 'puntaje' => 4, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 7, 'riesgo_problema' => 'Acceso no autorizado a BFISKUR', 'c' => true, 'i' => false, 'd' => false, 'probabilidad' => 1, 'severidad' => 4, 'puntaje' => 4, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                ],
            ],

            // -------------------------------------------------------------
            // 5. APSI (Rev. 1)
            // -------------------------------------------------------------
            [
                'proyecto' => 'APSI',
                'fecha'    => '2025-01-20',
                'activos'  => [
                    ['id_activo' => 'DM', 'activo' => 'Dispositivos moviles', 'clasificacion' => 'N/A', 'revision_inicial' => null, 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => null, 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => null, 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'SV', 'activo' => 'Servidores', 'clasificacion' => 'N/A', 'revision_inicial' => null, 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => null, 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => null, 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'BD', 'activo' => 'Bases de datos', 'clasificacion' => 'N/A', 'revision_inicial' => null, 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => null, 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => null, 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'SW', 'activo' => 'Herramientas de software', 'clasificacion' => 'Privado', 'revision_inicial' => '2025-01-29', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2025-04-04', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2025-05-06', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'IN', 'activo' => 'Información', 'clasificacion' => 'Confidencial', 'revision_inicial' => '2025-01-29', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2025-04-04', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2025-05-06', 'resultado_final' => 'clasificacion adecuada'],
                ],
                'riesgos'  => [
                    ['numero' => 1, 'riesgo_problema' => 'perdida de informacion de alguna persona en las altas a APSI', 'c' => false, 'i' => false, 'd' => false, 'probabilidad' => 1, 'severidad' => 1, 'puntaje' => 0, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 2, 'riesgo_problema' => 'problemas al exportar archivos', 'c' => false, 'i' => false, 'd' => false, 'probabilidad' => 1, 'severidad' => 1, 'puntaje' => 0, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 3, 'riesgo_problema' => 'perdida de comunicación con APSI en Reynosa', 'c' => false, 'i' => false, 'd' => false, 'probabilidad' => 1, 'severidad' => 1, 'puntaje' => 0, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 4, 'riesgo_problema' => 'Falta de conocimiento del personal en uso de APSI', 'c' => false, 'i' => false, 'd' => false, 'probabilidad' => 1, 'severidad' => 1, 'puntaje' => 0, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 5, 'riesgo_problema' => 'error en la sincronizacion de datos de APSI', 'c' => false, 'i' => false, 'd' => false, 'probabilidad' => 1, 'severidad' => 1, 'puntaje' => 0, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 6, 'riesgo_problema' => 'Interrupción temporal en los servicios durante los updates que solicita Reynosa', 'c' => false, 'i' => false, 'd' => false, 'probabilidad' => 1, 'severidad' => 1, 'puntaje' => 0, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 7, 'riesgo_problema' => 'Fallo con la comunicación con proveedor intermediario de APSI', 'c' => false, 'i' => false, 'd' => false, 'probabilidad' => 1, 'severidad' => 1, 'puntaje' => 0, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 8, 'riesgo_problema' => 'perdida de toda la informacion de los datos de Mexico', 'c' => false, 'i' => false, 'd' => false, 'probabilidad' => 1, 'severidad' => 1, 'puntaje' => 0, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 9, 'riesgo_problema' => 'la exportacion de datos de Biotime para subir a APSI', 'c' => false, 'i' => false, 'd' => false, 'probabilidad' => 1, 'severidad' => 1, 'puntaje' => 0, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                    ['numero' => 10, 'riesgo_problema' => 'que los accesos de usuarios dejen de funcionar', 'c' => false, 'i' => false, 'd' => false, 'probabilidad' => 1, 'severidad' => 1, 'puntaje' => 0, 'nivel_riesgo' => 'L', 'tratamiento_causa' => null],
                ],
            ],

            // -------------------------------------------------------------
            // 6. Cambio de equipos (Rev. 1)
            // -------------------------------------------------------------
            [
                'proyecto' => 'Cambio de equipos',
                'fecha'    => '2025-06-14',
                'activos'  => [
                    ['id_activo' => 'DM', 'activo' => 'Dispositivos moviles', 'clasificacion' => 'Clasificado', 'revision_inicial' => '2025-05-19', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2025-06-09', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2025-06-14', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'SV', 'activo' => 'Servidores', 'clasificacion' => 'NA', 'revision_inicial' => null, 'resultado_inicial' => null, 'revision_intermedia' => null, 'resultado_intermedio' => null, 'revision_final' => null, 'resultado_final' => null],
                    ['id_activo' => 'BD', 'activo' => 'Bases de datos', 'clasificacion' => 'NA', 'revision_inicial' => null, 'resultado_inicial' => null, 'revision_intermedia' => null, 'resultado_intermedio' => null, 'revision_final' => null, 'resultado_final' => null],
                    ['id_activo' => 'SW', 'activo' => 'Herramientas de software', 'clasificacion' => 'Privado', 'revision_inicial' => '2025-04-19', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2025-06-09', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2025-08-14', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'IN', 'activo' => 'Información', 'clasificacion' => 'Confidencial', 'revision_inicial' => '2025-04-19', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2025-06-09', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2025-08-14', 'resultado_final' => 'clasificacion adecuada'],
                ],
                'riesgos'  => [
                    ['numero' => 1, 'riesgo_problema' => 'Pérdida de información confidencial durante la migración', 'c' => true, 'i' => true, 'd' => true, 'probabilidad' => 3, 'severidad' => 5, 'puntaje' => 15, 'nivel_riesgo' => 'H', 'tratamiento_causa' => 'Trabajo de la información directamente en la nube para facilitar el traslado'],
                    ['numero' => 2, 'riesgo_problema' => 'Retrasos en entrega de laptops (afecta continuidad de operaciones)', 'c' => true, 'i' => true, 'd' => false, 'probabilidad' => 3, 'severidad' => 3, 'puntaje' => 9, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Coordinación con proveedor y entrega por fases'],
                    ['numero' => 3, 'riesgo_problema' => 'Fallos en configuración de software (antivirus, VPN, acceso)', 'c' => true, 'i' => true, 'd' => false, 'probabilidad' => 2, 'severidad' => 3, 'puntaje' => 6, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Listado de aplicaciones estandar por area directamente desde Manage Engine'],
                    ['numero' => 4, 'riesgo_problema' => 'Entrega de laptops con hardware no conforme a lo solicitado', 'c' => true, 'i' => true, 'd' => true, 'probabilidad' => 2, 'severidad' => 3, 'puntaje' => 6, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Validación de equipos antes de entrega'],
                    ['numero' => 5, 'riesgo_problema' => 'Robo o extravío de equipos con datos confidenciales', 'c' => true, 'i' => true, 'd' => true, 'probabilidad' => 2, 'severidad' => 5, 'puntaje' => 10, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Políticas de seguridad, cifrado, rastreo y seguro'],
                    ['numero' => 7, 'riesgo_problema' => 'Fallas en acceso (usuarios bloqueados, sin credenciales)', 'c' => true, 'i' => true, 'd' => false, 'probabilidad' => 3, 'severidad' => 4, 'puntaje' => 12, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Checklist de acceso por TI, pruebas por usuario clave'],
                    ['numero' => 8, 'riesgo_problema' => 'No devolución del equipo anterior o con daños', 'c' => true, 'i' => true, 'd' => false, 'probabilidad' => 3, 'severidad' => 2, 'puntaje' => 6, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Políticas claras de devolución, inspección técnica'],
                    ['numero' => 9, 'riesgo_problema' => 'Exposición de datos clasificados por mal uso o configuración', 'c' => true, 'i' => true, 'd' => true, 'probabilidad' => 2, 'severidad' => 5, 'puntaje' => 10, 'nivel_riesgo' => 'M', 'tratamiento_causa' => 'Cifrado de disco, bloqueo por inactividad, monitoreo'],
                ],
            ],

            // -------------------------------------------------------------
            // 7. DocFlow (Rev. 1)
            // -------------------------------------------------------------
            [
                'proyecto' => 'DocFlow',
                'fecha'    => '2026-06-18',
                'activos'  => [
                    ['id_activo' => 'DM', 'activo' => 'Dispositivos moviles', 'clasificacion' => 'Privada', 'revision_inicial' => '2026-06-18', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2026-07-18', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2026-08-18', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'SV', 'activo' => 'Servidores', 'clasificacion' => 'Privada', 'revision_inicial' => '2026-06-18', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2026-07-18', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2026-08-18', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'BD', 'activo' => 'Bases de datos', 'clasificacion' => 'Privada', 'revision_inicial' => '2026-06-18', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2026-07-18', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2026-08-18', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'SW', 'activo' => 'Herramientas de software', 'clasificacion' => 'Privada', 'revision_inicial' => '2026-06-18', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2026-07-18', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2026-08-18', 'resultado_final' => 'clasificacion adecuada'],
                    ['id_activo' => 'IN', 'activo' => 'Información', 'clasificacion' => 'Confidencial', 'revision_inicial' => '2026-06-18', 'resultado_inicial' => 'clasificacion adecuada', 'revision_intermedia' => '2026-07-18', 'resultado_intermedio' => 'clasificacion adecuada', 'revision_final' => '2026-08-18', 'resultado_final' => 'clasificacion adecuada'],
                ],
                'riesgos'  => [
                    ['numero' => 1, 'riesgo_problema' => 'Obsolescencia Documental en Auditoría VDA', 'c' => false, 'i' => true, 'd' => true, 'probabilidad' => 3, 'severidad' => 5, 'puntaje' => 15, 'nivel_riesgo' => 'Alto', 'tratamiento_causa' => "Algoritmo del Puente Dinámico: Query en tiempo real en la tabla document_versions filtrando por MAX(id) y status = 'aprobado'."],
                    ['numero' => 2, 'riesgo_problema' => 'Acceso No Autorizado a Planos de Ingeniería', 'c' => true, 'i' => false, 'd' => false, 'probabilidad' => 2, 'severidad' => 5, 'puntaje' => 10, 'nivel_riesgo' => 'Medio', 'tratamiento_causa' => 'Aislamiento de Storage y RBAC: Uso de políticas Eloquent y almacenamiento en storage/app/local/ protegido por IIS.'],
                    ['numero' => 3, 'riesgo_problema' => 'Aprobación de Documentación sin Validación', 'c' => false, 'i' => true, 'd' => false, 'probabilidad' => 3, 'severidad' => 4, 'puntaje' => 12, 'nivel_riesgo' => 'Medio', 'tratamiento_causa' => 'Workflow Manager: Validación estricta de la máquina de estados en el framework (draft, terminado, revisado, aprobado).'],
                    ['numero' => 4, 'riesgo_problema' => 'Pérdida de Trazabilidad en Cambios de Estado', 'c' => false, 'i' => true, 'd' => false, 'probabilidad' => 2, 'severidad' => 4, 'puntaje' => 8, 'nivel_riesgo' => 'Medio', 'tratamiento_causa' => 'Historial de Retroalimentación: Restricción de campo comments no nulo en transiciones inversas y tabla Append-Only de auditoría.'],
                    ['numero' => 5, 'riesgo_problema' => 'Saturación de Almacenamiento en Servidor', 'c' => false, 'i' => false, 'd' => true, 'probabilidad' => 4, 'severidad' => 2, 'puntaje' => 8, 'nivel_riesgo' => 'Medio', 'tratamiento_causa' => 'Tercera Forma Normal (3FN): La tabla vda_evidences usa llaves foráneas hacia DocFlow en lugar de duplicar los archivos binarios.'],
                    ['numero' => 6, 'riesgo_problema' => 'Inyección de Código Malicioso vía Upload', 'c' => true, 'i' => true, 'd' => true, 'probabilidad' => 1, 'severidad' => 5, 'puntaje' => 5, 'nivel_riesgo' => 'Bajo', 'tratamiento_causa' => 'Validación de Magic Bytes: El backend descarta el nombre de usuario original y valida la cabecera binaria real del PDF/Imagen.'],
                    ['numero' => 7, 'riesgo_problema' => 'Lentitud de Respuesta en Consultas Concurrentes', 'c' => false, 'i' => false, 'd' => true, 'probabilidad' => 3, 'severidad' => 3, 'puntaje' => 9, 'nivel_riesgo' => 'Medio', 'tratamiento_causa' => 'Scripts de Indexación: Creación de índice especializado IX_document_versions_bridge_lookup en la instancia del motor.'],
                    ['numero' => 8, 'riesgo_problema' => 'Pérdida de Continuidad por Falla de Hardware', 'c' => false, 'i' => false, 'd' => true, 'probabilidad' => 2, 'severidad' => 5, 'puntaje' => 10, 'nivel_riesgo' => 'Medio', 'tratamiento_causa' => 'Backups y Checklist DRP: Resguardos automatizados diarios de base de datos (.bak) y storage hacia una unidad NAS aislada.'],
                    ['numero' => 9, 'riesgo_problema' => 'Uso de Documentos en Estado Borrador/Draft', 'c' => false, 'i' => true, 'd' => false, 'probabilidad' => 2, 'severidad' => 4, 'puntaje' => 8, 'nivel_riesgo' => 'Medio', 'tratamiento_causa' => 'Filtro de Estado en el Puente: El código del backend discrimina e ignora de forma absoluta registros que no estén aprobado / firmado.'],
                    ['numero' => 10, 'riesgo_problema' => 'Alteración del Historial de Firmas Electrónicas', 'c' => false, 'i' => true, 'd' => false, 'probabilidad' => 1, 'severidad' => 5, 'puntaje' => 5, 'nivel_riesgo' => 'Bajo', 'tratamiento_causa' => 'Modelo DocumentSignature: Generación de un hash SHA-256 único e inmutable por cada proceso de firma aprobado.'],
                ],
            ],
        ];

        // Orden cronológico para los correlativos
        usort($proyectosData, function ($a, $b) {
            return strcmp($a['fecha'], $b['fecha']);
        });

        DB::transaction(function () use ($proyectosData, $creador) {
            $consecutivoPorAnio = [];

            foreach ($proyectosData as $pData) {
                $year = Carbon::parse($pData['fecha'])->format('Y');

                if (!isset($consecutivoPorAnio[$year])) {
                    $consecutivoPorAnio[$year] = 1;
                } else {
                    $consecutivoPorAnio[$year]++;
                }

                $folio = $this->generarFolio($pData['fecha'], $consecutivoPorAnio[$year]);

                // 1. Guardar o actualizar Proyecto
                $proyecto = FormatoIt09Proyecto::updateOrCreate(
                    ['proyecto' => $pData['proyecto']],
                    [
                        'folio'           => $folio,
                        'fecha'           => $pData['fecha'],
                        'user_id_creador' => $creador->id,
                    ]
                );

                // 2. Guardar Activos
                foreach ($pData['activos'] as $activo) {
                    FormatoIt09Activo::updateOrCreate(
                        [
                            'fmt_it_09_proyecto_id' => $proyecto->id,
                            'id_activo'             => $activo['id_activo'],
                        ],
                        [
                            'activo'               => $activo['activo'],
                            'clasificacion'        => $activo['clasificacion'],
                            'revision_inicial'     => $activo['revision_inicial'],
                            'resultado_inicial'    => $activo['resultado_inicial'],
                            'revision_intermedia'  => $activo['revision_intermedia'],
                            'resultado_intermedio' => $activo['resultado_intermedio'],
                            'revision_final'       => $activo['revision_final'],
                            'resultado_final'      => $activo['resultado_final'],
                        ]
                    );
                }

                // 3. Guardar Riesgos
                foreach ($pData['riesgos'] as $riesgo) {
                    FormatoIt09Riesgo::updateOrCreate(
                        [
                            'fmt_it_09_proyecto_id' => $proyecto->id,
                            'numero'                => $riesgo['numero'],
                        ],
                        [
                            'riesgo_problema'   => $riesgo['riesgo_problema'],
                            'c'                 => $riesgo['c'],
                            'i'                 => $riesgo['i'],
                            'd'                 => $riesgo['d'],
                            'probabilidad'      => $riesgo['probabilidad'],
                            'severidad'         => $riesgo['severidad'],
                            'puntaje'           => $riesgo['puntaje'],
                            'nivel_riesgo'      => $riesgo['nivel_riesgo'],
                            'tratamiento_causa' => $riesgo['tratamiento_causa'],
                        ]
                    );
                }

                $this->command->line(" ✓ Proyecto [{$folio}] {$pData['proyecto']} sembrado (" . count($pData['activos']) . " activos, " . count($pData['riesgos']) . " riesgos).");
            }
        });

        $this->command->info('¡Seeder de FMT-IT-09 ejecutado exitosamente!');
    }
}