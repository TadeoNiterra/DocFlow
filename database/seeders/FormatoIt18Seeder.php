<?php

namespace Database\Seeders;

use App\Models\FormatoIt18Factor;
use App\Models\FormatoIt18Fase;
use App\Models\FormatoIt18Plan;
use App\Models\User;
use Illuminate\Database\Seeder;

class FormatoIt18Seeder extends Seeder
{
    public function run(): void
    {
        $creador = User::where('email', 'jesus.marron@niterragroup.com')->first()
            ?? User::first()
            ?? User::create([
                'name'     => 'Administrador TI',
                'email'    => 'admin.it@niterragroup.com',
                'password' => bcrypt('password123'),
            ]);

        $planes = [
            // =================================================================
            // 1. PER-01: Falla de sistemas o componentes críticos
            // =================================================================
            [
                'folio'                 => 'PER-01',
                'fecha_elaboracion'     => '2024-11-29',
                'escenario_critico'     => 'Falla de sistemas o componentes críticos',
                'tipo_escenario'        => 'Tecnológico',
                'descripcion_escenario' => 'Interrupción por falla de sistemas o componentes críticos en áreas operativas y administrativas',
                'antecedentes'          => 'Falla de servidor externo en 2024',
                // Valores numéricos limpios sin " h"
                'rpo_global'            => 1.00,
                'rto_global'            => 4.25,
                'mtd'                   => 5.25,
                'impacta_cliente'       => false,
                'oem_tipo_afectacion'   => 'Tiempo de entrega',
                'oem_consideraciones'   => 'Contención a través de segmentos de redes',
                'aftermarket1_tipo_afectacion' => 'Volumen de entrega',
                'aftermarket1_consideraciones' => null,
                'aftermarket2_tipo_afectacion' => 'Continuidad de operación',
                'aftermarket2_consideraciones' => null,
                'otros_tipo_afectacion'        => 'Otro (especificar):',
                'otros_consideraciones'        => null,
                'comite_crisis'          => 'Gerente de sistemas',
                'otros_niterra'          => "Supervisor de sistemas\nStaff de Sistemas",
                'otras_partes_interesadas' => 'GHQ, RHQ, Proveedores externos',
                'limitaciones'           => "Diferencias horarias para la respuesta oportuna de entidades externas\nMaterialización del evento en fines de semana o feriados\nRestricciones de acceso a configuraciones y permisos\nDemora en tiempo de respuesta de treceros",
                'coordinaciones_responsabilidades' => "Gerente de sistemas, supervisor de sistemas y staff de sistemas son responsables de las fases 1, 2 , 3 y 5\nGerente de sistemas y supervisor de sistemas son responsables de las fases 4, 6 y 7",
                'factores' => [
                    ['tipo' => 'Interno', 'descripcion' => 'Seguridad de la información. (SAP) para la protección y continuidad de la información', 'clasificacion' => 'Fortaleza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Optimización y mejora del tipo de respaldo en sitio o en nube para minimizar pérdida de información', 'clasificacion' => 'Oportunidad', 'influencia' => 'Alto'],
                    ['tipo' => 'Interno', 'descripcion' => 'Limitación de la administración de herramientas y sistemas por parte de proveedores y terceros', 'clasificacion' => 'Debilidad', 'influencia' => 'Alto'],
                    ['tipo' => 'Interno', 'descripcion' => 'Falta de entrenamiento en temas relacionados con continuidad para el área de IT', 'clasificacion' => 'Debilidad', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Se depende de proveedores externos para la administración de herramientas y sistemas', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Control de sistemas y recursos de IT externo por parte de Niterra USA', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Desconocimiento de los usuarios con respecto al uso de servicios, herramientas y recursos de IT', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Fallas en los servicios y atención deficiente proporcionados por terceros', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Cambios en la regulación y requisitos del cliente con respecto al manejo de la información', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Homologación de sistemas y procesos por parte del corporativo Niterra USA', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Diferencias culturales y de idioma con el corporativo', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                ],
                'fases' => [
                    [
                        'fase_nombre'  => 'Fase 0: Preparación',
                        'tipo_metrico' => 'Preparación',
                        'tiempo_horas' => 0.00,
                        'acciones'     => "Respaldos y copias de seguridad (conforme la POL-IT-18 y PO-IT-06)\nAcuerdos y SLA pactados con proveedor (conforme POL-IT-10)\nProcedimientos y política de gestión de incidentes (POL-IT-08 y PO-IT-02)\nSegmentación de recursos de red (POL-IT-07)",
                    ],
                    [
                        'fase_nombre'  => 'Fase 1: Reporte / Notificación',
                        'tipo_metrico' => 'RPO',
                        'tiempo_horas' => 0.50,
                        'acciones'     => '1. Recibir reporte del usuario.',
                    ],
                    [
                        'fase_nombre'  => 'Fase 2: Evaluación de la situación',
                        'tipo_metrico' => 'RPO',
                        'tiempo_horas' => 0.25,
                        'acciones'     => '2. Ingresar al servidor la disponibilidad de servicios.',
                    ],
                    [
                        'fase_nombre'  => 'Fase 3: Contención',
                        'tipo_metrico' => 'RPO',
                        'tiempo_horas' => 0.25,
                        'acciones'     => '3. Informar a los usuarios las restricciones de acceso a aplicaciones.',
                    ],
                    [
                        'fase_nombre'  => 'Fase 4: Coordinación interna y externa',
                        'tipo_metrico' => 'RTO',
                        'tiempo_horas' => 0.25,
                        'acciones'     => '4. Informa a la Alta Dirección y usuarios las restricciones de uso de sistemas y aplicaciones.',
                    ],
                    [
                        'fase_nombre'  => 'Fase 5: Mitigación',
                        'tipo_metrico' => 'RTO',
                        'tiempo_horas' => 1.00,
                        'acciones'     => "5. Consulta el último respaldo disponible.\n6. Realiza restauración de base de datos con el último respaldo disponible.\n7. Realiza pruebas de conectividad.",
                    ],
                    [
                        'fase_nombre'  => 'Fase 6: Evaluación de daños / contención',
                        'tipo_metrico' => 'RTO',
                        'tiempo_horas' => 2.00,
                        'acciones'     => "8. Evalúa los registros y determina la última fecha de respaldo.\n9. Notifica al usuario la última fecha de respaldo.",
                    ],
                    [
                        'fase_nombre'  => 'Fase 7: Retorno seguro',
                        'tipo_metrico' => 'RTO',
                        'tiempo_horas' => 1.00,
                        'acciones'     => '10. Da indicaciones al usuario para la restauración de información y reanudación de operaciones.',
                    ],
                ],
            ],

            // =================================================================
            // 2. PER-02: Caída general de servicios
            // =================================================================
            [
                'folio'                 => 'PER-02',
                'fecha_elaboracion'     => '2024-11-29',
                'escenario_critico'     => 'Caída general de servicios',
                'tipo_escenario'        => 'Tecnológico',
                'descripcion_escenario' => 'Interrupción por caída general de servicios de IT y telecomunicaciones',
                'antecedentes'          => 'Caída de servidores virtuales en 2024',
                // Valores numéricos limpios sin " h"
                'rpo_global'            => 4.50,
                'rto_global'            => 28.50,
                'mtd'                   => 33.00,
                'impacta_cliente'       => false,
                'oem_tipo_afectacion'   => 'Tiempo de entrega',
                'oem_consideraciones'   => 'Contención a través de segmentos de redes',
                'aftermarket1_tipo_afectacion' => 'Volumen de entrega',
                'aftermarket1_consideraciones' => null,
                'aftermarket2_tipo_afectacion' => 'Continuidad de operación',
                'aftermarket2_consideraciones' => null,
                'otros_tipo_afectacion'        => 'Otro (especificar):',
                'otros_consideraciones'        => null,
                'comite_crisis'          => 'Gerente de sistemas',
                'otros_niterra'          => "Supervisor de sistemas\nStaff de Sistemas",
                'otras_partes_interesadas' => 'GHQ, RHQ, Proveedores externos',
                'limitaciones'           => "Diferencias horarias para la respuesta oportuna de entidades externas\nMaterialización del evento en fines de semana o feriados\nRestricciones de acceso a configuraciones y permisos",
                'coordinaciones_responsabilidades' => "Gerente de sistemas, supervisor de sistemas y staff de sistemas son responsables de las fases 1, 3, 5, 6 y 7\nGerente de sistemas es responsable de las fases 2 y 4",
                'factores' => [
                    ['tipo' => 'Interno', 'descripcion' => 'Seguridad de la información. (SAP) para la protección y continuidad de la información', 'clasificacion' => 'Fortaleza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Optimización y mejora del tipo de respaldo en sitio o en nube para minimizar pérdida de información', 'clasificacion' => 'Oportunidad', 'influencia' => 'Alto'],
                    ['tipo' => 'Interno', 'descripcion' => 'Limitación de la administración de herramientas y sistemas por parte de proveedores y terceros', 'clasificacion' => 'Debilidad', 'influencia' => 'Alto'],
                    ['tipo' => 'Interno', 'descripcion' => 'Falta de entrenamiento en temas relacionados con continuidad para el área de IT', 'clasificacion' => 'Debilidad', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Se depende de proveedores externos para la administración de herramientas y sistemas', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Control de sistemas y recursos de IT externo por parte de Niterra USA', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Desconocimiento de los usuarios con respecto al uso de servicios, herramientas y recursos de IT', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Fallas en los servicios y atención deficiente proporcionados por terceros', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Cambios en la regulación y requisitos del cliente con respecto al manejo de la información', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Homologación de sistemas y procesos por parte del corporativo Niterra USA', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Diferencias culturales y de idioma con el corporativo', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                ],
                'fases' => [
                    [
                        'fase_nombre'  => 'Fase 0: Preparación',
                        'tipo_metrico' => 'Preparación',
                        'tiempo_horas' => 0.00,
                        'acciones'     => "Redundancia de redes\nConexión VPN de algunos sistemas\nProcedimientos y política de gestión de incidentes (POL-IT-08 y PO-IT-02)\nAcuerdos y SLA pactados con proveedor (conforme POL-IT-10)",
                    ],
                    [
                        'fase_nombre'  => 'Fase 1: Reporte / Notificación',
                        'tipo_metrico' => 'RPO',
                        'tiempo_horas' => 0.50,
                        'acciones'     => '1. Recibe reporte del usuario.',
                    ],
                    [
                        'fase_nombre'  => 'Fase 2: Evaluación de la situación',
                        'tipo_metrico' => 'RPO',
                        'tiempo_horas' => 1.00,
                        'acciones'     => '2. Contacto con filiales para descartar problemas de aplicaciones.',
                    ],
                    [
                        'fase_nombre'  => 'Fase 3: Contención',
                        'tipo_metrico' => 'RPO',
                        'tiempo_horas' => 3.00,
                        'acciones'     => "3. Reporte de incidencia con el proveedor de redes y telecomunicaciones principales.\n4. Gestionar la conexión (VPN o servidores) a través de la filial correspondiente y configuración de red alterna.\n5. Realiza pruebas de conexión con los usuarios.",
                    ],
                    [
                        'fase_nombre'  => 'Fase 4: Coordinación interna y externa',
                        'tipo_metrico' => 'RTO',
                        'tiempo_horas' => 0.50,
                        'acciones'     => "6. Informar a la Alta Dirección el problema para atender a las indicaciones de Sistemas e informar, si fuera necesario, a clientes y proveedores.\n7. Informar a filiales para apoyo externo de accesos y telecomunicaciones.",
                    ],
                    [
                        'fase_nombre'  => 'Fase 5: Mitigación',
                        'tipo_metrico' => 'RTO',
                        'tiempo_horas' => 24.00,
                        'acciones'     => "8. Coordina acceso e intervención del proveedor.\n9. Solicita y revisa plan de trabajo del proveedor para restablecimiento del servicio.\n10. Monitorea ejecución del plan de trabajo del proveedor.\n11. Realiza pruebas de conectividad, validación de accesos y revisa pruebas del plan de trabajo del proveedor.",
                    ],
                    [
                        'fase_nombre'  => 'Fase 6: Evaluación de daños / contención',
                        'tipo_metrico' => 'RTO',
                        'tiempo_horas' => 2.00,
                        'acciones'     => "12. Solicita y revisa reporte de solución del proveedor.\n13. Evalúa el nivel de impacto y responsabilidad del proveedor.",
                    ],
                    [
                        'fase_nombre'  => 'Fase 7: Retorno seguro',
                        'tipo_metrico' => 'RTO',
                        'tiempo_horas' => 2.00,
                        'acciones'     => "14. Desconectar el enlace provisional y realizar pruebas con el enlace productivo.\n15. Realiza pruebas de funcionamiento de aplicaciones.\n16. Inhabilita servicios provisionales.\n17. Monitorea el restablecimiento del servicio.",
                    ],
                ],
            ],

            // =================================================================
            // 3. PER-03: Ciber ataque
            // =================================================================
            [
                'folio'                 => 'PER-03',
                'fecha_elaboracion'     => '2024-11-29',
                'escenario_critico'     => 'Ciber ataque',
                'tipo_escenario'        => 'Tecnológico',
                'descripcion_escenario' => 'Interrupción de operaciones por ataque cibernético (ransomware, malware, phishing)',
                'antecedentes'          => 'Sin antecedentes',
                // Valores numéricos limpios sin " h"
                'rpo_global'            => 5.00,
                'rto_global'            => 4.50,
                'mtd'                   => 9.50,
                'impacta_cliente'       => false,
                'oem_tipo_afectacion'   => 'Tiempo de entrega',
                'oem_consideraciones'   => 'Contención a través de segmentos de redes',
                'aftermarket1_tipo_afectacion' => 'Volumen de entrega',
                'aftermarket1_consideraciones' => null,
                'aftermarket2_tipo_afectacion' => 'Continuidad de operación',
                'aftermarket2_consideraciones' => null,
                'otros_tipo_afectacion'        => 'Otro (especificar):',
                'otros_consideraciones'        => null,
                'comite_crisis'          => 'Gerente de sistemas',
                'otros_niterra'          => "Supervisor de sistemas\nStaff de Sistemas",
                'otras_partes_interesadas' => 'GHQ, RHQ, Proveedores externos',
                'limitaciones'           => "Diferencias horarias para la respuesta oportuna de entidades externas\nMaterialización del evento en fines de semana o feriados\nRestricciones de acceso a configuraciones y permisos",
                'coordinaciones_responsabilidades' => "Gerente de sistemas y supervisor de sistemas son responsables de las fases 1 y 3\nGerente de sistemas es responsable de la fase 2\nGerente de sistemas, supervisor de sistemas y staff de sistemas son responsables de las fases 4, 5, 6 y 7",
                'factores' => [
                    ['tipo' => 'Interno', 'descripcion' => 'Herramientas y servicios de seguridad activos para la mitigación de riesgos cibernéticos', 'clasificacion' => 'Fortaleza', 'influencia' => 'Alto'],
                    ['tipo' => 'Interno', 'descripcion' => 'Disponibilidad de VPN para el trabajo remoto seguro y protección de la información fuera de las instalaciones', 'clasificacion' => 'Fortaleza', 'influencia' => 'Alto'],
                    ['tipo' => 'Interno', 'descripcion' => 'Personal capacitado en ciberseguridad y soporte para un mejor servicio y prevención de riesgos', 'clasificacion' => 'Fortaleza', 'influencia' => 'Alto'],
                    ['tipo' => 'Interno', 'descripcion' => 'Concientización de personal con respecto a las potenciales amenazas y ataques ciberneticos', 'clasificacion' => 'Fortaleza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Falta de toma de conciencia del personal en general con respecto al uso de herramientas de TI y ciberseguridad', 'clasificacion' => 'Oportunidad', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Implementación de MDM mejorado para mitigación de riesgos de seguridad', 'clasificacion' => 'Oportunidad', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Se depende de proveedores externos para la administración de herramientas y sistemas', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Desconocimiento de los usuarios con respecto al uso de servicios, herramientas y recursos de IT', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                    ['tipo' => 'Externo', 'descripcion' => 'Evolución constante de los vectores de ataques', 'clasificacion' => 'Amenaza', 'influencia' => 'Alto'],
                ],
                'fases' => [
                    [
                        'fase_nombre'  => 'Fase 0: Preparación',
                        'tipo_metrico' => 'Preparación',
                        'tiempo_horas' => 0.00,
                        'acciones'     => "Directrices de seguridad de la información de la POL-IT-01\nSegmentación de permisos conforme la POL-IT-05\nSegmentación de recursos de red conforme la POL-IT-07\nGestión de medios de autenticación por medio de la POL-IT-09\nProcedimientos y política de gestión de incidentes (POL-IT-08 y PO-IT-02)\nProtección de activos en trabajo remoto conforme la POL-IT-14\nRespaldos y copias de seguridad (conforme la POL-IT-18 y PO-IT-06)\nPOL-IT-19 Política de antimalware\nPO-IT-04 para la gestión de la seguridad de la información\nConcientización y entrenamientos de seguridad de la información\nMonitoreo de seguridad a través de PAM\nManejo de vulnerabilidad y parches a través de Manage Engine",
                    ],
                    [
                        'fase_nombre'  => 'Fase 1: Reporte / Notificación',
                        'tipo_metrico' => 'RPO',
                        'tiempo_horas' => 2.00,
                        'acciones'     => '1. Recibir reporte de usuario, reporte por parte de tercero o detección automática de servicio administrado.',
                    ],
                    [
                        'fase_nombre'  => 'Fase 2: Evaluación de la situación',
                        'tipo_metrico' => 'RPO',
                        'tiempo_horas' => 1.00,
                        'acciones'     => '2. Realiza contacto con GHQ y RHQ para confirmar estatus de ciber ataque.',
                    ],
                    [
                        'fase_nombre'  => 'Fase 3: Contención',
                        'tipo_metrico' => 'RPO',
                        'tiempo_horas' => 2.00,
                        'acciones'     => "3. Lanza comunicado hacia los usuarios para evitar la propagación del ciber ataque\n4. Aisla equipos contaminados o cuentas afectadas.",
                    ],
                    [
                        'fase_nombre'  => 'Fase 4: Coordinación interna y externa',
                        'tipo_metrico' => 'RTO',
                        'tiempo_horas' => 1.00,
                        'acciones'     => "5. Consulta de stock de equipos para reposición\n6. Consulta de configuración de equipos\n7. Verificación de accesos para restauración de datos.",
                    ],
                    [
                        'fase_nombre'  => 'Fase 5: Mitigación',
                        'tipo_metrico' => 'RTO',
                        'tiempo_horas' => 2.00,
                        'acciones'     => "8. Habilitado y configuración de equipos para reposición\n9. Instalación de respaldos y copias de seguridad\n10. Ejecución de pruebas de producción para verificar la continuidad de las operaciones.",
                    ],
                    [
                        'fase_nombre'  => 'Fase 6: Evaluación de daños / contención',
                        'tipo_metrico' => 'RTO',
                        'tiempo_horas' => 1.00,
                        'acciones'     => '11. Análisis de impactos generados por el ciberataque.',
                    ],
                    [
                        'fase_nombre'  => 'Fase 7: Retorno seguro',
                        'tipo_metrico' => 'RTO',
                        'tiempo_horas' => 0.50,
                        'acciones'     => '12. Lanza comunicado de reanudación de operación normal.',
                    ],
                ],
            ],
        ];

        foreach ($planes as $planData) {
            try {
                // 1. Guardar o actualizar Plan Principal
                $plan = FormatoIt18Plan::updateOrCreate(
                    ['folio' => $planData['folio']],
                    [
                        'fecha_elaboracion'     => $planData['fecha_elaboracion'],
                        'escenario_critico'     => $planData['escenario_critico'],
                        'tipo_escenario'        => $planData['tipo_escenario'],
                        'descripcion_escenario' => $planData['descripcion_escenario'],
                        'antecedentes'          => $planData['antecedentes'],
                        'rpo_global'            => $planData['rpo_global'],
                        'rto_global'            => $planData['rto_global'],
                        'mtd'                   => $planData['mtd'],
                        'impacta_cliente'       => $planData['impacta_cliente'],
                        'oem_tipo_afectacion'   => $planData['oem_tipo_afectacion'],
                        'oem_consideraciones'   => $planData['oem_consideraciones'],
                        'aftermarket1_tipo_afectacion' => $planData['aftermarket1_tipo_afectacion'],
                        'aftermarket1_consideraciones' => $planData['aftermarket1_consideraciones'],
                        'aftermarket2_tipo_afectacion' => $planData['aftermarket2_tipo_afectacion'],
                        'aftermarket2_consideraciones' => $planData['aftermarket2_consideraciones'],
                        'otros_tipo_afectacion'        => $planData['otros_tipo_afectacion'],
                        'otros_consideraciones'        => $planData['otros_consideraciones'],
                        'comite_crisis'          => $planData['comite_crisis'],
                        'otros_niterra'          => $planData['otros_niterra'],
                        'otras_partes_interesadas' => $planData['otras_partes_interesadas'],
                        'limitaciones'           => $planData['limitaciones'],
                        'coordinaciones_responsabilidades' => $planData['coordinaciones_responsabilidades'],
                        'user_id_creador'        => $creador->id,
                    ]
                );

                // 2. Factores FODA
                $plan->factores()->delete();
                foreach ($planData['factores'] as $factor) {
                    FormatoIt18Factor::create([
                        'fmt_it_18_plan_id' => $plan->id,
                        'tipo'              => $factor['tipo'],
                        'descripcion'       => $factor['descripcion'],
                        'clasificacion'     => $factor['clasificacion'],
                        'influencia'        => $factor['influencia'],
                    ]);
                }

                // 3. Fases de Recuperación
                $plan->fases()->delete();
                foreach ($planData['fases'] as $fase) {
                    FormatoIt18Fase::create([
                        'fmt_it_18_plan_id' => $plan->id,
                        'fase_nombre'       => $fase['fase_nombre'],
                        'tipo_metrico'      => $fase['tipo_metrico'],
                        'tiempo_horas'      => $fase['tiempo_horas'],
                        'acciones'          => $fase['acciones'],
                    ]);
                }

                $this->command->line(" ✓ Plan [{$planData['folio']}] sembrado con éxito.");

            } catch (\Throwable $e) {
                $this->command->error("Error en [{$planData['folio']}]: " . $e->getMessage());
                throw $e;
            }
        }

        $this->command->info('¡Los 3 planes F-IT-18 con factores y fases han sido sembrados con éxito!');
    }
}