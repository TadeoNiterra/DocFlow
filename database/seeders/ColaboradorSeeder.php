<?php

namespace Database\Seeders;

use App\Models\Colaborador;
use App\Models\Departamento;
use App\Models\Puesto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ColaboradorSeeder extends Seeder
{
    /**
     * Función auxiliar para limpiar tildes y caracteres especiales.
     */
    private function limpiarTexto(string $texto): string
    {
        $texto = Str::lower(trim($texto));
        $mapaAcentos = [
            'á' => 'a',
            'é' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ú' => 'u',
            'ñ' => 'n',
            'Á' => 'a',
            'É' => 'e',
            'Í' => 'i',
            'Ó' => 'o',
            'Ú' => 'u',
            'Ñ' => 'n'
        ];
        return strtr($texto, $mapaAcentos);
    }

    public function run(): void
    {
        // 1. Limpieza inicial segura para SQL Server
        Schema::disableForeignKeyConstraints();
        Colaborador::query()->delete();
        Schema::enableForeignKeyConstraints();

        // 2. Mapas en memoria para relacionar llaves foráneas instantáneamente
        $mapaDeptosModelos = Departamento::all()->keyBy('codigo');
        $mapaPuestosModelos = Puesto::all()->keyBy('nombre');

        $mapeoDepartamentos = [
            'SCM' => 'SCM',
            'ALMACEN' => 'ALM',
            'ADMIN' => 'ADM',
            'IT' => 'IT',
            'VENTAS MERCADO INDEPENDIENTE' => 'IAM',
            'VENTAS OEM/OES' => 'OEM',
            'ESTRATEGIA DE PRODUCTO' => 'MKS',
            'FINANZAS' => 'FIN',
            'MARKETING PLANNING' => 'MKT',
            'BI' => 'BI',
            'ACCOUNTING' => 'CONT',
            'RECURSOS HUMANOS' => 'RH',
            'SALES AM EXPORT' => 'IAM_EXP',
            'FINANCE AND ACCOUNTING' => 'FIN',
            'TRAFICO' => 'TRAF',
            'TRAFIC' => 'TRAF',
        ];

        // 3. Lista completa de 80 colaboradores
        $rawColaboradores = [
            [14, "VELAZQUEZ RODRIGUEZ ALEJANDRA", "SCM", "MANAGER"],
            [16, "AZPEITIA GARCIA MARCO ANTONIO", "ALMACEN", "STAFF"],
            [17, "VEGA ISLAS JESUS FERNANDO", "ALMACEN", "STAFF"],
            [18, "PEREZ GARCIA TOBIAS", "ALMACEN", "STAFF"],
            [22, "MARTINEZ CARDENAS CLAUDIA OLIVIA", "ADMIN", "MANAGER"],
            [23, "GUZMAN MORA JORGE LUIS", "IT", "SUPERVISOR"],
            [24, "FRAGOSO ROMERO SONIA", "SCM", "SUPERVISOR"],
            [25, "ARRIAGA COLIN GABRIEL", "VENTAS MERCADO INDEPENDIENTE", "GENERAL MANAGER"],
            [35, "MARTINEZ PAREDES AGUSTIN", "VENTAS MERCADO INDEPENDIENTE", "STAFF"],
            [64, "MEDINA COLIN RICARDO EDMUNDO", "VENTAS OEM/OES", "DEPUTY GENERAL MANAGER"],
            [76, "MARRON LEGORRETA JESUS ALEJANDRO", "IT", "MANAGER"],
            [97, "RODRIGUEZ BISTRAIN DANIEL", "ESTRATEGIA DE PRODUCTO", "SUPERVISOR B"],
            [117, "MELO GUZMAN RICARDO", "VENTAS MERCADO INDEPENDIENTE", "SENIOR SUPERVISOR"],
            [126, "FIGUEROA MONDRAGON ANGELINA SUSANA", "ADMIN", "STAFF"],
            [130, "VELAZQUEZ TREJO DAVID", "TRAFICO", "DEPUTY MANAGER"],
            [138, "RAMIREZ GONZALEZ EMILIO RAUL", "VENTAS MERCADO INDEPENDIENTE", "STAFF"],
            [142, "SANCHEZ RUIZ SALVADOR", "VENTAS MERCADO INDEPENDIENTE", "STAFF"],
            [143, "PATIÑO CUAPIO JOSE ERNESTO", "ADMIN", "SENIOR STAFF"],
            [145, "CORONADO AYLETT AYLEEN", "SCM", "SENIOR SUPERVISOR"],
            [148, "MONROY AYALA EFRAIN", "FINANZAS", "SUPERVISOR A"],
            [152, "TRUJILLO MORENO OSCAR", "ESTRATEGIA DE PRODUCTO", "SUPERVISOR A"],
            [155, "GUTIERREZ ROSAS ILEANA BELEN", "SCM", "SENIOR STAFF"],
            [171, "RUIZ MACHUCHO NOEL ARIF", "VENTAS MERCADO INDEPENDIENTE", "STAFF"],
            [173, "ESTEVA SOLORIO NELLY MICHELLE", "ESTRATEGIA DE PRODUCTO", "SENIOR STAFF A"],
            [180, "SANCHEZ HERNANDEZ LUZ AMAYRANI", "MARKETING PLANNING", "STAFF A"],
            [191, "MORALES RODRIGUEZ JOSE FERNANDO", "ALMACEN", "STAFF"],
            [199, "AGUILAR HERRERA ANNERY VIRIDIANA", "TRAFICO", "SUPERVISOR"],
            [201, "PANIAGUA GUTIERREZ CESAR", "ALMACEN", "SUPERVISOR"],
            [205, "VAZQUEZ MERA JUAN CARLOS", "ESTRATEGIA DE PRODUCTO", "SENIOR STAFF B"],
            [212, "MALAGON SANCHEZ JESUS", "BI", "SUPERVISOR"],
            [215, "PAYAN RUBIO SHEYLA BEATRIZ", "ACCOUNTING", "SUPERVISOR B"],
            [217, "LOPEZ CONTRERAS JESSICA", "ADMIN", "SUPERVISOR"],
            [219, "CHIMAL GOVEA ALEJANDRO", "ALMACEN", "STAFF"],
            [224, "MENDEZ SERRANO MIGUEL ANGEL", "ALMACEN", "STAFF"],
            [225, "RAMIREZ OCAÑA PATRICIA VIVIANA", "VENTAS OEM/OES", "STAFF"],
            [227, "CABRERA MARTINEZ ABRAHAM ISRAEL", "MARKETING PLANNING", "SUPERVISOR B"],
            [228, "SANCHEZ ALVAREZ MONTSERRAT", "RECURSOS HUMANOS", "STAFF B"],
            [229, "TADEO CATALAN JOSE MARTIN", "IT", "STAFF A"],
            [230, "VILLANUEVA OROPEZA MIGUEL", "IT", "STAFF B"],
            [235, "AVILA GARCIA JULIO EDGAR", "VENTAS MERCADO INDEPENDIENTE", "SUPERVISOR"],
            [237, "MARTINEZ MONTELONGO BRENDA ISABEL", "SCM", "STAFF"],
            [240, "MENDOZA RODRIGUEZ JULIO CESAR", "VENTAS OEM/OES", "SUPERVISOR"],
            [242, "GONZALEZ GARCIA MARIA FERNANDA", "SCM", "STAFF"],
            [244, "RIVERA LAGUNA ANDRES", "VENTAS MERCADO INDEPENDIENTE", "STAFF"],
            [245, "FERNANDEZ ROJAS JAZMIN MONSERRAT", "ESTRATEGIA DE PRODUCTO", "STAFF A"],
            [246, "CARRERA FILIO ALEJANDRA", "SCM", "STAFF"],
            [251, "VARGAS MOLINA DANIEL", "VENTAS MERCADO INDEPENDIENTE", "SUPERVISOR"],
            [252, "MARTINEZ CHAVEZ RUBEN DAVID", "VENTAS MERCADO INDEPENDIENTE", "STAFF"],
            [255, "CERDA BARCENAS BEATRIZ ADRIANA", "ADMIN", "STAFF"],
            [257, "FLORES CASTILLO JOSE MIGUEL", "VENTAS MERCADO INDEPENDIENTE", "STAFF"],
            [259, "SANCHEZ LUNA LIZETH", "TRAFICO", "STAFF"],
            [260, "SAMPEDRO CRUZ LUIS FERNANDO", "SALES AM EXPORT", "STAFF"],
            [262, "MENDOZA SILVA FABIOLA", "ACCOUNTING", "MANAGER"],
            [263, "MARTINEZ CHAVEZ KAREN ITZEL", "ACCOUNTING", "STAFF"],
            [264, "VILLEGAS ROMERO CARLOS MISSAEL", "ALMACEN", "STAFF"],
            [268, "BARRIENTOS HERNANDEZ JESUS EDUARDO", "ALMACEN", "STAFF"],
            [269, "GONZALEZ JUAREZ MARCO ANTONIO", "ALMACEN", "STAFF"],
            [272, "IBARRA DIONICIO EDITH", "ACCOUNTING", "SUPERVISOR A"],
            [273, "RODRIGUEZ LEAL EDWIN ALEJANDRO", "SALES AM EXPORT", "SUPERVISOR"],
            [277, "GUZMAN TEPECTZIN BRENDA ESMERALDA", "FINANZAS", "STAFF"],
            [278, "ROMERO REYES EDWIN ALEJANDRO", "FINANZAS", "STAFF"],
            [281, "ESPERICUETA CASAS DANIEL", "ALMACEN", "STAFF"],
            [282, "ARREDONDO RODRIGUEZ PABLO JHOEL", "ALMACEN", "STAFF"],
            [283, "MONTES SOTO AXEL ALEJANDRO", "ESTRATEGIA DE PRODUCTO", "STAFF B"],
            [285, "BANDA VILLAR CARLOS ALBERTO", "SALES AM EXPORT", "STAFF"],
            [286, "OREGON MARTINEZ LUIS ANGEL", "VENTAS MERCADO INDEPENDIENTE", "STAFF"],
            [287, "HORCASITAS HERNANDEZ MARIO ALBERTO", "VENTAS MERCADO INDEPENDIENTE", "MANAGER"],
            [288, "UGALDE GALINDO MAURICIO", "ESTRATEGIA DE PRODUCTO", "STAFF C"],
            [289, "HERNANDEZ MARTINEZ ALEJANDRA", "ACCOUNTING", "STAFF"],
            [290, "VALDEZ FRANCO JOSE ALEJANDRO", "FINANZAS", "SUPERVISOR B"],
            [291, "CORONA SALDAÑA ANGEL ARTURO", "ALMACEN", "SENIOR STAFF"],
            [294, "VILLANUEVA SANCHEZ ANA ROSA", "RECURSOS HUMANOS", "MANAGER"],
            [295, "GARCIA SOTO LEONARDO DANIEL", "MARKETING PLANNING", "SUPERVISOR A"],
            [297, "ISAC YAIR RINCON FERNANDEZ", "ALMACEN", "STAFF"],
            [296, "MARIA GUADALUPE SANTOS ESCORCIA", "MARKETING PLANNING", "STAFF B"],
            [298, "TATIANA MARIBEL SANCHEZ JIMENEZ", "SCM", "STAFF"],
            [299, "RAMOS CORTES JAVIER", "ALMACEN", "STAFF"],
            [300, "CHAVEZ MORALES OMAR JORGE", "FINANZAS", "MANAGER"],
            [301, "CHAVEZ MORALES FRANCISCO JAVIER", "VENTAS MERCADO INDEPENDIENTE", "SUPERVISOR"],
            [302, "ALEGRIA UGALDE MARCO ANTONIO", "FINANCE AND ACCOUNTING", "SENIOR SUPERVISOR"]
        ];

        $consecutivosDeptos = [];
        $adGeneratedList = [];

        foreach ($rawColaboradores as $data) {
            $numInterno = $data[0];
            $nombreCompleto = $data[1];
            $deptoOriginal = $data[2];
            $rangoPuesto = $data[3];

            $deptKey = $mapeoDepartamentos[$deptoOriginal] ?? 'ADM';

            // Resolución de Llaves Foráneas
            $departamentoId = $mapaDeptosModelos->get($deptKey)?->id;
            $puestoId = $mapaPuestosModelos->get($rangoPuesto)?->id;

            // Consecutivo por departamento para el identificador único
            if (!isset($consecutivosDeptos[$deptKey])) {
                $consecutivosDeptos[$deptKey] = 1;
            } else {
                $consecutivosDeptos[$deptKey]++;
            }
            $idColaborador = $deptKey . $consecutivosDeptos[$deptKey];

            // Formateo de nombres y apellidos
            $partes = explode(' ', $nombreCompleto);
            $totalPalabras = count($partes);

            if ($totalPalabras >= 4) {
                $pNombre = $this->limpiarTexto($partes[2]);
                $sApellido = $this->limpiarTexto($partes[1]);
                $pApellido = $this->limpiarTexto($partes[0]);
                $nombreStr = mb_convert_case("{$partes[2]} {$partes[3]}", MB_CASE_TITLE, "UTF-8");
                $apellidoStr = mb_convert_case("{$partes[0]} {$partes[1]}", MB_CASE_TITLE, "UTF-8");
            } elseif ($totalPalabras == 3) {
                $pNombre = $this->limpiarTexto($partes[2]);
                $sApellido = $this->limpiarTexto($partes[1]);
                $pApellido = $this->limpiarTexto($partes[0]);
                $nombreStr = mb_convert_case($partes[2], MB_CASE_TITLE, "UTF-8");
                $apellidoStr = mb_convert_case("{$partes[0]} {$partes[1]}", MB_CASE_TITLE, "UTF-8");
            } else {
                $pNombre = $this->limpiarTexto($partes[1] ?? $partes[0]);
                $sApellido = '';
                $pApellido = $this->limpiarTexto($partes[0]);
                $nombreStr = mb_convert_case($partes[1] ?? $partes[0], MB_CASE_TITLE, "UTF-8");
                $apellidoStr = mb_convert_case($partes[0], MB_CASE_TITLE, "UTF-8");
            }

            $email = "{$pNombre}.{$pApellido}@niterragroup.com";
            $idVpn = $email;

            // Generación de usuario para Active Directory
            $letraNombre = substr($pNombre, 0, 1);
            $baseAD = "{$letraNombre}_{$pApellido}";

            if (in_array($baseAD, $adGeneratedList)) {
                $letraSegundoApellido = !empty($sApellido) ? substr($sApellido, 0, 1) : 'x';
                $baseAD = "{$letraNombre}_{$pApellido}{$letraSegundoApellido}";
            }
            $adGeneratedList[] = $baseAD;

            // Inserción enlazada por Llaves Foráneas
            Colaborador::updateOrCreate(
                ['email' => $email],
                [
                    'id_colaborador' => $idColaborador,
                    'name' => $nombreStr,
                    'lastname' => $apellidoStr,
                    'departamento_id' => $departamentoId,
                    'puesto_id' => $puestoId,
                    'id_sap' => "SAP_" . strtoupper($baseAD),
                    'id_vpn' => $idVpn,
                    'id_cofidi' => "COF_" . strtoupper($baseAD),
                    'id_AD' => $baseAD,
                    'num_tarjeta' => "ACC-" . str_pad($numInterno, 4, '0', STR_PAD_LEFT),
                    'DDEX' => false,
                ]
            );
        }
    }
}