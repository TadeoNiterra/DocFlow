<?php

namespace Database\Seeders;

use App\Models\FormatoIt22Evaluation;
use App\Models\FormatoIt22EvaluationCorrectiveAction;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FormatoIt22Seeder extends Seeder
{
    public function run(): void
    {
        $usuario = User::where('email', 'jesus.marron@niterragroup.com')->first()
            ?? User::first()
            ?? User::create([
                'name'     => 'Administrador TI',
                'email'    => 'admin.it@niterragroup.com',
                'password' => bcrypt('password123'),
            ]);

        $evaluaciones = [
            // -------------------------------------------------------------
            // 1. ABBA NETWORKS
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'ABBA NETWORKS',
                'supplier_representative' => 'Ericka Villafania Martinez',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-06',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'José Martin Tadeo Catalán',
                'telephone'               => '5621948755',
                'sow'                     => 'Se tiene',
                'sla'                     => 'Se tiene',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 20,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Proveedor cuenta con infraestructura y certificaciones vigentes.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 3,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 3,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 6,  'sec3_percent' => 100.0,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 6,  'sec5_percent' => 100.0,
                'actual_score'            => 30,
                'percentage'              => 100.0,
                'classification'          => 'calificado',
                'requires_remediation'    => false,
                'remediation_deadline'    => null,
                'ca_items'                => [],
            ],

            // -------------------------------------------------------------
            // 2. BESTEL
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'BESTEL, S.A. DE C.V.',
                'supplier_representative' => 'Mesa de ayuda',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-06',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'José Martin Tadeo Catalán',
                'telephone'               => '5621948755',
                'sow'                     => 'No se tiene',
                'sla'                     => 'Se tiene',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 30,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Pendiente recolección y firma de SOW.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 3,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 3,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 6,  'sec3_percent' => 100.0,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 6,  'sec5_percent' => 100.0,
                'actual_score'            => 30,
                'percentage'              => 100.0,
                'classification'          => 'sujeto_a_mejora',
                'requires_remediation'    => true,
                'remediation_deadline'    => '2025-10-31',
                'ca_items'                => [
                    [
                        'item'        => '1',
                        'concern'     => 'Recolectar sow',
                        'action'      => 'Solicitar Sow',
                        'responsible' => 'Jesus Alejandro Marrón Legorreta',
                        'start_date'  => '2025-10-01',
                        'close_date'  => null,
                    ],
                ],
            ],

            // -------------------------------------------------------------
            // 3. BITAM
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'BITAM MÉXICO',
                'supplier_representative' => 'Mesa de ayuda',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-06',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'José Martin Tadeo Catalán',
                'telephone'               => '5621948755',
                'sow'                     => 'No se tiene',
                'sla'                     => 'Se tiene',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 30,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Pendiente recolección y firma de SOW.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 3,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 3,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 6,  'sec3_percent' => 100.0,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 6,  'sec5_percent' => 100.0,
                'actual_score'            => 30,
                'percentage'              => 100.0,
                'classification'          => 'sujeto_a_mejora',
                'requires_remediation'    => true,
                'remediation_deadline'    => '2025-10-31',
                'ca_items'                => [
                    [
                        'item'        => '1',
                        'concern'     => 'Recolectar sow',
                        'action'      => 'Solicitar Sow',
                        'responsible' => 'Jesus Alejandro Marrón Legorreta',
                        'start_date'  => '2025-10-01',
                        'close_date'  => null,
                    ],
                ],
            ],

            // -------------------------------------------------------------
            // 4. ATEB COFIDI
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'ATEB COFIDI SA DE CV',
                'supplier_representative' => 'ISELA ROMERO',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-06',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'José Martin Tadeo Catalán',
                'telephone'               => '5621948755',
                'sow'                     => 'Se tiene',
                'sla'                     => 'Se tiene',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 30,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Proveedor PAC avalado con esquema de alta disponibilidad.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 3,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 3,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 6,  'sec3_percent' => 100.0,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 6,  'sec5_percent' => 100.0,
                'actual_score'            => 30,
                'percentage'              => 100.0,
                'classification'          => 'calificado',
                'requires_remediation'    => false,
                'remediation_deadline'    => null,
                'ca_items'                => [],
            ],

            // -------------------------------------------------------------
            // 5. DELL LEASING
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'Dell Leasing Mexico S de RL de CV',
                'supplier_representative' => 'MESA DE AYUDA / CHRISTIAN RAMIREZ',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-06',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'Jorge Luis Guzman Mora',
                'telephone'               => '5534268301',
                'sow'                     => 'No se tiene',
                'sla'                     => 'SI',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 30,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Infraestructura de hardware homologada bajo soporte ProSupport.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 3,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 3,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 6,  'sec3_percent' => 100.0,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 6,  'sec5_percent' => 100.0,
                'actual_score'            => 30,
                'percentage'              => 100.0,
                'classification'          => 'sujeto_a_mejora',
                'requires_remediation'    => true,
                'remediation_deadline'    => '2026-09-06',
                'ca_items'                => [
                    [
                        'item'        => '1',
                        'concern'     => 'Recolección de SOW ',
                        'action'      => 'Solicitar al proveedor la documentacion correspondinete.',
                        'responsible' => 'Jesus Alejandro marron Legorreta',
                        'start_date'  => '2025-10-01',
                        'close_date'  => null,
                    ],
                ],
            ],

            // -------------------------------------------------------------
            // 6. ICORP
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'ICORP, S.A de C.V',
                'supplier_representative' => 'Oliwia Chmarek',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-06',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'José Martin Tadeo Catalán',
                'telephone'               => '5621948755',
                'sow'                     => 'Se tiene',
                'sla'                     => 'Se tiene',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 30,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Mesa de ayuda y soporte técnico operativo bajo procesos alineados a ITIL.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 3,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 3,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 6,  'sec3_percent' => 100.0,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 6,  'sec5_percent' => 100.0,
                'actual_score'            => 30,
                'percentage'              => 100.0,
                'classification'          => 'calificado',
                'requires_remediation'    => false,
                'remediation_deadline'    => null,
                'ca_items'                => [],
            ],

            // -------------------------------------------------------------
            // 7. MAYSOFT GLOBAL
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'MAYSOFT GLOBAL, SA DE RL DE CV',
                'supplier_representative' => 'JENIFER SOLEIBI OLVERA BONOLA',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-19',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'José Martin Tadeo Catalán',
                'telephone'               => '5549501445',
                'sow'                     => 'No',
                'sla'                     => 'No',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 30,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Pedir el SOW y SLA al proveedor de software.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 3,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 3,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 6,  'sec3_percent' => 100.0,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 6,  'sec5_percent' => 100.0,
                'actual_score'            => 30,
                'percentage'              => 100.0,
                'classification'          => 'sujeto_a_mejora',
                'requires_remediation'    => true,
                'remediation_deadline'    => '2025-10-31',
                'ca_items'                => [
                    [
                        'item'        => '1',
                        'concern'     => 'Falta de SOW y SLA formal',
                        'action'      => 'Solicitar y firmar SOW y Acuerdo de Nivel de Servicio con el proveedor.',
                        'responsible' => 'Jesus Alejandro Marrón Legorreta',
                        'start_date'  => '2025-10-01',
                        'close_date'  => null,
                    ],
                ],
            ],

            // -------------------------------------------------------------
            // 8. SCITUM
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'SCITUM, S.A. DE C.V.',
                'supplier_representative' => 'Mesa de ayuda',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-06',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'José Martin Tadeo Catalán',
                'telephone'               => '5621948755',
                'sow'                     => 'No se tiene',
                'sla'                     => 'Se tiene',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 30,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Proveedor de seguridad gestionada y monitoreo perimetral.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 3,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 3,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 6,  'sec3_percent' => 100.0,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 6,  'sec5_percent' => 100.0,
                'actual_score'            => 30,
                'percentage'              => 100.0,
                'classification'          => 'sujeto_a_mejora',
                'requires_remediation'    => true,
                'remediation_deadline'    => '2025-10-31',
                'ca_items'                => [
                    [
                        'item'        => '1',
                        'concern'     => 'Recolectar sow',
                        'action'      => 'Solicitar Sow',
                        'responsible' => 'Jesus Alejandro Marrón Legorreta',
                        'start_date'  => '2025-10-01',
                        'close_date'  => null,
                    ],
                ],
            ],

            // -------------------------------------------------------------
            // 9. ATT GLOBAL
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'ATT GLOBAL',
                'supplier_representative' => 'Atención Corporativa AT&T',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-19',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'José Martin Tadeo Catalán',
                'telephone'               => '5621948755',
                'sow'                     => 'Se tiene',
                'sla'                     => 'Se tiene',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 30,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Proveedor de enlace de telecomunicaciones y telefonía global.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 3,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 3,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 6,  'sec3_percent' => 100.0,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 6,  'sec5_percent' => 100.0,
                'actual_score'            => 30,
                'percentage'              => 100.0,
                'classification'          => 'calificado',
                'requires_remediation'    => false,
                'remediation_deadline'    => null,
                'ca_items'                => [],
            ],

            // -------------------------------------------------------------
            // 10. CSI LEASING
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'CSI LEASING MEXICO S. DE R.L. DE C.V.',
                'supplier_representative' => 'CHRISTIAN RAMIREZ',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-06',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'Jorge Luis Guzman Mora',
                'telephone'               => '5534268301',
                'sow'                     => 'No se tiene',
                'sla'                     => 'No se tiene',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 30,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Arrendamiento de equipos informáticos y de oficina.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 3,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 3,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 6,  'sec3_percent' => 100.0,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 6,  'sec5_percent' => 100.0,
                'actual_score'            => 30,
                'percentage'              => 100.0,
                'classification'          => 'sujeto_a_mejora',
                'requires_remediation'    => true,
                'remediation_deadline'    => '2026-09-06',
                'ca_items'                => [
                    [
                        'item'        => '1',
                        'concern'     => 'Recolección de SOW Y SLA',
                        'action'      => 'Solicitar al proveedor la documentacion correspondinete.',
                        'responsible' => 'Jesus Alejandro marron Legorreta',
                        'start_date'  => '2025-10-01',
                        'close_date'  => null,
                    ],
                ],
            ],

            // -------------------------------------------------------------
            // 11. I.T. QUALITY SERVICES
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'I.T. QUALITY SERVICES S.A. DE C.V',
                'supplier_representative' => 'Mesa de ayuda',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-06',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'Jorge Luis Guzman Mora',
                'telephone'               => '5534268301',
                'sow'                     => 'No se tiene',
                'sla'                     => 'No se tiene',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 30,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Servicios de soporte y calidad de software.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 3,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 2,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 6,  'sec3_percent' => 100.0,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 5,  'sec5_percent' => 83.33,
                'actual_score'            => 29,
                'percentage'              => 96.67,
                'classification'          => 'sujeto_a_mejora',
                'requires_remediation'    => true,
                'remediation_deadline'    => '2026-09-06',
                'ca_items'                => [
                    [
                        'item'        => '1',
                        'concern'     => 'Recolección de SOW Y SLA',
                        'action'      => 'Solicitar al proveedor la documentacion correspondinete.',
                        'responsible' => 'Jesus Alejandro marron Legorreta',
                        'start_date'  => '2025-10-01',
                        'close_date'  => null,
                    ],
                ],
            ],

            // -------------------------------------------------------------
            // 12. INTERNET MOVIL
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'INTERNET MOVIL S. DE R.L. DE C.V.',
                'supplier_representative' => 'JENIFER OLVERA',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-19',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'José Martin Tadeo Catalán',
                'telephone'               => '5549501445',
                'sow'                     => 'Yes',
                'sla'                     => 'Yes',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 30,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Proveedor de telefonía celular, planes de datos y SIM cards corporativas.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 3,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 3,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 6,  'sec3_percent' => 100.0,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 6,  'sec5_percent' => 100.0,
                'actual_score'            => 30,
                'percentage'              => 100.0,
                'classification'          => 'calificado',
                'requires_remediation'    => false,
                'remediation_deadline'    => null,
                'ca_items'                => [],
            ],

            // -------------------------------------------------------------
            // 13. RB TECNOLOGIAS
            // -------------------------------------------------------------
            [
                'supplier_name'           => 'RB TECNOLOGIAS Y SISTEMAS DE INFORMACION S.A. DE C.V',
                'supplier_representative' => 'BRENDA ANABELL FLORES HERNANDEZ',
                'audit_type'              => 'precalificacion',
                'audit_type_other'        => null,
                'evaluation_date'         => '2025-09-06',
                'target_score'            => 85,
                'previous_score'          => null,
                'evaluator_name'          => 'Jorge Luis Guzman Mora',
                'telephone'               => '5534268301',
                'sow'                     => 'No se tiene',
                'sla'                     => 'No se tiene',
                'evaluation_period'       => 'Anual',
                'evaluation_reason'       => 'Evaluación Anual',
                'bg_has_certifications'   => true,
                'bg_market_time'          => 30,
                'bg_has_support_channels' => true,
                'bg_has_247_support'      => true,
                'bg_comments'             => 'Desarrollo, consultoría y soporte de sistemas de información.',
                'q1_score' => 3, 'q2_score' => 3, 'q3_score' => 3, 'q4_score' => 3, 'q5_score' => 2,
                'q6_score' => 3, 'q7_score' => 3, 'q8_score' => 3, 'q9_score' => 3, 'q10_score' => 2,
                'sec1_score' => 6,  'sec1_percent' => 100.0,
                'sec2_score' => 6,  'sec2_percent' => 100.0,
                'sec3_score' => 5,  'sec3_percent' => 83.33,
                'sec4_score' => 6,  'sec4_percent' => 100.0,
                'sec5_score' => 5,  'sec5_percent' => 83.33,
                'actual_score'            => 28,
                'percentage'              => 93.33,
                'classification'          => 'sujeto_a_mejora',
                'requires_remediation'    => true,
                'remediation_deadline'    => '2026-09-06',
                'ca_items'                => [
                    [
                        'item'        => '1',
                        'concern'     => 'Recolección de SOW Y SLA',
                        'action'      => 'Solicitar al proveedor la documentacion correspondinete.',
                        'responsible' => 'Jesus Alejandro marron Legorreta',
                        'start_date'  => '2025-10-01',
                        'close_date'  => null,
                    ],
                ],
            ],
        ];

        foreach ($evaluaciones as $data) {
            $proveedorId = null;
            if (class_exists(Proveedor::class) && Schema::hasTable('proveedores')) {
                $proveedor = Proveedor::firstOrCreate(
                    ['nombre' => $data['supplier_name']],
                    [
                        'contacto' => $data['supplier_representative'],
                        'telefono' => $data['telephone'],
                    ]
                );
                $proveedorId = $proveedor->id;
            }

            $evalPayload = [
                'proveedor_id'            => $proveedorId,
                'supplier_name'           => $data['supplier_name'],
                'supplier_representative' => $data['supplier_representative'],
                'audit_type'              => $data['audit_type'],
                'audit_type_other'        => $data['audit_type_other'],
                'evaluation_date'         => $data['evaluation_date'],
                'target_score'            => $data['target_score'],
                'previous_score'          => $data['previous_score'],
                'evaluator_name'          => $data['evaluator_name'],
                'telephone'               => $data['telephone'],
                'sow'                     => $data['sow'],
                'sla'                     => $data['sla'],
                'evaluation_period'       => $data['evaluation_period'],
                'evaluation_reason'       => $data['evaluation_reason'],
                'bg_has_certifications'   => $data['bg_has_certifications'],
                'bg_market_time'          => $data['bg_market_time'],
                'bg_has_support_channels' => $data['bg_has_support_channels'],
                'bg_has_247_support'      => $data['bg_has_247_support'],
                'bg_comments'             => $data['bg_comments'],
                'q1_score'                => $data['q1_score'],
                'q2_score'                => $data['q2_score'],
                'q3_score'                => $data['q3_score'],
                'q4_score'                => $data['q4_score'],
                'q5_score'                => $data['q5_score'],
                'q6_score'                => $data['q6_score'],
                'q7_score'                => $data['q7_score'],
                'q8_score'                => $data['q8_score'],
                'q9_score'                => $data['q9_score'],
                'q10_score'               => $data['q10_score'],
                'sec1_score'              => $data['sec1_score'],
                'sec1_percent'            => $data['sec1_percent'],
                'sec2_score'              => $data['sec2_score'],
                'sec2_percent'            => $data['sec2_percent'],
                'sec3_score'              => $data['sec3_score'],
                'sec3_percent'            => $data['sec3_percent'],
                'sec4_score'              => $data['sec4_score'],
                'sec4_percent'            => $data['sec4_percent'],
                'sec5_score'              => $data['sec5_score'],
                'sec5_percent'            => $data['sec5_percent'],
                'actual_score'            => $data['actual_score'],
                'percentage'              => $data['percentage'],
                'classification'          => $data['classification'],
                'requires_remediation'    => $data['requires_remediation'],
                'remediation_deadline'    => $data['remediation_deadline'],
                'user_id'                 => $usuario->id,
            ];

            $evaluation = FormatoIt22Evaluation::updateOrCreate(
                [
                    'supplier_name'   => $data['supplier_name'],
                    'evaluation_date' => $data['evaluation_date'],
                ],
                $evalPayload
            );

            $evaluation->correctiveActions()->delete();
            foreach ($data['ca_items'] as $ca) {
                FormatoIt22EvaluationCorrectiveAction::create([
                    'formato_it22_evaluation_id' => $evaluation->id,
                    'item'                       => $ca['item'],
                    'concern'                    => $ca['concern'],
                    'action'                     => $ca['action'],
                    'responsible'                => $ca['responsible'],
                    'start_date'                 => $ca['start_date'],
                    'close_date'                 => $ca['close_date'],
                ]);
            }

            $this->command->line(" ✓ F-IT-22: <fg=green>{$data['supplier_name']}</> guardado ({$data['classification']}).");
        }

        $this->command->info('¡Las 13 evaluaciones F-IT-22 han sido sembradas exitosamente!');
    }
}
