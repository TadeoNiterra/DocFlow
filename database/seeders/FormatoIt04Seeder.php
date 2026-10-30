<?php

namespace Database\Seeders;

use App\Models\FormatoIt04;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

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
        $creador = User::first() ?? User::create([
            'name'     => 'Administrador TI',
            'email'    => 'admin.it@niterragroup.com',
            'password' => bcrypt('password123'),
        ]);

        $nombreGerenteFijo = 'Jesús Alejandro Marron Legorreta';

        // 2. Registros históricos con carpeta_respaldo vacía y gerente asignado
        $registrosHistoricos = [
            [
                'fecha_eliminacion' => '2024-03-20',
                'nombre_puesto'     => 'IT / Sistemas',
                'nombre_maquina'    => 'LAPTOP-DELL-01',
                'num_serie'         => '3X91KZ2',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Laptop Dell Latitude',
                'tratamiento'       => 'Reutilizable',
            ],
            [
                'fecha_eliminacion' => '2024-03-20',
                'nombre_puesto'     => 'Finanzas',
                'nombre_maquina'    => 'PC-HP-FIN02',
                'num_serie'         => 'MXL42109KP',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Desktop HP ProDesk',
                'tratamiento'       => 'Reutilizable',
            ],
            [
                'fecha_eliminacion' => '2024-03-20',
                'nombre_puesto'     => 'Almacén',
                'nombre_maquina'    => 'LAPTOP-LENOVO-ALM',
                'num_serie'         => 'PF2X90LL',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Laptop Lenovo ThinkPad',
                'tratamiento'       => 'Total',
            ],
            [
                'fecha_eliminacion' => '2024-03-22',
                'nombre_puesto'     => 'Cadena de Suministro',
                'nombre_maquina'    => 'LAPTOP-SCM-04',
                'num_serie'         => '5CD9120LLK',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Laptop HP EliteBook',
                'tratamiento'       => 'Reutilizable',
            ],
            [
                'fecha_eliminacion' => '2024-07-23',
                'nombre_puesto'     => 'Ventas',
                'nombre_maquina'    => 'DESKTOP-DELL-IAM',
                'num_serie'         => '8HJ9210',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Desktop Dell OptiPlex',
                'tratamiento'       => 'Reutilizable',
            ],
            [
                'fecha_eliminacion' => '2024-07-24',
                'nombre_puesto'     => 'Recursos Humanos',
                'nombre_maquina'    => 'LAPTOP-LENOVO-RH',
                'num_serie'         => 'MP10928X',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Laptop Lenovo ThinkPad',
                'tratamiento'       => 'Reutilizable',
            ],
            [
                'fecha_eliminacion' => '2024-10-11',
                'nombre_puesto'     => 'Contabilidad',
                'nombre_maquina'    => 'PC-CONT-01',
                'num_serie'         => 'CNU81902ZZ',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Desktop HP EliteDesk',
                'tratamiento'       => 'Total',
            ],
            [
                'fecha_eliminacion' => '2025-01-14',
                'nombre_puesto'     => 'Ventas OEM/OES',
                'nombre_maquina'    => 'LAPTOP-DELL-OEM',
                'num_serie'         => '4G820PP',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Laptop Dell Latitude',
                'tratamiento'       => 'Reutilizable',
            ],
            [
                'fecha_eliminacion' => '2025-07-25',
                'nombre_puesto'     => 'Mercadotecnia',
                'nombre_maquina'    => 'MACBOOK-PRO-MKT',
                'num_serie'         => 'C02F8910MD6R',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'MacBook Pro 14"',
                'tratamiento'       => 'Reutilizable',
            ],
            [
                'fecha_eliminacion' => '2025-09-30',
                'nombre_puesto'     => 'Administración',
                'nombre_maquina'    => 'LAPTOP-HP-ADM',
                'num_serie'         => '5CG01928ZZ',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Laptop HP ProBook',
                'tratamiento'       => 'Total',
            ],
            [
                'fecha_eliminacion' => '2026-06-26',
                'nombre_puesto'     => 'Presidencia',
                'nombre_maquina'    => 'LAPTOP-PRES-01',
                'num_serie'         => '7X00192MK',
                'tipo_dispositivo'  => 'Fisico',
                'dispositivo'       => 'Laptop Dell XPS 13',
                'tratamiento'       => 'Reutilizable',
            ],
        ];

        // 3. Inserción con generación de folios correlativos
        $consecutivoPorAnio = [];

        foreach ($registrosHistoricos as $registro) {
            $year = Carbon::parse($registro['fecha_eliminacion'])->format('Y');

            if (!isset($consecutivoPorAnio[$year])) {
                $consecutivoPorAnio[$year] = 1;
            } else {
                $consecutivoPorAnio[$year]++;
            }

            $folioGenerado = $this->generarFolio($registro['fecha_eliminacion'], $consecutivoPorAnio[$year]);

            FormatoIt04::updateOrCreate(
                ['num_serie' => $registro['num_serie']], // Evita duplicar registros si se vuelve a correr
                array_merge($registro, [
                    'folio'            => $folioGenerado,
                    'carpeta_respaldo' => null, // Queda vacío
                    'nombre_gerente'   => $nombreGerenteFijo, // Gerente unificado
                    'user_id_creador'  => $creador->id,
                ])
            );
        }
    }
}