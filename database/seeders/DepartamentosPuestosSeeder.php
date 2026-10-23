<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Puesto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DepartamentosPuestosSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Limpieza segura compatible con SQL Server
        Schema::disableForeignKeyConstraints();
        Departamento::query()->delete();
        Puesto::query()->delete();
        Schema::enableForeignKeyConstraints();

        // 2. Catálogo de Departamentos
        $departamentos = [
            ['codigo' => 'IT', 'nombre' => 'IT / Sistemas', 'descripcion' => 'Tecnologías de la Información y Sistemas'],
            ['codigo' => 'RH', 'nombre' => 'Recursos Humanos', 'descripcion' => 'Gestión de Talento y Recursos Humanos'],
            ['codigo' => 'MKT', 'nombre' => 'Mercadotecnia', 'descripcion' => 'Marketing y Publicidad'],
            ['codigo' => 'SCM', 'nombre' => 'Cadena de Suministro', 'descripcion' => 'Supply Chain Management'],
            ['codigo' => 'ALM', 'nombre' => 'Almacén', 'descripcion' => 'Operaciones y Gestión de Almacén'],
            ['codigo' => 'ADM', 'nombre' => 'Administración', 'descripcion' => 'Administración General'],
            ['codigo' => 'FIN', 'nombre' => 'Finanzas', 'descripcion' => 'Gestión Financiera y Tesorería'],
            ['codigo' => 'IAM', 'nombre' => 'Ventas', 'descripcion' => 'Ventas IAM / Aftermarket'],
            ['codigo' => 'CONT', 'nombre' => 'Contabilidad', 'descripcion' => 'Contabilidad y Fiscal'],
            ['codigo' => 'OEM', 'nombre' => 'OEM', 'descripcion' => 'Ventas de Equipo Original'],
            ['codigo' => 'MKS', 'nombre' => 'Mercadotecnia Servicio', 'descripcion' => 'Soporte Técnico y Servicio Postventa'],
            ['codigo' => 'BI', 'nombre' => 'Inteligencia de Negocios', 'descripcion' => 'Business Intelligence y Analítica'],
            ['codigo' => 'IAM_EXP', 'nombre' => 'Ventas Internacionales', 'descripcion' => 'Ventas de Exportación'],
            ['codigo' => 'PRES', 'nombre' => 'Presidencia', 'descripcion' => 'Dirección General y Presidencia'],
            ['codigo' => 'TRAF', 'nombre' => 'Tráfico', 'descripcion' => 'Logística y Tráfico de Mercancías'],
            ['codigo' => 'COMINT', 'nombre' => 'Compras Internacionales', 'descripcion' => 'Comercio Exterior y Compras Importación'],
        ];

        foreach ($departamentos as $depto) {
            Departamento::create($depto);
        }

        // 3. Catálogo de Puestos / Rangos
        $puestos = [
            ['codigo' => 'GM', 'nombre' => 'GENERAL MANAGER', 'descripcion' => 'Director o Gerente General'],
            ['codigo' => 'DGM', 'nombre' => 'DEPUTY GENERAL MANAGER', 'descripcion' => 'Subdirector o Subgerente General'],
            ['codigo' => 'MGR', 'nombre' => 'MANAGER', 'descripcion' => 'Gerente de Departamento'],
            ['codigo' => 'DMGR', 'nombre' => 'DEPUTY MANAGER', 'descripcion' => 'Subgerente de Departamento'],
            ['codigo' => 'SSUP', 'nombre' => 'SENIOR SUPERVISOR', 'descripcion' => 'Supervisor Senior'],
            ['codigo' => 'SUPA', 'nombre' => 'SUPERVISOR A', 'descripcion' => 'Supervisor Rango A'],
            ['codigo' => 'SUPB', 'nombre' => 'SUPERVISOR B', 'descripcion' => 'Supervisor Rango B'],
            ['codigo' => 'SUP', 'nombre' => 'SUPERVISOR', 'descripcion' => 'Supervisor General'],
            ['codigo' => 'SSTFA', 'nombre' => 'SENIOR STAFF A', 'descripcion' => 'Personal Especialista Senior A'],
            ['codigo' => 'SSTFB', 'nombre' => 'SENIOR STAFF B', 'descripcion' => 'Personal Especialista Senior B'],
            ['codigo' => 'SSTF', 'nombre' => 'SENIOR STAFF', 'descripcion' => 'Personal Especialista Senior'],
            ['codigo' => 'STFA', 'nombre' => 'STAFF A', 'descripcion' => 'Personal Operativo / Administrativo A'],
            ['codigo' => 'STFB', 'nombre' => 'STAFF B', 'descripcion' => 'Personal Operativo / Administrativo B'],
            ['codigo' => 'STFC', 'nombre' => 'STAFF C', 'descripcion' => 'Personal Operativo / Administrativo C'],
            ['codigo' => 'STF', 'nombre' => 'STAFF', 'descripcion' => 'Personal Operativo / Administrativo'],
        ];

        foreach ($puestos as $puesto) {
            Puesto::create($puesto);
        }
    }
}