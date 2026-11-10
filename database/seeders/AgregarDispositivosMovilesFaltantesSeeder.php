<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AgregarDispositivosMovilesFaltantesSeeder extends Seeder
{
    public function run(): void
    {
        $faltantes = [
            [
                'tipo' => 'ANDROID',
                'modelo_id' => 9, // HONOR X8A
                'serie' => '860972062389266',
                'imei' => '860972062389266',
                'imei2' => null,
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
                'location' => 'Almacén',
                'fecha' => '2025-07-30',
            ],
            [
                'tipo' => 'IPHONE',
                'modelo_id' => 11, // iPhone 14 128 GB
                'serie' => 'WP02LNYQYL',
                'imei' => '351168084547744',
                'imei2' => '351168084624675',
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
                'location' => 'Almacén',
                'fecha' => '2024-09-01',
            ],
            [
                'tipo' => 'IPHONE',
                'modelo_id' => 11, // iPhone 14 128 GB
                'serie' => 'WV4KY0R4XC',
                'imei' => '351168084273085',
                'imei2' => '351168084083765',
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
                'location' => 'Almacén',
                'fecha' => '2024-09-01',
            ],
            [
                'tipo' => 'IPHONE',
                'modelo_id' => 11, // iPhone 14 128 GB
                'serie' => 'CT7XLFT9DG',
                'imei' => '351168084898709',
                'imei2' => '351168084677673',
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
                'location' => 'Almacén',
                'fecha' => '2024-09-01',
            ],
            [
                'tipo' => 'IPHONE',
                'modelo_id' => 11, // iPhone 14 midnight 128GB
                'serie' => 'HWM0VJ24D6',
                'imei' => '359093339117881',
                'imei2' => null,
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
                'location' => 'Almacén',
                'fecha' => '2024-09-01',
            ],
            [
                'tipo' => 'IPHONE',
                'modelo_id' => 19, // iPad (10th Gen) Wi-Fi 256 GB
                'serie' => 'HK1FWWJ1G0',
                'imei' => null,
                'imei2' => null,
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
                'location' => 'Almacén',
                'fecha' => '2024-09-01',
            ],
            [
                'tipo' => 'IPHONE',
                'modelo_id' => 20, // iPad Pro 11" Gen 4
                'serie' => 'MHW93LZ',
                'imei' => null,
                'imei2' => null,
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
                'location' => 'Almacén',
                'fecha' => '2024-09-01',
            ],
        ];

        $colSerie = Schema::hasColumn('dispositivos', 'numero_serie') ? 'numero_serie' : 'serie';
        $colImei = Schema::hasColumn('dispositivos', 'imei') ? 'imei' : (Schema::hasColumn('dispositivos', 'imei1') ? 'imei1' : null);
        $colImei2 = Schema::hasColumn('dispositivos', 'imei2') ? 'imei2' : null;
        $colModelo = Schema::hasColumn('dispositivos', 'modelo_equipo_id') ? 'modelo_equipo_id' : (Schema::hasColumn('dispositivos', 'modelo_id') ? 'modelo_id' : null);

        foreach ($faltantes as $item) {
            $data = [
                $colSerie => $item['serie'],
                'estatus_asignacion' => $item['estatus'],
                'location' => $item['location'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if ($colModelo) {
                $data[$colModelo] = $item['modelo_id'];
            }
            if ($colImei && $item['imei']) {
                $data[$colImei] = $item['imei'];
            }
            if ($colImei2 && $item['imei2']) {
                $data[$colImei2] = $item['imei2'];
            }
            if (Schema::hasColumn('dispositivos', 'tipo')) {
                $data['tipo'] = $item['tipo'];
            }
            if (Schema::hasColumn('dispositivos', 'clasificacion')) {
                $data['clasificacion'] = $item['clasificacion'];
            }

            DB::table('dispositivos')->updateOrInsert(
                [$colSerie => $item['serie']],
                $data
            );
        }

        $this->command->info('¡Los 7 dispositivos móviles faltantes han sido dados de alta correctamente!');
    }
}