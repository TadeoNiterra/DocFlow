<?php

namespace Database\Seeders;

use App\Models\ChecklistEquipo;
use App\Models\Colaborador;
use App\Models\Dispositivo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChecklistEquipoSeeder extends Seeder
{
    public function run(): void
    {
        // Mapeo con el ID numérico directo de cada colaborador
        $asignaciones = [
            ['colaborador_id' => 1, 'owner' => 'Alejandra Velazquez Rodriguez', 'serie' => 'PF59GR3W'],
            ['colaborador_id' => 5, 'owner' => 'Claudia Olivia Martinez Cardenas', 'serie' => 'PF59GWPR'],
            ['colaborador_id' => 6, 'owner' => 'Jorge Luis Guzman Mora', 'serie' => 'PF577HCX'],
            ['colaborador_id' => 7, 'owner' => 'Sonia Fragoso Romero', 'serie' => 'PF59GTES'],
            ['colaborador_id' => 8, 'owner' => 'Gabriel Arriaga Colin', 'serie' => 'PF577SCP'],
            ['colaborador_id' => 9, 'owner' => 'Agustin Martinez Paredes', 'serie' => 'PF577S1P'],
            ['colaborador_id' => 10, 'owner' => 'Ricardo Edmundo Medina Colin', 'serie' => 'PF591FDS'],
            ['colaborador_id' => 11, 'owner' => 'Jesus Alejandro Marron Legorreta', 'serie' => 'PF577MVP'],
            ['colaborador_id' => 12, 'owner' => 'Daniel Rodriguez Bistrain', 'serie' => 'PF58R7XG'],
            ['colaborador_id' => 13, 'owner' => 'Ricardo Melo Guzman', 'serie' => 'PF58R7WY'],
            ['colaborador_id' => 14, 'owner' => 'Angelina Susana Figueroa Mondragon', 'serie' => 'PF59GTG9'],
            ['colaborador_id' => 15, 'owner' => 'David Velazquez Trejo', 'serie' => 'PF59GTDA'],
            ['colaborador_id' => 16, 'owner' => 'Emilio Raul Ramirez Gonzalez', 'serie' => 'PF577MKV'],
            ['colaborador_id' => 17, 'owner' => 'Salvador Sanchez Ruiz', 'serie' => 'PF5JB9EW'],
            ['colaborador_id' => 18, 'owner' => 'Jose Ernesto Patiño Cuapio', 'serie' => 'PF59GWQ4'],
            ['colaborador_id' => 19, 'owner' => 'Ayleen Coronado Aylett', 'serie' => 'PF58R4ZT'],
            ['colaborador_id' => 20, 'owner' => 'Efrain Monroy Ayala', 'serie' => 'PF59GR3M'],
            ['colaborador_id' => 21, 'owner' => 'Oscar Trujillo Moreno', 'serie' => 'PF577AAF'],
            ['colaborador_id' => 22, 'owner' => 'Ileana Belen Gutierrez Rosas', 'serie' => 'PF59GTDF'],
            ['colaborador_id' => 23, 'owner' => 'Noel Arif Ruiz Machucho', 'serie' => 'PF5JB9XG'],
            ['colaborador_id' => 24, 'owner' => 'Nelly Michelle Esteva Solorio', 'serie' => 'PF59ZYRE'],
            ['colaborador_id' => 25, 'owner' => 'Luz Amayrani Sanchez Hernandez', 'serie' => 'PF59XXX7'],
            ['colaborador_id' => 27, 'owner' => 'Annery Viridiana Aguilar Herrera', 'serie' => 'PF59GR76'],
            ['colaborador_id' => 28, 'owner' => 'Cesar Paniagua Gutierrez', 'serie' => 'PF59GR6V'],
            ['colaborador_id' => 29, 'owner' => 'Juan Carlos Vazquez Mera', 'serie' => 'PF59GTGF'],
            ['colaborador_id' => 30, 'owner' => 'Jesus Malagon Sanchez', 'serie' => 'PF58RCS5'],
            ['colaborador_id' => 31, 'owner' => 'Sheyla Beatriz Payan Rubio', 'serie' => 'PF5JNT59'],
            ['colaborador_id' => 32, 'owner' => 'Jessica Lopez Contreras', 'serie' => 'PF59J7S2'],
            ['colaborador_id' => 35, 'owner' => 'Patricia Viviana Ramirez Ocaña', 'serie' => 'PF56SG5A'],
            ['colaborador_id' => 36, 'owner' => 'Abraham Israel Cabrera Martinez', 'serie' => 'PF59QHRW'],
            ['colaborador_id' => 37, 'owner' => 'Montserrat Sanchez Alvarez', 'serie' => 'PF59GR7R'],
            ['colaborador_id' => 38, 'owner' => 'Jose Martin Tadeo Catalan', 'serie' => 'PF577HC8'],
            ['colaborador_id' => 39, 'owner' => 'Miguel Villanueva Oropeza', 'serie' => 'PF5796FD'],
            ['colaborador_id' => 40, 'owner' => 'Julio Edgar Avila Garcia', 'serie' => 'PF578JXP'],
            ['colaborador_id' => 41, 'owner' => 'Brenda Isabel Martinez Montelongo', 'serie' => 'PF59GTEJ'],
            ['colaborador_id' => 42, 'owner' => 'Julio Cesar Mendoza Rodriguez', 'serie' => 'PF59GWNM'],
            ['colaborador_id' => 43, 'owner' => 'Maria Fernanda Gonzalez Garcia', 'serie' => 'PF59GR49'],
            ['colaborador_id' => 44, 'owner' => 'Andres Rivera Laguna', 'serie' => 'PF577MLJ'],
            ['colaborador_id' => 45, 'owner' => 'Jazmin Monserrat Fernandez Rojas', 'serie' => 'PF59GWMA'],
            ['colaborador_id' => 46, 'owner' => 'Alejandra Carrera Filio', 'serie' => 'PF59GTFR'],
            ['colaborador_id' => 47, 'owner' => 'Daniel Vargas Molina', 'serie' => 'PF577S2R'],
            ['colaborador_id' => 48, 'owner' => 'Ruben David Martinez Chavez', 'serie' => 'PF578C4T'],
            ['colaborador_id' => 49, 'owner' => 'Beatriz Adriana Cerda Barcenas', 'serie' => 'PF59J7S8'],
            ['colaborador_id' => 50, 'owner' => 'Jose Miguel Flores Castillo', 'serie' => 'PF5JBBZH'],
            ['colaborador_id' => 51, 'owner' => 'Lizeth Sanchez Luna', 'serie' => 'PF59GR7F'],
            ['colaborador_id' => 52, 'owner' => 'Luis Fernando Sampedro Cruz', 'serie' => 'PF5765AV'],
            ['colaborador_id' => 53, 'owner' => 'Fabiola Mendoza Silva', 'serie' => 'PF58RC2L'],
            ['colaborador_id' => 54, 'owner' => 'Karen Itzel Martinez Chavez', 'serie' => 'PF5JNW4N'],
            ['colaborador_id' => 58, 'owner' => 'Edith Ibarra Dionicio', 'serie' => 'PF59GNYY'],
            ['colaborador_id' => 59, 'owner' => 'Edwin Alejandro Rodriguez Leal', 'serie' => 'PF57632T'],
            ['colaborador_id' => 60, 'owner' => 'Brenda Esmeralda Guzman Tepectzin', 'serie' => 'PF59J7V0'],
            ['colaborador_id' => 61, 'owner' => 'Edwin Alejandro Romero Reyes', 'serie' => 'PF59J7SZ'],
            ['colaborador_id' => 64, 'owner' => 'Axel Alejandro Montes Soto', 'serie' => 'PF59GWM4'],
            ['colaborador_id' => 65, 'owner' => 'Carlos Alberto Banda Villar', 'serie' => 'PF5753WM'],
            ['colaborador_id' => 66, 'owner' => 'Luis Angel Oregon Martinez', 'serie' => 'PF5736XJ'],
            ['colaborador_id' => 67, 'owner' => 'Mario Alberto Horcasitas Hernandez', 'serie' => 'PF5RAV7X'],
            ['colaborador_id' => 68, 'owner' => 'Mauricio Ugalde Galindo', 'serie' => 'PF59GWMH'],
            ['colaborador_id' => 69, 'owner' => 'Alejandra Hernandez Martinez', 'serie' => 'PF5JRJ9M'],
            ['colaborador_id' => 70, 'owner' => 'Jose Alejandro Valdez Franco', 'serie' => 'PF5Q27D4'],
            ['colaborador_id' => 72, 'owner' => 'Ana Rosa Villanueva Sanchez', 'serie' => 'PF59GTCC'],
            ['colaborador_id' => 73, 'owner' => 'Leonardo Daniel Garcia Soto', 'serie' => 'PF59GR37'],
            ['colaborador_id' => 75, 'owner' => 'Maria Guadalupe Santos Escorcia', 'serie' => 'PF59GWQ9'],
            ['colaborador_id' => 76, 'owner' => 'Tatiana Maribel Sanchez Jimenez', 'serie' => 'PF59GR42'],
            ['colaborador_id' => 78, 'owner' => 'Omar Jorge Chavez Morales', 'serie' => 'PF58RCTL'],
            ['colaborador_id' => 79, 'owner' => 'Francisco Javier Chavez Morales', 'serie' => 'PF572XR3'],
            ['colaborador_id' => 80, 'owner' => 'Marco Antonio Alegria Ugalde', 'serie' => 'PF5JRN1F'],
        ];

        $contador = 1;
        $serieColumna = Schema::hasColumn('dispositivos', 'numero_serie') ? 'numero_serie' : 'serie';

        foreach ($asignaciones as $item) {
            $colaboradorId = $item['colaborador_id'];
            $dispositivoId = null;

            // 1. Buscar o dar de alta el dispositivo por su serie
            if (Schema::hasTable('dispositivos')) {
                $dispDb = DB::table('dispositivos')->where($serieColumna, $item['serie'])->first();

                if (!$dispDb) {
                    $payloadDisp = [
                        $serieColumna => $item['serie'],
                        'estatus_asignacion' => 'EN STOCK',
                        'location' => 'Almacén',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    if (Schema::hasColumn('dispositivos', 'clasificacion')) {
                        $payloadDisp['clasificacion'] = 'CONFIDENCIAL';
                    }

                    if (Schema::hasColumn('dispositivos', 'tipo')) {
                        $payloadDisp['tipo'] = 'LAPTOP';
                    }

                    if (Schema::hasColumn('dispositivos', 'modelo_equipo_id')) {
                        $payloadDisp['modelo_equipo_id'] = ($item['serie'] === 'PF572XR3') ? 2 : 3;
                    } elseif (Schema::hasColumn('dispositivos', 'modelo_id')) {
                        $payloadDisp['modelo_id'] = ($item['serie'] === 'PF572XR3') ? 2 : 3;
                    }

                    $dispositivoId = DB::table('dispositivos')->insertGetId($payloadDisp);
                } else {
                    $dispositivoId = $dispDb->id;
                }
            }

            if (!$dispositivoId) {
                continue;
            }

            $folio = 'CHK-' . Carbon::parse('2025-07-01')->format('Y') . '-' . str_pad($contador, 4, '0', STR_PAD_LEFT);
            $fechaAsignacion = Carbon::parse('2025-07-01');

            // 2. Registrar el Checklist de Inspección
            $checklist = ChecklistEquipo::updateOrCreate(
                [
                    'folio' => $folio,
                ],
                [
                    'dispositivo_id' => $dispositivoId,
                    'colaborador_id' => $colaboradorId,
                    'accion' => 'ASIGNACION_INICIAL',
                    'fecha' => $fechaAsignacion,
                    'accesorios' => 'Cargador original y cable de corriente',
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
                    'observaciones' => 'Asignación formal de equipo de cómputo corporativo conforme a checklist de entrega.',
                    'nombre_usuario' => $item['owner'],
                    'nombre_jefe_directo' => 'NA',
                    'nombre_sistemas' => 'José Martin Tadeo Catalán',
                ]
            );

            // 3. Actualizar la tabla dispositivos (estatus ENTREGADO, colaborador_id, ubicación y fecha)
            if (Schema::hasTable('dispositivos')) {
                $asignacionesPrevias = ChecklistEquipo::where('dispositivo_id', $dispositivoId)
                    ->where('id', '!=', $checklist->id)
                    ->whereIn('accion', ['ASIGNACION_INICIAL', 'DEVOLUCION'])
                    ->exists();

                $updateData = [
                    'colaborador_id' => $colaboradorId,
                    'estatus_asignacion' => 'ENTREGADO',
                    'location' => 'Oficina',
                    'fecha_asignacion' => $fechaAsignacion,
                    'updated_at' => now(),
                ];

                if (Schema::hasColumn('dispositivos', 'ciclo_borrado')) {
                    $cicloActual = DB::table('dispositivos')->where('id', $dispositivoId)->value('ciclo_borrado') ?? 0;
                    $updateData['ciclo_borrado'] = $asignacionesPrevias ? ($cicloActual + 1) : $cicloActual;
                }

                DB::table('dispositivos')->where('id', $dispositivoId)->update($updateData);
            }

            $contador++;
        }

        $this->command->info("¡Checklists sembrados con ID de colaborador y equipos actualizados a ENTREGADO! Total: " . ($contador - 1));
    }
}