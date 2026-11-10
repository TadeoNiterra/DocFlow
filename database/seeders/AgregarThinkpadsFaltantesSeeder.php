<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AgregarThinkpadsFaltantesSeeder extends Seeder
{
    public function run(): void
    {
        $thinkpads = [
            [
                'serie' => 'PF572XR3',
                'modelo_id' => 2, // Thinkpad T16 Core Ultra 5
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
            ],
            [
                'serie' => 'PF577PTB',
                'modelo_id' => 3, // Thinkpad T14 Core Ultra 5
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
            ],
            [
                'serie' => 'PF5JBC2B',
                'modelo_id' => 3, // Thinkpad T14 Core Ultra 5
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
            ],
            [
                'serie' => 'PF59GWM4',
                'modelo_id' => 3, // Thinkpad T14 Core Ultra 5
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
            ],
            [
                'serie' => 'PF59GR6V',
                'modelo_id' => 3, // Thinkpad T14 Core Ultra 5
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
            ],
            [
                'serie' => 'PF572XVE',
                'modelo_id' => 4, // Thinkpad T14 Core Ultra 7 (DMZ Niterra)
                'clasificacion' => 'PRIVADO',
                'estatus' => 'EN STOCK',
            ],
            [
                'serie' => 'PF5732H3',
                'modelo_id' => 3, // Thinkpad T14 Core Ultra 5
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
            ],
            [
                'serie' => 'PF5JBARX',
                'modelo_id' => 3, // Thinkpad T14 Core Ultra 5
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
            ],
            [
                'serie' => 'PF5734PW',
                'modelo_id' => 3, // Thinkpad T14 Core Ultra 5
                'clasificacion' => 'CONFIDENCIAL',
                'estatus' => 'EN STOCK',
            ],
            [
                'serie' => 'PF5736ZK',
                'modelo_id' => 3, // Thinkpad T14 Core Ultra 5
                'clasificacion' => 'PUBLICO',
                'estatus' => 'EN STOCK',
            ],
            [
                'serie' => 'PF5751M8',
                'modelo_id' => 3, // Thinkpad T14 Core Ultra 5
                'clasificacion' => 'PUBLICO',
                'estatus' => 'EN STOCK',
            ],
        ];

        $columnaSerie = Schema::hasColumn('dispositivos', 'numero_serie') ? 'numero_serie' : 'serie';
        $columnaModelo = Schema::hasColumn('dispositivos', 'modelo_equipo_id') ? 'modelo_equipo_id' : (Schema::hasColumn('dispositivos', 'modelo_id') ? 'modelo_id' : null);

        foreach ($thinkpads as $item) {
            $data = [
                $columnaSerie => $item['serie'],
                'estatus_asignacion' => $item['estatus'],
                'location' => 'Almacén',
                'updated_at' => now(),
                'created_at' => now(),
            ];

            if ($columnaModelo) {
                $data[$columnaModelo] = $item['modelo_id'];
            }

            if (Schema::hasColumn('dispositivos', 'clasificacion')) {
                $data['clasificacion'] = $item['clasificacion'];
            }

            if (Schema::hasColumn('dispositivos', 'tipo')) {
                $data['tipo'] = 'LAPTOP';
            }

            DB::table('dispositivos')->updateOrInsert(
                [$columnaSerie => $item['serie']],
                $data
            );
        }

        $this->command->info('¡Los 11 equipos ThinkPad han sido insertados y asociados a su modelo correspondiente!');
    }
}