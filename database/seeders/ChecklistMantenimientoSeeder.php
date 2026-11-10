<?php

namespace Database\Seeders;

use App\Models\ChecklistEquipo;
use App\Models\Colaborador;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChecklistMantenimientoSeeder extends Seeder
{
    public function run(): void
    {
        $mantenimientos = [
            ['id' => 74, 'nombre' => 'Claudia Olivia Martínez Cárdenas', 'serie' => 'PF59GWPR', 'celular' => '356427674903898 (IPHONE 12 BLACK 64 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2025-10-20'],
            ['id' => 75, 'nombre' => 'Montserrat Sánchez Álvarez', 'serie' => 'PF59GR7R', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2025-10-21'],
            ['id' => 76, 'nombre' => 'Jessica López Contreras', 'serie' => 'PF59J7S2', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2025-10-22'],
            ['id' => 77, 'nombre' => 'José Ernesto Patiño Cuapio', 'serie' => 'PF59GWQ4', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2025-10-23'],
            ['id' => 81, 'nombre' => 'Ileana Belén Gutiérrez Rosas', 'serie' => 'PF59GTDF', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2025-10-24'],
            ['id' => 84, 'nombre' => 'Ayleen Coronado Aylett', 'serie' => 'PF58R4ZT', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2025-11-11'],
            ['id' => 85, 'nombre' => 'Alejandra Velázquez Rodríguez', 'serie' => 'PF59GR3W', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2025-11-12'],
            ['id' => 86, 'nombre' => 'Leslie Jatzibeth Juárez Segura', 'serie' => 'PF59GR42', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2025-11-13'],
            ['id' => 87, 'nombre' => 'Brenda Isabel Martínez Montelongo', 'serie' => 'PF59GTEJ', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2025-11-14'],
            ['id' => 88, 'nombre' => 'Sonia Fragoso Romero', 'serie' => 'PF59GTES', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2025-11-18'],
            ['id' => 95, 'nombre' => 'David Velázquez Trejo', 'serie' => 'PF59GTDA', 'celular' => '356427674527895 (APPLE IPHONE 12 BLACK 64 GB)', 'evaluador' => 'José Martín Tadeo Catalán', 'fecha' => '2025-12-15'],
            ['id' => 96, 'nombre' => 'Alejandra Carrera Filio', 'serie' => 'PF59GTFR', 'celular' => '354244474672199 (APPLE IPHONE 12 BLACK 64 GB)', 'evaluador' => 'José Martín Tadeo Catalán', 'fecha' => '2025-12-16'],
            ['id' => 97, 'nombre' => 'Sheyla Beatriz Payán Rubio', 'serie' => 'PF5JNT59', 'celular' => null, 'evaluador' => 'José Martín Tadeo Catalán', 'fecha' => '2025-12-17'],
            ['id' => 98, 'nombre' => 'Miguel Ángel Mora Cruz', 'serie' => 'PF58RAE0', 'celular' => null, 'evaluador' => 'José Martín Tadeo Catalán', 'fecha' => '2025-12-18'],
            ['id' => 99, 'nombre' => 'Annery Viridiana Aguilar Herrera', 'serie' => 'PF59GR76', 'celular' => null, 'evaluador' => 'José Martín Tadeo Catalán', 'fecha' => '2025-12-19'],
            ['id' => 101, 'nombre' => 'David Velázquez Trejo', 'serie' => 'PF59GTDA', 'celular' => '356427674527895 (APPLE IPHONE 12 BLACK 64 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-01-19'],
            ['id' => 102, 'nombre' => 'Alejandra Carrera Filio', 'serie' => 'PF59GTFR', 'celular' => '354244474672199 (APPLE IPHONE 12 BLACK 64 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-01-20'],
            ['id' => 103, 'nombre' => 'Sheyla Beatriz Payán Rubio', 'serie' => 'PF5JNT59', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-01-21'],
            ['id' => 104, 'nombre' => 'Miguel Ángel Mora Cruz', 'serie' => 'PF58RAE0', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-01-22'],
            ['id' => 105, 'nombre' => 'Efraín Monroy Ayala', 'serie' => 'PF59GR3M', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-01-23'],
            ['id' => 115, 'nombre' => 'Fabiola Mendoza Silva', 'serie' => 'PF58RC2L', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-02-16'],
            ['id' => 116, 'nombre' => 'Julio Edgar Ávila García', 'serie' => 'PF578JXP', 'celular' => '351168084354687 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-02-17'],
            ['id' => 117, 'nombre' => 'Luis Fernando Sampedro Cruz', 'serie' => 'PF5765AV', 'celular' => '351168084182708 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-02-18'],
            ['id' => 122, 'nombre' => 'Ricardo Melo Guzmán', 'serie' => 'PF58R7WY', 'celular' => '351168084459700 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-02-19'],
            ['id' => 123, 'nombre' => 'Alberto Alanís Flores', 'serie' => 'PF577PTB', 'celular' => '351168084547744 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-02-20'],
            ['id' => 126, 'nombre' => 'Agustín Martínez Paredes', 'serie' => 'PF577S1P', 'celular' => '351168084597145 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-03-02'],
            ['id' => 127, 'nombre' => 'Oscar Trujillo Moreno', 'serie' => 'PF577AAF', 'celular' => '351168084594472 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-03-03'],
            ['id' => 128, 'nombre' => 'Rubén David Martínez Chávez', 'serie' => 'PF578C4T', 'celular' => '351168084534007 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-03-04'],
            ['id' => 129, 'nombre' => 'Salvador Sánchez Ruíz', 'serie' => 'PF5JB9EW', 'celular' => '351168084957836 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-03-05'],
            ['id' => 130, 'nombre' => 'Noel Arif Ruíz Machucho', 'serie' => 'PF5JB9XG', 'celular' => '351168084255512 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-03-06'],
            ['id' => 134, 'nombre' => 'José Martín Tadeo Catalán', 'serie' => 'PF577HC8', 'celular' => '359488353648862 (Motorola Moto G05)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-04-13'],
            ['id' => 135, 'nombre' => 'Jesús Alejandro Marrón Legorreta', 'serie' => 'PF577MVP', 'celular' => '352994539104123 (APPLE IPHONE 14 PRO MAX 128)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-04-14'],
            ['id' => 136, 'nombre' => 'Jorge Luis Guzmán Mora', 'serie' => 'PF577HCX', 'celular' => '357654174357304 (APPLE IPHONE 13)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-04-16'],
            ['id' => 137, 'nombre' => 'Miguel Villanueva Oropeza', 'serie' => 'PF5796FD', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-04-16'],
            ['id' => 143, 'nombre' => 'Angelina Susana Figueroa Mondragón', 'serie' => 'PF59GTG9', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-05-11'],
            ['id' => 144, 'nombre' => 'Juan Carlos Vázquez Mera', 'serie' => 'PF59GTGF', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-05-12'],
            ['id' => 146, 'nombre' => 'Abraham Israel Cabrera Martínez', 'serie' => 'PF59QHRW', 'celular' => '351168084715366 (APPLE IPHONE 14)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-05-14'],
            ['id' => 147, 'nombre' => 'Nelly Michelle Esteva Solorio', 'serie' => 'PF59ZYRE', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-05-14'],
            ['id' => 148, 'nombre' => 'Daniel Rodríguez Bistraín', 'serie' => 'PF58R7XG', 'celular' => '354244476999004 (APPLE IPHONE 12 BLACK 64 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-05-18'],
            ['id' => 150, 'nombre' => 'Jesús Malagon', 'serie' => 'PF58RCS5', 'celular' => '350640547431774 (APPLE IPHONE 12 BLACK 64 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-06-08'],
            ['id' => 152, 'nombre' => 'Ricardo Edmundo Medina Colín', 'serie' => 'PF591FDS', 'celular' => '353303309915198 (APPLE iPhone 16 Plus)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-06-16'],
            ['id' => 153, 'nombre' => 'Patricia Viviana Ramírez Ocaña', 'serie' => 'PF56SG5A', 'celular' => '354244476694019 (APPLE IPHONE 12 BLACK 64 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-06-17'],
            ['id' => 154, 'nombre' => 'Kazuki Minai', 'serie' => 'PF591FE3', 'celular' => '354257903416574 (APPLE iPhone 16)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-06-18'],
            ['id' => 155, 'nombre' => 'Maria Fernanda González García', 'serie' => 'PF59GR49', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-06-19'],
            ['id' => 157, 'nombre' => 'Andrés Rivera Laguna', 'serie' => 'PF577MLJ', 'celular' => '351168084972363 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-09-04'],
            ['id' => 158, 'nombre' => 'Jazmín Monserrat Fernández Rojas', 'serie' => 'PF59GWMA', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-09-04'],
            ['id' => 159, 'nombre' => 'Daniel Vargas Molina', 'serie' => 'PF577S2R', 'celular' => '351168084796093 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-09-04'],
            ['id' => 160, 'nombre' => 'Julio César Mendoza Rodriguez', 'serie' => 'PF59GWNM', 'celular' => '356427674620468 (APPLE IPHONE 12 BLACK 64 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-09-04'],
            ['id' => 161, 'nombre' => 'José Miguel Flores Castillo', 'serie' => 'PF5JBBZH', 'celular' => '351168084600006 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-09-04'],
            ['id' => 162, 'nombre' => 'Beatriz Adriana Cerda Bárcenas', 'serie' => 'PF59J7S8', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-09-04'],
            ['id' => 163, 'nombre' => 'Lizeth Sánchez Luna', 'serie' => 'PF59GR7F', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-07-01'],
            ['id' => 164, 'nombre' => 'Emilio Raúl Ramírez González', 'serie' => 'PF577MKV', 'celular' => '351168084215805 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-07-02'],
            ['id' => 165, 'nombre' => 'Karen Itzel Martínez Chávez', 'serie' => 'PF5JNW4N', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-07-03'],
            ['id' => 166, 'nombre' => 'Edith Ibarra Dionicio', 'serie' => 'PF59GNYY', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-07-06'],
            ['id' => 167, 'nombre' => 'Edwin Alejandro Rodríguez Leal', 'serie' => 'PF57632T', 'celular' => '351168084713023 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-07-07'],
            ['id' => 168, 'nombre' => 'Takahiro Arakawa', 'serie' => 'PF5LWNK6', 'celular' => '353524887045161 (IPHONE 15), 352176456736091 (IPHONE 17 PRO)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-09-04'],
            ['id' => 169, 'nombre' => 'Brenda Esmeralda Guzmán Tepectzin', 'serie' => 'PF59J7V0', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-09-04'],
            ['id' => 170, 'nombre' => 'Edwin Alejandro Romero Reyes', 'serie' => 'PF59J7SZ', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-09-04'],
            ['id' => 171, 'nombre' => 'Luz Amayrani Sánchez Hernández', 'serie' => 'PF59XXX7', 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-09-04'],
            ['id' => 173, 'nombre' => 'Axel Alejandro Montes Soto', 'serie' => 'PF59GWMH', 'celular' => '860972062384457 (Honor X8a)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-10-19'],
            ['id' => 174, 'nombre' => 'Daniel Espericueta Casas', 'serie' => null, 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-10-19'],
            ['id' => 175, 'nombre' => 'Pablo Jhoel Arredondo Rodríguez', 'serie' => null, 'celular' => null, 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-10-19'],
            ['id' => 176, 'nombre' => 'Carlos Alberto Banda Villar', 'serie' => 'PF5753WM', 'celular' => '351168084261817 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-10-19'],
            ['id' => 177, 'nombre' => 'Luis Ángel Oregón Martínez', 'serie' => 'PF5736XJ', 'celular' => '351168084858083 (APPLE IPHONE 14 128 GB)', 'evaluador' => 'Miguel Villanueva Oropeza', 'fecha' => '2026-10-19'],
        ];

        $serieCol = Schema::hasColumn('dispositivos', 'numero_serie') ? 'numero_serie' : 'serie';

        foreach ($mantenimientos as $item) {
            $colaboradorId = null;
            $dispositivoId = null;

            // 1. Resolver colaborador por nombre
            if (class_exists(Colaborador::class) && Schema::hasTable('colaboradores')) {
                $nombreLimpio = trim(str_replace(['Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú'], ['A', 'E', 'I', 'O', 'U', 'a', 'e', 'i', 'o', 'u'], $item['nombre']));
                $primerNombre = explode(' ', $nombreLimpio)[0];

                $colab = Colaborador::where(function ($q) use ($item, $primerNombre) {
                    if (Schema::hasColumn('colaboradores', 'name')) {
                        $q->where('name', 'LIKE', "%{$primerNombre}%");
                    }
                    if (Schema::hasColumn('colaboradores', 'nombre')) {
                        $q->orWhere('nombre', 'LIKE', "%{$primerNombre}%");
                    }
                })->first();

                if ($colab) {
                    $colaboradorId = $colab->id;
                }
            }

            // 2. Resolver dispositivo (por serie o por dispositivo asignado al colaborador)
            if (Schema::hasTable('dispositivos')) {
                if (!empty($item['serie'])) {
                    $disp = DB::table('dispositivos')->where($serieCol, $item['serie'])->first();
                    if ($disp) {
                        $dispositivoId = $disp->id;
                    }
                }

                // Fallback si no tiene serie (ej. personal de almacén 174 y 175)
                if (!$dispositivoId && $colaboradorId && Schema::hasColumn('dispositivos', 'colaborador_id')) {
                    $disp = DB::table('dispositivos')->where('colaborador_id', $colaboradorId)->first();
                    if ($disp) {
                        $dispositivoId = $disp->id;
                    }
                }

                // Último fallback de seguridad para garantizar valor no nulo
                if (!$dispositivoId) {
                    $primerDisp = DB::table('dispositivos')->first();
                    $dispositivoId = $primerDisp?->id;
                }
            }

            if (!$dispositivoId) {
                continue;
            }

            $fechaMantenimiento = Carbon::parse($item['fecha']);
            $folio = 'CHK-MNT-' . $fechaMantenimiento->format('Y') . '-' . str_pad($item['id'], 4, '0', STR_PAD_LEFT);

            // Detalle de accesorios revisados
            $accesoriosTexto = 'Cargador original, cable de corriente y periféricos';
            if (!empty($item['celular'])) {
                $accesoriosTexto .= ' | Inspección móvil: ' . $item['celular'];
            }

            // 3. Crear o actualizar el Checklist de Mantenimiento
            ChecklistEquipo::updateOrCreate(
                [
                    'folio' => $folio,
                ],
                [
                    'dispositivo_id' => $dispositivoId,
                    'colaborador_id' => $colaboradorId,
                    'accion' => 'MANTENIMIENTO',
                    'fecha' => $fechaMantenimiento,
                    'accesorios' => $accesoriosTexto,
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
                    'observaciones' => 'Mantenimiento preventivo y correctivo periódico ejecutado conforme al programa SGSI.',
                    'nombre_usuario' => $item['nombre'],
                    'nombre_jefe_directo' => 'NA',
                    'nombre_sistemas' => $item['evaluador'],
                ]
            );
        }

        $this->command->info('¡Seeder completado! Los 64 registros de MANTENIMIENTO han sido sembrados con éxito.');
    }
}