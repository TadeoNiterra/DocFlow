<?php

namespace Database\Seeders;

use App\Models\ChecklistEquipo;
use App\Models\Colaborador;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AsignarDispositivosMovilesSeeder extends Seeder
{
    public function run(): void
    {
        $moviles = [
            // =================================================================
            // 🤖 ANDROID
            // =================================================================
            [
                'modelo_txt' => 'HONOR X8A',
                'serie' => '860972062388581',
                'imei' => '860972062388581',
                'fecha' => '2025-07-10',
                'owner' => 'Francisco Javier Chavez Morales',
                'colaborador_id' => 79,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'HONOR X8A',
                'serie' => '860972062384457',
                'imei' => '860972062384457',
                'fecha' => '2025-07-30',
                'owner' => 'Mauricio Ugalde Galindo',
                'colaborador_id' => 68,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'HONOR X8A',
                'serie' => '860972062389266',
                'imei' => '860972062389266',
                'fecha' => '2025-07-30',
                'owner' => 'LIBRE',
                'colaborador_id' => null,
                'libre' => true,
            ],
            [
                'modelo_txt' => 'HONOR X8A',
                'serie' => '860972061834791',
                'imei' => '860972061834791',
                'fecha' => '2025-07-30',
                'owner' => 'Annery Viridiana Aguilar Herrera',
                'colaborador_id' => 27,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'HONOR X8A',
                'serie' => '860972062376032',
                'imei' => '860972062376032',
                'fecha' => '2025-07-30',
                'owner' => 'Cesar Paniagua Gutierrez',
                'colaborador_id' => 28,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'MOTOROLA MOTO G 5',
                'serie' => '359488353649076',
                'imei' => '359488353649076',
                'fecha' => '2025-07-10',
                'owner' => 'Jose Ernesto Patiño Cuapio',
                'colaborador_id' => 18,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'MOTOROLA MOTO G 5',
                'serie' => '359488353648862',
                'imei' => '359488353648862',
                'fecha' => '2025-07-30',
                'owner' => 'Jose Martin Tadeo Catalan',
                'colaborador_id' => 38,
                'libre' => false,
            ],

            // =================================================================
            // 🍎 APPLE IPHONE / IPAD
            // =================================================================
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'RXVWP43K97',
                'imei' => '351168084597145',
                'fecha' => '2024-09-01',
                'owner' => 'Agustin Martinez Paredes',
                'colaborador_id' => 9,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'WP02LNYQYL',
                'imei' => '351168084547744',
                'fecha' => '2024-09-01',
                'owner' => 'LIBRE (ALBERTO ALANIS)',
                'colaborador_id' => null,
                'libre' => true,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'VY90CX3XF5',
                'imei' => '351168084713023',
                'fecha' => '2024-09-01',
                'owner' => 'Edwin Alejandro Rodriguez Leal',
                'colaborador_id' => 59,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'H165QYXRRL',
                'imei' => '351168084796093',
                'fecha' => '2024-09-01',
                'owner' => 'Daniel Vargas Molina',
                'colaborador_id' => 47,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'G452QQWR27',
                'imei' => '351168084354687',
                'fecha' => '2024-09-01',
                'owner' => 'Julio Edgar Avila Garcia',
                'colaborador_id' => 40,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'T02375NYWM',
                'imei' => '351168084972363',
                'fecha' => '2024-09-01',
                'owner' => 'Andres Rivera Laguna',
                'colaborador_id' => 44,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'NHXNM4X1XG',
                'imei' => '351168084261817',
                'fecha' => '2024-09-01',
                'owner' => 'Carlos Alberto Banda Villar',
                'colaborador_id' => 65,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'TD2F03HXHM',
                'imei' => '351168084534007',
                'fecha' => '2024-09-01',
                'owner' => 'Ruben David Martinez Chavez',
                'colaborador_id' => 48,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'WV4KY0R4XC',
                'imei' => '351168084273085',
                'fecha' => '2024-09-01',
                'owner' => 'LIBRE (JUAN FRANCISCO GARCIA)',
                'colaborador_id' => null,
                'libre' => true,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'CT7XLFT9DG',
                'imei' => '351168084898709',
                'fecha' => '2024-09-01',
                'owner' => 'LIBRE (ANTONIO ALVAREZ)',
                'colaborador_id' => null,
                'libre' => true,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'VYPL9F7RHH',
                'imei' => '351168084715366',
                'fecha' => '2024-09-01',
                'owner' => 'Abraham Israel Cabrera Martinez',
                'colaborador_id' => 36,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'XGDP4T4FL2',
                'imei' => '351168084255512',
                'fecha' => '2024-09-01',
                'owner' => 'Noel Arif Ruiz Machucho',
                'colaborador_id' => 23,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'W5NQ0JG4WQ',
                'imei' => '351168084594472',
                'fecha' => '2024-09-01',
                'owner' => 'Oscar Trujillo Moreno',
                'colaborador_id' => 21,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'HQV36KC2L2',
                'imei' => '351168084459700',
                'fecha' => '2024-09-01',
                'owner' => 'Ricardo Melo Guzman',
                'colaborador_id' => 13,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'YP46NF26CW',
                'imei' => '351168084858083',
                'fecha' => '2024-09-01',
                'owner' => 'Luis Angel Oregon Martinez',
                'colaborador_id' => 66,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'VK00F5HVJM',
                'imei' => '351168084957836',
                'fecha' => '2024-09-01',
                'owner' => 'Salvador Sanchez Ruiz',
                'colaborador_id' => 17,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'GYFTFQQ4P6',
                'imei' => '351168084182708',
                'fecha' => '2024-09-01',
                'owner' => 'Luis Fernando Sampedro Cruz',
                'colaborador_id' => 52,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'VJHY7JC792',
                'imei' => '351168084600006',
                'fecha' => '2024-09-01',
                'owner' => 'Jose Miguel Flores Castillo',
                'colaborador_id' => 50,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 128 GB',
                'serie' => 'YTWQ9P4CVY',
                'imei' => '351168084215805',
                'fecha' => '2024-09-01',
                'owner' => 'Emilio Raul Ramirez Gonzalez',
                'colaborador_id' => 16,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 12 Black 64 GB',
                'serie' => 'FFMJQ1050F0N',
                'imei' => '354244476827403',
                'fecha' => '2022-11-01',
                'owner' => 'Leonardo Daniel Garcia Soto',
                'colaborador_id' => 73,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 12 Black 64 GB',
                'serie' => 'FFMJQ0K20F0N',
                'imei' => '354244476694019',
                'fecha' => '2022-11-01',
                'owner' => 'Patricia Viviana Ramirez Ocaña',
                'colaborador_id' => 35,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 12 Black 64 GB',
                'serie' => 'FFMJQ14B0F0N',
                'imei' => '354244476999004',
                'fecha' => '2022-11-01',
                'owner' => 'Daniel Rodriguez Bistrain',
                'colaborador_id' => 12,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 12 Black 64 GB',
                'serie' => 'FFMJQ01P0F0N',
                'imei' => '350640547431774',
                'fecha' => '2022-11-01',
                'owner' => 'Jesus Malagon Sanchez',
                'colaborador_id' => 30,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 12 Black 64 GB',
                'serie' => 'FFMJQ10G0F0N',
                'imei' => '354244476656919',
                'fecha' => '2022-11-01',
                'owner' => 'Omar Jorge Chavez Morales',
                'colaborador_id' => 78,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 12 Black 64 GB',
                'serie' => 'FFXJ1HS30F0N',
                'imei' => '356427674527895',
                'fecha' => '2022-11-01',
                'owner' => 'David Velazquez Trejo',
                'colaborador_id' => 15,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 12 Black 64 GB',
                'serie' => 'FFMJQ08T0F0N',
                'imei' => '356427674903898',
                'fecha' => '2022-11-01',
                'owner' => 'Claudia Olivia Martinez Cardenas',
                'colaborador_id' => 5,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 12 Black 64 GB',
                'serie' => 'FFMJQ08T0F0N',
                'imei' => '354244476995325',
                'fecha' => '2022-11-01',
                'owner' => 'Ana Rosa Villanueva Sanchez',
                'colaborador_id' => 72,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 12 Black 64 GB',
                'serie' => 'FFXJ1PWE0F0N',
                'imei' => '356427674620468',
                'fecha' => '2022-11-01',
                'owner' => 'Julio Cesar Mendoza Rodriguez',
                'colaborador_id' => 42,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 12 Black 64 GB',
                'serie' => 'FFMJQ08T0F0N',
                'imei' => '354244474672199',
                'fecha' => '2022-11-01',
                'owner' => 'Alejandra Velazquez Rodriguez',
                'colaborador_id' => 1,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 Pro Max 128 GB',
                'serie' => null,
                'imei' => '359237904408940',
                'fecha' => '2023-03-01',
                'owner' => 'Gabriel Arriaga Colin',
                'colaborador_id' => 8,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 14 Pro Max 128 GB',
                'serie' => 'HHWHF93M7N',
                'imei' => '352994539104123',
                'fecha' => '2023-03-01',
                'owner' => 'Jesus Alejandro Marron Legorreta',
                'colaborador_id' => 11,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 13 128 GB',
                'serie' => 'JRH2JXCQPT',
                'imei' => '357654174357304',
                'fecha' => '2023-03-01',
                'owner' => 'Jorge Luis Guzman Mora',
                'colaborador_id' => 6,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPad (10th Gen) Wi-Fi 256 GB',
                'serie' => 'HK1FWWJ1G0',
                'imei' => null,
                'fecha' => '2024-09-01',
                'owner' => 'Jessica Lopez Contreras',
                'colaborador_id' => 32,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPad Pro 11" Gen 4',
                'serie' => 'MHW93LZ',
                'imei' => null,
                'fecha' => '2024-09-01',
                'owner' => 'Jesus Alejandro Marron Legorreta (TI)',
                'colaborador_id' => 11,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 15 Black 128 GB',
                'serie' => 'DQR937QY2J',
                'imei' => '353524887045161',
                'fecha' => '2025-05-12',
                'owner' => 'Takahiro Arakawa',
                'colaborador_id' => null,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 16 Plus 128 GB',
                'serie' => 'L44JJXMPY4',
                'imei' => '353303304517619',
                'fecha' => '2026-01-31',
                'owner' => 'Gabriel Arriaga Colin',
                'colaborador_id' => 8,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 16 Plus 128 GB',
                'serie' => 'GVQ3H2M4VD',
                'imei' => '353303309915198',
                'fecha' => '2026-01-31',
                'owner' => 'Ricardo Edmundo Medina Colin',
                'colaborador_id' => 10,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 16 Black 128 GB',
                'serie' => 'L56NP996Y9',
                'imei' => '354257903416574',
                'fecha' => '2026-01-31',
                'owner' => 'Kazuki Minai',
                'colaborador_id' => null,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 16 Black 128 GB',
                'serie' => 'K7GFCPW1QP',
                'imei' => '354257903150785',
                'fecha' => '2026-01-31',
                'owner' => 'Mario Alberto Horcasitas Hernandez',
                'colaborador_id' => 67,
                'libre' => false,
            ],
            [
                'modelo_txt' => 'iPhone 17 Pro Silver 256 GB',
                'serie' => 'J4YTXYHHK7',
                'imei' => '352176456736091',
                'fecha' => '2026-06-01',
                'owner' => 'Takahiro Arakawa',
                'colaborador_id' => null,
                'libre' => false,
            ],
        ];

        $colSerie = Schema::hasColumn('dispositivos', 'numero_serie') ? 'numero_serie' : 'serie';
        $colImei = Schema::hasColumn('dispositivos', 'imei') ? 'imei' : (Schema::hasColumn('dispositivos', 'imei1') ? 'imei1' : null);

        $folioContador = 1;

        foreach ($moviles as $m) {
            // 1. Localizar Dispositivo (por Serial o IMEI)
            $query = DB::table('dispositivos');

            if (!empty($m['imei']) && $colImei) {
                $query->where($colImei, $m['imei']);
            } elseif (!empty($m['serie'])) {
                $query->where($colSerie, $m['serie']);
            }

            $disp = $query->first();

            if (!$disp) {
                continue;
            }

            // 2. Si es LIBRE (Vacante/Stock), actualizar estatus en stock y no emitir checklist
            if ($m['libre']) {
                $updateData = [
                    'estatus_asignacion' => 'EN STOCK',
                    'location' => 'Almacén',
                    'updated_at' => now(),
                ];

                if (Schema::hasColumn('dispositivos', 'colaborador_id')) {
                    $updateData['colaborador_id'] = null;
                }

                DB::table('dispositivos')->where('id', $disp->id)->update($updateData);
                continue;
            }

            // 3. Resolver Colaborador para Presidencia si viene sin ID fijo
            $colaboradorId = $m['colaborador_id'];
            if (!$colaboradorId) {
                $primerNombre = explode(' ', $m['owner'])[0];
                $c = Colaborador::where('name', 'LIKE', "%{$primerNombre}%")->first();
                if ($c) {
                    $colaboradorId = $c->id;
                }
            }

            $fechaAsignacion = Carbon::parse($m['fecha']);
            $folio = 'CHK-MOV-' . $fechaAsignacion->format('Y') . '-' . str_pad($folioContador, 4, '0', STR_PAD_LEFT);

            // 4. Crear Checklist de Asignación Inicial
            $checklist = ChecklistEquipo::updateOrCreate(
                [
                    'folio' => $folio,
                ],
                [
                    'dispositivo_id' => $disp->id,
                    'colaborador_id' => $colaboradorId,
                    'accion' => 'ASIGNACION_INICIAL',
                    'fecha' => $fechaAsignacion,
                    'accesorios' => 'Cargador original, cable de datos y funda protectora',
                    'hw_accesorios_completos' => 'C',
                    'hw_partes_funcionan' => 'C',
                    'hw_enciende_bien' => 'C',
                    'hw_carcasa_estado' => 'C',
                    'hw_accesorios_estado' => 'C',
                    'hw_limpieza' => 'C',
                    'hw_otros' => 'NA',
                    'sw_programas_completos' => 'C',
                    'sw_programas_principales' => 'C',
                    'sw_programas_secundarios' => 'C',
                    'sw_limpieza_cookies_historial' => 'C',
                    'sw_autorizado' => 'C',
                    'sw_respaldo_local' => 'C',
                    'sw_espacio_almacenamiento' => 'C',
                    'sw_velocidad_respuesta' => 'C',
                    'seg_mfa_desbloqueado' => 'C',
                    'seg_antivirus_bloqueado' => 'C',
                    'seg_derechos_privilegios' => 'C',
                    'seg_otros' => 'NA',
                    'observaciones' => 'Asignación de dispositivo móvil (' . $m['modelo_txt'] . ') según política de seguridad corporativa.',
                    'nombre_usuario' => $m['owner'],
                    'nombre_jefe_directo' => 'NA',
                    'nombre_sistemas' => 'José Martin Tadeo Catalán',
                ]
            );

            // 5. Actualizar Trazabilidad en la tabla dispositivos a ENTREGADO
            $asignacionesPrevias = ChecklistEquipo::where('dispositivo_id', $disp->id)
                ->where('id', '!=', $checklist->id)
                ->whereIn('accion', ['ASIGNACION_INICIAL', 'DEVOLUCION'])
                ->exists();

            $updateData = [
                'estatus_asignacion' => 'ENTREGADO',
                'location' => 'Oficina',
                'fecha_asignacion' => $fechaAsignacion,
                'updated_at' => now(),
            ];

            if ($colaboradorId && Schema::hasColumn('dispositivos', 'colaborador_id')) {
                $updateData['colaborador_id'] = $colaboradorId;
            }

            if (Schema::hasColumn('dispositivos', 'ciclo_borrado')) {
                $cicloActual = DB::table('dispositivos')->where('id', $disp->id)->value('ciclo_borrado') ?? 0;
                $updateData['ciclo_borrado'] = $asignacionesPrevias ? ($cicloActual + 1) : $cicloActual;
            }

            DB::table('dispositivos')->where('id', $disp->id)->update($updateData);

            $folioContador++;
        }

        $this->command->info('¡Móviles asignados y actualizados a ENTREGADO con sus Checklists creados exitosamente!');
    }
}