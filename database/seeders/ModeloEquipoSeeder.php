<?php

namespace Database\Seeders;

use App\Models\ModeloEquipo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ModeloEquipoSeeder extends Seeder
{
    public function run(): void
    {
        // Limpieza compatible con SQL Server utilizando delete()
        Schema::disableForeignKeyConstraints();
        ModeloEquipo::query()->delete();
        Schema::enableForeignKeyConstraints();

        // 2. Definición consolidada de plantillas únicas de ModeloEquipo
        $modelos = [
            // --- LAPTOPS / DESKTOPS ---
            [
                'tipo' => 'Laptop',
                'marca' => 'Lenovo',
                'modelo' => 'Thinkpad T16',
                'processor' => 'Core Ultra 7',
                'ram_memory' => '32 GB',
                'ssd' => '512 GB',
                'screen' => '15"',
                'type_laptop' => 'SPECIAL OFFICE',
            ],
            [
                'tipo' => 'Laptop',
                'marca' => 'Lenovo',
                'modelo' => 'Thinkpad T16',
                'processor' => 'Core Ultra 5',
                'ram_memory' => '16 GB',
                'ssd' => '512 GB',
                'screen' => '15"',
                'type_laptop' => 'OFFICE',
            ],
            [
                'tipo' => 'Laptop',
                'marca' => 'Lenovo',
                'modelo' => 'Thinkpad T14',
                'processor' => 'Core Ultra 5',
                'ram_memory' => '16 GB',
                'ssd' => '512 GB',
                'screen' => '14"',
                'type_laptop' => 'SALES',
            ],
            [
                'tipo' => 'Laptop',
                'marca' => 'Lenovo',
                'modelo' => 'Thinkpad T14',
                'processor' => 'Core Ultra 7',
                'ram_memory' => '32 GB',
                'ssd' => '512 GB',
                'screen' => '14"',
                'type_laptop' => 'SPECIAL SALES',
            ],
            [
                'tipo' => 'Laptop',
                'marca' => 'Lenovo',
                'modelo' => 'Thinkpad T14',
                'processor' => 'Core I7',
                'ram_memory' => '32 GB',
                'ssd' => '1 TB',
                'screen' => '14"',
                'type_laptop' => 'GERENCIA IT',
            ],
            [
                'tipo' => 'Desktop',
                'marca' => 'Lenovo',
                'modelo' => 'Thinkcentre m70q',
                'processor' => 'Core I5',
                'ram_memory' => '16 GB',
                'ssd' => '512 GB',
                'screen' => null,
                'type_laptop' => 'DESKTOP',
            ],

            // --- MONITORES ---
            [
                'tipo' => 'Monitor',
                'marca' => 'Samsung',
                'modelo' => 'Monitor LED Samsung',
                'processor' => null,
                'ram_memory' => null,
                'ssd' => null,
                'screen' => '24"',
                'type_laptop' => null,
            ],
            [
                'tipo' => 'Monitor',
                'marca' => 'Lenovo',
                'modelo' => 'Monitor ThinkVision Lenovo',
                'processor' => null,
                'ram_memory' => null,
                'ssd' => null,
                'screen' => '24"',
                'type_laptop' => null,
            ],

            // --- ANDROIDS ---
            [
                'tipo' => 'Android',
                'marca' => 'HONOR',
                'modelo' => 'X8A',
                'processor' => null,
                'ram_memory' => null,
                'ssd' => '128 GB',
                'screen' => null,
                'type_laptop' => null,
            ],
            [
                'tipo' => 'Android',
                'marca' => 'MOTOROLA',
                'modelo' => 'MOTO G 5',
                'processor' => null,
                'ram_memory' => null,
                'ssd' => '64 GB',
                'screen' => null,
                'type_laptop' => null,
            ],

            // --- IPHONES / IPADS ---
            [
                'tipo' => 'iPhone',
                'marca' => 'Apple',
                'modelo' => 'iPhone 14 128 GB',
                'processor' => 'A15 Bionic',
                'ram_memory' => null,
                'ssd' => '128 GB',
                'screen' => '6.1"',
                'type_laptop' => null,
            ],
            [
                'tipo' => 'iPhone',
                'marca' => 'Apple',
                'modelo' => 'iPhone 12 Black 64 GB',
                'processor' => 'A14 Bionic',
                'ram_memory' => null,
                'ssd' => '64 GB',
                'screen' => '6.1"',
                'type_laptop' => null,
            ],
            [
                'tipo' => 'iPhone',
                'marca' => 'Apple',
                'modelo' => 'iPhone 14 Pro Max 128 GB',
                'processor' => 'A16 Bionic',
                'ram_memory' => null,
                'ssd' => '128 GB',
                'screen' => '6.7"',
                'type_laptop' => null,
            ],
            [
                'tipo' => 'iPhone',
                'marca' => 'Apple',
                'modelo' => 'iPhone 13 128 GB',
                'processor' => 'A15 Bionic',
                'ram_memory' => null,
                'ssd' => '128 GB',
                'screen' => '6.1"',
                'type_laptop' => null,
            ],
            [
                'tipo' => 'iPhone',
                'marca' => 'Apple',
                'modelo' => 'iPhone 15 Black 128 GB',
                'processor' => 'A16 Bionic',
                'ram_memory' => null,
                'ssd' => '128 GB',
                'screen' => '6.1"',
                'type_laptop' => null,
            ],
            [
                'tipo' => 'iPhone',
                'marca' => 'Apple',
                'modelo' => 'iPhone 16 Plus 128 GB',
                'processor' => 'A18',
                'ram_memory' => null,
                'ssd' => '128 GB',
                'screen' => '6.7"',
                'type_laptop' => null,
            ],
            [
                'tipo' => 'iPhone',
                'marca' => 'Apple',
                'modelo' => 'iPhone 16 Black 128 GB',
                'processor' => 'A18',
                'ram_memory' => null,
                'ssd' => '128 GB',
                'screen' => '6.1"',
                'type_laptop' => null,
            ],
            [
                'tipo' => 'iPhone',
                'marca' => 'Apple',
                'modelo' => 'iPhone 17 Pro Silver 256 GB',
                'processor' => 'A19 Pro',
                'ram_memory' => null,
                'ssd' => '256 GB',
                'screen' => '6.3"',
                'type_laptop' => null,
            ],
            [
                'tipo' => 'iPhone',
                'marca' => 'Apple',
                'modelo' => 'iPad (10th Gen) Wi-Fi 256 GB',
                'processor' => 'A14 Bionic',
                'ram_memory' => null,
                'ssd' => '256 GB',
                'screen' => '10.9"',
                'type_laptop' => null,
            ],
            [
                'tipo' => 'iPhone',
                'marca' => 'Apple',
                'modelo' => 'iPad Pro 11" Gen 4',
                'processor' => 'M2',
                'ram_memory' => null,
                'ssd' => '256 GB',
                'screen' => '11"',
                'type_laptop' => null,
            ],
        ];

        foreach ($modelos as $modelo) {
            ModeloEquipo::create($modelo);
        }
    }
}