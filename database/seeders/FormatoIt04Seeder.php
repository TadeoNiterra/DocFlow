<?php

namespace Database\Seeders;

use App\Models\FmtIt04; // O FormatoIt04 según el nombre de tu modelo
use App\Models\FormatoIt04;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FormatoIt04Seeder extends Seeder
{
    /**
     * Generador de folios consecutivos por año.
     * Ejemplo: FMT-IT04-2024-001
     */
    private function generarFolio(string $fecha, int $consecutivo): string
    {
        $year = Carbon::parse($fecha)->format('Y');
        $pad = str_pad($consecutivo, 3, '0', STR_PAD_LEFT);
        
        return "FMT-IT04-{$year}-{$pad}";
    }

    public function run(): void
    {
        // 1. Obtener o crear el usuario base para 'user_id_creador'
        $creador = User::where('email', 'jesus.marron@niterragroup.com')->first() 
            ?? User::first() 
            ?? User::create([
                'name'     => 'Administrador TI',
                'email'    => 'admin.it@niterragroup.com',
                'password' => bcrypt('password123'),
            ]);

        $nombreGerenteFijo = 'Jesús Alejandro Marron Legorreta';

        // Rutas para resguardo de archivos en storage/app/private
        $sourceDirectory = storage_path('app/archivos_origen/f-it-04');
        $targetFolder = 'documentos-docflow/f-it-04';

        // 2. Información real extraída directamente de los 11 formatos PDF
        $registrosHistoricos = [
            // Folio 1 (02/01/2024)
            [
                'archivo_pdf'       => 'Folio1.pdf',
                'fecha_eliminacion' => '2024-01-02',
                'nombre_puesto'     => 'Ventas',
                'nombre_maquina'    => 'Iphone',
                'num_serie'         => 'N/A - Folio 1',
                'carpeta_respaldo'  => 'CUENTA ICLOUD COMPLETA',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Celular',
                'tratamiento'       => 'Total',
            ],
            // Folio 2 - Hoja 1 (08/01/2024)
            [
                'archivo_pdf'       => 'Folio2.pdf',
                'fecha_eliminacion' => '2024-01-08',
                'nombre_puesto'     => 'Administración',
                'nombre_maquina'    => 'DMZ',
                'num_serie'         => '9LS9J02',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'CPU',
                'tratamiento'       => 'Total',
            ],
            // Folio 2 - Hoja 2 (08/01/2024)
            [
                'archivo_pdf'       => 'Folio2.pdf',
                'fecha_eliminacion' => '2024-01-08',
                'nombre_puesto'     => 'Ventas',
                'nombre_maquina'    => 'Iphones',
                'num_serie'         => '354836092570372 / 358633094180409',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Celular',
                'tratamiento'       => 'Total',
            ],
            // Folio 3 (20/03/2024)
            [
                'archivo_pdf'       => 'Folio 3.pdf',
                'fecha_eliminacion' => '2024-03-20',
                'nombre_puesto'     => 'Ventas',
                'nombre_maquina'    => 'Iphone',
                'num_serie'         => '358633094213242',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Celular',
                'tratamiento'       => 'Total',
            ],
            // Folio 4 (22/03/2022)
            [
                'archivo_pdf'       => 'Folio 4.pdf',
                'fecha_eliminacion' => '2022-03-22',
                'nombre_puesto'     => 'Ventas',
                'nombre_maquina'    => 'HUAWEI',
                'num_serie'         => 'N/A - Folio 4',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Celular',
                'tratamiento'       => 'Total',
            ],
            // Folio 5 (25/06/2024)
            [
                'archivo_pdf'       => 'Folio 5.pdf',
                'fecha_eliminacion' => '2024-06-25',
                'nombre_puesto'     => 'Chofer ejecutivo',
                'nombre_maquina'    => 'Iphone Rodrigo',
                'num_serie'         => '358633094078637',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Celular',
                'tratamiento'       => 'Total',
            ],
            // Folio 6 - Hoja 1 (23/07/2024)
            [
                'archivo_pdf'       => 'Folio 6.pdf',
                'fecha_eliminacion' => '2024-07-23',
                'nombre_puesto'     => 'Audio Ambiental',
                'nombre_maquina'    => 'Bocinas de audio ambiental',
                'num_serie'         => 'N/A - Folio 6 Bocinas',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Audio ambiental',
                'tratamiento'       => 'Total',
            ],
            // Folio 6 - Hoja 2 (23/07/2024)
            [
                'archivo_pdf'       => 'Folio 6.pdf',
                'fecha_eliminacion' => '2024-07-23',
                'nombre_puesto'     => 'Audio Ambiental',
                'nombre_maquina'    => 'Amplificador audio',
                'num_serie'         => 'N/A - Folio 6 Amplificador',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Audio ambiental',
                'tratamiento'       => 'Total',
            ],
            // Folio 6 - Hoja 3 (23/07/2024)
            [
                'archivo_pdf'       => 'Folio 6.pdf',
                'fecha_eliminacion' => '2024-07-23',
                'nombre_puesto'     => 'Audio Ambiental',
                'nombre_maquina'    => 'Lap musica (LAPOBS01)',
                'num_serie'         => 'PC-HZ550GAC',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Laptop completa',
                'tratamiento'       => 'Total',
            ],
            // Folio 7 - Hoja 1 (11/10/2024)
            [
                'archivo_pdf'       => 'Folio 7.pdf',
                'fecha_eliminacion' => '2024-10-11',
                'nombre_puesto'     => 'N/A',
                'nombre_maquina'    => 'Iphone (4 unidades)',
                'num_serie'         => '358633094051642, 358633094256167, 358633094236235, 358633094088255',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Celular',
                'tratamiento'       => 'Total',
            ],
            // Folio 7 - Hoja 2 (11/10/2024)
            [
                'archivo_pdf'       => 'Folio 7.pdf',
                'fecha_eliminacion' => '2024-10-11',
                'nombre_puesto'     => 'Infraestructura',
                'nombre_maquina'    => 'switch plano',
                'num_serie'         => 'N/A - Folio 7 Switch',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Switch',
                'tratamiento'       => 'Total',
            ],
            // Folio 8 (14/01/2025)
            [
                'archivo_pdf'       => 'Folio 8.pdf',
                'fecha_eliminacion' => '2025-01-14',
                'nombre_puesto'     => 'N/A',
                'nombre_maquina'    => 'Iphone',
                'num_serie'         => '352893116527252 / 354244476551367',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Celular',
                'tratamiento'       => 'Total',
            ],
            // Folio 9 (25/07/2025)
            [
                'archivo_pdf'       => 'Folio 9.pdf',
                'fecha_eliminacion' => '2025-07-25',
                'nombre_puesto'     => 'Administracion',
                'nombre_maquina'    => 'Iphone e_patino / Iphone general',
                'num_serie'         => '350640547394451',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Celular',
                'tratamiento'       => 'Total',
            ],
            // Folio 10 (Folio faltante - registro placeholder)
            [
                'archivo_pdf'       => 'Folio 10.pdf',
                'fecha_eliminacion' => '2025-10-01',
                'nombre_puesto'     => 'TI / Operaciones',
                'nombre_maquina'    => 'Equipo de Baja',
                'num_serie'         => 'N/A - Folio 10',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Laptop',
                'tratamiento'       => 'Total',
            ],
            // Folio 11 (26/06/2026)
            [
                'archivo_pdf'       => 'Folio 11.pdf',
                'fecha_eliminacion' => '2026-06-26',
                'nombre_puesto'     => 'Asistente Presidencia - Admin',
                'nombre_maquina'    => 'Iphone',
                'num_serie'         => '354244476866955, 35789492386373',
                'carpeta_respaldo'  => 'Ninguna',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Celular',
                'tratamiento'       => 'Total',
            ],
        ];

        // 3. Ordenar cronológicamente para que los consecutivos por año se numeren en orden
        usort($registrosHistoricos, function ($a, $b) {
            return strcmp($a['fecha_eliminacion'], $b['fecha_eliminacion']);
        });

        // 4. Inserción con generación de folios consecutivos
        $consecutivoPorAnio = [];

        foreach ($registrosHistoricos as $registro) {
            $year = Carbon::parse($registro['fecha_eliminacion'])->format('Y');

            if (!isset($consecutivoPorAnio[$year])) {
                $consecutivoPorAnio[$year] = 1;
            } else {
                $consecutivoPorAnio[$year]++;
            }

            $folioGenerado = $this->generarFolio($registro['fecha_eliminacion'], $consecutivoPorAnio[$year]);

            // Copia física del PDF al resguardo privado si el archivo existe en la carpeta origen
            $archivoOrigen = "{$sourceDirectory}/{$registro['archivo_pdf']}";
            $rutaPrivada = null;

            if (File::exists($archivoOrigen)) {
                $nombreArchivoLimpio = strtolower(str_replace(['-', ' '], '_', $folioGenerado)) . '.pdf';
                $rutaPrivada = "{$targetFolder}/{$nombreArchivoLimpio}";

                Storage::disk('local')->put(
                    $rutaPrivada,
                    File::get($archivoOrigen)
                );
            }

            // Separamos la llave temporal archivo_pdf del array antes de persistir
            unset($registro['archivo_pdf']);

            // Mapeo contra la tabla fmt_it_04
            // (Si tu modelo se llama FormatoIt04 en lugar de FmtIt04, puedes dejarlo como FormatoIt04::updateOrCreate)
            FormatoIt04::updateOrCreate(
                ['num_serie' => $registro['num_serie']], // Evita duplicar registros si se vuelve a correr
                array_merge($registro, [
                    'folio'            => $folioGenerado,
                    'carpeta_respaldo' => $rutaPrivada,     // Ruta en storage/app/private para el visor
                    'nombre_gerente'   => $nombreGerenteFijo,
                    'user_id_creador'  => $creador->id,
                ])
            );
        }

        $this->command->info('¡Registros y folios anuales de F-IT-04 sembrados con éxito!');
    }
}