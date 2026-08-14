<?php

namespace Database\Seeders;

use App\Models\FormatoIt02Categoria;
use App\Models\FormatoIt02Funcion;
use App\Models\FormatoIt02Permiso;
use App\Models\FormatoIt02Rol;
use Illuminate\Database\Seeder;

class FormatoIt02Seeder extends Seeder
{
    public function run(): void
    {
        // 1. Catálogo completo de Roles / Puestos (46 columnas)
        $rolesData = [
            "PRESIDENTE",
            "ASISTENTE DE PRESIDENCIA",
            "GERENTE DE FINANZAS",
            "GERENTE DE CONTABILIDAD",
            "GERENTE DE SISTEMAS",
            "GERENTE GENERAL DIVISIÓN AUTOMOTRIZ",
            "GERENTE DE ADMINISTRACIÓN COMPRAS NACIONALES y SGI",
            "GERENTE DE CADENA DE SUMINISTRO",
            "GERENTE DE RH",
            "SUBGERENTE GENERAL DIVISIÓN AUTOMOTRIZ",
            "SUBGERENTE DE LOGÍSTICA",
            "SUPERVISOR DE FINANZAS",
            "SUPERVISOR DE CONTABILIDAD",
            "SUPERVISOR DE SISTEMAS",
            "SUPERVISOR DE ALMACEN",
            "SUPERVISOR ADMINISTRACION",
            "SUPERVISOR DE TRÁFICO",
            "SUPERVISOR SENIOR DE COMPRAS INTERNACIONALES",
            "SUPERVISOR DE FACTURACIÓN",
            "SUPERVISOR SENIOR DE VENTAS DE MERCADO INDEPENDIENT",
            "SUPERVISOR DE VENTAS NACIONAL",
            "SUPERVISOR DE VENTAS EXPORTACION",
            "SUPERVISOR DE INTELIGENCIA COMERCIAL",
            "SUPERVISOR OE/OES",
            "SUPERVISOR DE PRODUCTO",
            "SUPERVISOR DE MERCADOTECNIA PLANEACION",
            "STAFF CREDITO Y COBRANZAS",
            "SENIOR STAFF ADMINISTRACION",
            "STAFF FINANZAS",
            "STAFF CONTABILIDAD",
            "STAFF COMPRAS NACIONALES",
            "STAFF ADMINISTRACION",
            "STAFF RECURSOS HUMANOS",
            "STAFF SISTEMAS",
            "SENIOR STAFF ALMACEN",
            "STAFF ALMACEN",
            "STAFF TRAFICO",
            "STAFF COMPRAS INT.",
            "STAFF FACTURACIÓN",
            "SENIOR STAFF FACTURACIÓN",
            "STAFF VENTAS NAC.",
            "STAFF VENTAS EXPORTACIÓN",
            "STAF OE/OES",
            "SENIOR STAFF DE PRODUCTO",
            "STAFF DE PRODUCTO",
            "STAFF MERCADOTECNIA",
        ];

        $rolesMap = [];
        foreach ($rolesData as $index => $nombreRol) {
            $rol = FormatoIt02Rol::firstOrCreate(
                ['nombre' => $nombreRol],
                ['orden'  => $index + 1]
            );
            $rolesMap[$index] = $rol->id;
        }

        // 2. Estructura unificada de Matrices (Configuraciones y Accesos)
        $matrices = [
            'funciones' => [
                [
                    'categoria' => 'Funciones y permisos de configuración',
                    'funciones' => [
                        ['nombre' => 'Instalar/ Desinstalar software', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Desbloqueo de periféricos', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Acceso a recursos en nube', 'valores' => 'D D D D D D D D D D D D D D D D D D D D D D D D D D N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Autorizacion de asignación de cuenta de correo', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Acceso a sistema operativo', 'valores' => 'D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D'],
                    ],
                ],
                [
                    'categoria' => 'Funciones y permisos de solicitud de soporte a sistemas',
                    'funciones' => [
                        ['nombre' => 'Adquisicion de nuevo equipo', 'valores' => 'D D D D D D D D D N D N N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Manipulación de permisos de la carpeta de finanzas // adm account', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Reparacion de Equipo de computo', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Solicitud de reparacion de Equipo', 'valores' => 'D D D D D D D D D N D N D D D D D D D D D N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Permiso de Acceso a Sistema de Video Vigilancia', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Solicitud de cambios o acceso a sistemas', 'valores' => 'D D D D D D D D D N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                    ],
                ],
                [
                    'categoria' => 'Funciones y permisos de uso de software',
                    'funciones' => [
                        ['nombre' => 'Uso y Operación de Software SAP', 'valores' => 'D D D D D D D D D N D D D D D D D D D D D D D D D D D D D D D D D D N N D D D D D D D D D D'],
                        ['nombre' => 'Uso y Operación de Software ATEB COFIDI', 'valores' => 'N N D D D N N N D N N D D D N N N N N N N D N N N N N N N N N D N N N N D D N N D D D D D D'],
                        ['nombre' => 'Uso y Operación de Office 365', 'valores' => 'D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D'],
                        ['nombre' => 'Uso y Operación de VPN', 'valores' => 'D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D N N D D D D D D D D D D D'],
                        ['nombre' => 'Uso y Operación de Gestor de Bases de Dados (MySQL, SQL Server)', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Uso y Operación de Insight', 'valores' => 'N D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D'],
                        ['nombre' => 'Uso y Operación de Adobe Acrobat', 'valores' => 'D D D D D D D D D D D D D D D D D D D D D D D D D D N N D D D D D N N D D D D N N D D D D N'],
                        ['nombre' => 'Uso y Operación de Adobe Creative Cloud', 'valores' => 'N N N N D N N N N N N D N N N N D N N N N D N N N D N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Uso y Operación de PartCat', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N D'],
                        ['nombre' => 'Uso y Operación de navegadores web (Chrome, Mozila, Edge, Brave, Safari)', 'valores' => 'D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D'],
                        ['nombre' => 'Uso y Operación de Manage engine', 'valores' => 'D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D'],
                        ['nombre' => 'Uso y Operación de Delinea', 'valores' => 'D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D'],
                        ['nombre' => 'Uso y Operación de Antivirus', 'valores' => 'D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D'],
                        ['nombre' => 'Uso y Operación de gsaddin & diva', 'valores' => 'N N D D N N N N N D N N N N N N N N N N N N D N N N N N N N N N N D N N N N N N N N N N N N'],
                    ],
                ],
                [
                    'categoria' => 'Funciones y permisos de administración de recursos de TI',
                    'funciones' => [
                        ['nombre' => 'Acceso a configuración Sistema de Tickets', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Acceso a configuración de (PAM)', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Acceso a configuración Antivirus', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Acceso a configuración del Panel de control', 'valores' => 'D D N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'Acceso a configuración Manage engine', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N'],
                    ],
                ],
            ],

            'recursos' => [
                [
                    'categoria' => 'Recursos de acceso',
                    'funciones' => [
                        ['nombre' => 'COFIDI Accesos de configuración', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N N D N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'COFIDI Módulos de Operación', 'valores' => 'N N D D D N N D N N N D N N N N D N N N D N D D N N N D N N N N D D N N N N N N N N N N N N'],
                        ['nombre' => 'Información finanzas', 'valores' => 'N N D D D N N N N N D D N N N N N N N N D N D D N N N D N N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'Manipulación de permisos de la carpeta de finanzas // adm account', 'valores' => 'N N N N D N N N N N N D N N N N N N N N N N N N N N N D N N N N D N N N N N N N N N N N N'],
                        ['nombre' => 'SAP - Finanzas', 'valores' => 'D D D D D N N N N N D D N N N N N N N N D N D D N N N D N D D N N N N N N N N N N N N N N N'],
                        ['nombre' => 'SAP - Ventas', 'valores' => 'D D N N D D N N N N N D N N N N N N N N N N N N D N N N N D N N N N N N N N N N N N N N N'],
                        ['nombre' => 'SAP - Facturación', 'valores' => 'N N N N D D N D N N N D N N N N D N N N N N N N N N N N N N N N D D N N N N N N N N N N N N'],
                        ['nombre' => 'SAP - Compras', 'valores' => 'D N N N D N N N N N D N P N D N N N N N N N N N D N N N D N N N D N N N N N N N N N N N N N'],
                        ['nombre' => 'SAP - Almacén', 'valores' => 'N N N N D N N D N N N D D D D D N N N N N N N N N D D N N N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'SAP - Gestión de Materiales', 'valores' => 'N N N N D N D D N N N D D D D D N N N N D D N N D N N D N N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'SAP - Ventas y Distribución', 'valores' => 'D N N N D D D N N N N D N N N N N N N N N N N N D N N D N N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'WiFi - Almacén', 'valores' => 'D D N N D N N N N N N D D D D N N N N N N N N N N D D N N N D D N N N N N N N N N N N N N N'],
                        ['nombre' => 'WiFi - Oficinas', 'valores' => 'D D D D D D D D D D D N D D D D D D D D D D D D D D D D N N D D D D D D D D D D D D D D D D'],
                        ['nombre' => 'WiFi - Visitas', 'valores' => 'D D N N D N N N N N N D N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'Acceso a KnowBe4', 'valores' => 'D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D D'],
                        ['nombre' => 'Cuentas corporativas de redes sociales / pagina web', 'valores' => 'N N N N N N N N N N N N N N N N N N N N N N N N D N N N N N N N N N N N N N N N N N N N D N'],
                        ['nombre' => 'gsaddin & diva', 'valores' => 'N N D D N N N N N D D N N N N N N N N N N N N D D N N D D N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'Bifiskur', 'valores' => 'N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'Focaltec', 'valores' => 'N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'EndPoint Central Manage Engine', 'valores' => 'N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'AdAudit Plus Manage Engine', 'valores' => 'N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'MVE-ANA', 'valores' => 'N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'Delinea', 'valores' => 'N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'Crowdstrike', 'valores' => 'N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N'],
                        ['nombre' => 'FTP Server', 'valores' => 'N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N N'],
                    ],
                ],
            ],
        ];

        foreach ($matrices as $matrizKey => $categorias) {
            foreach ($categorias as $catIndex => $catData) {
                $categoria = FormatoIt02Categoria::firstOrCreate(
                    [
                        'matriz_tipo' => $matrizKey,
                        'nombre'      => $catData['categoria'],
                    ],
                    [
                        'orden' => $catIndex + 1,
                    ]
                );

                foreach ($catData['funciones'] as $funcIndex => $funcData) {
                    $funcion = FormatoIt02Funcion::firstOrCreate(
                        [
                            'categoria_id' => $categoria->id,
                            'nombre'       => $funcData['nombre'],
                        ],
                        [
                            'orden' => $funcIndex + 1,
                        ]
                    );

                    $valores = explode(' ', $funcData['valores']);
                    foreach ($valores as $rolIndex => $valor) {
                        if (isset($rolesMap[$rolIndex]) && in_array($valor, ['D', 'P', 'N'])) {
                            FormatoIt02Permiso::updateOrCreate(
                                [
                                    'rol_id'     => $rolesMap[$rolIndex],
                                    'funcion_id' => $funcion->id,
                                ],
                                [
                                    'valor' => $valor,
                                ]
                            );
                        }
                    }
                }
            }
        }
    }
}