<?php

namespace Database\Seeders;

use App\Models\Colaborador;
use App\Models\Dispositivo;
use App\Models\ModeloEquipo;
use Carbon\Traits\Date;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class DispositivoSeeder extends Seeder
{
    /**
     * Helper para limpiar y normalizar nombres al buscar colaboradores
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

    /**
     * Helper para convertir cadenas de fecha (ej. "01/07/2025") a formato SQL
     */
    private function parseFecha(?string $fecha): ?string
    {
        if (empty($fecha) || in_array(trim($fecha), ['-', 'N/A', 'NO APLICA', 'PENDIENTE', '´-'])) {
            return null;
        }

        try {
            // Maneja enteros de Excel como 45839
            if (is_numeric($fecha)) {
                return Carbon::instance(Date::excelToDateTimeObject($fecha))->format('Y-m-d');
            }
            return Carbon::createFromFormat('d/m/Y', trim($fecha))->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }

    public function run(): void
    {
        // 1. Limpieza segura compatible con SQL Server
        Schema::disableForeignKeyConstraints();
        Dispositivo::query()->delete();
        Schema::enableForeignKeyConstraints();

        // Carga de mapas en memoria para búsquedas eficientes (evita consultas N+1)
        $colaboradores = Colaborador::all();
        $modelos = ModeloEquipo::all();

        // --- 1. LISTA DE LAPTOPS & DESKTOPS ---
        $laptopsDesktops = [
            ["CONFIDENCIAL", "FABIOLA MENDOZA", "Lenovo", "Thinkpad T16", "PF58RC2L", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "lenovo", "VNABLTY3", "Primero", "01/07/2025", "09/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "MARCO ALEGRIA", "Lenovo", "Thinkpad T16", "PF5JRN1F", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", null, null, null, null, null, "ENTREGADO", 0],
            ["PRIVADO", "EDITH IBARRA DIONICIO", "Lenovo", "Thinkpad T16", "PF59GNYY", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9D:EC:11", "15\"", "Samsung", "801103T", "Primero", "01/07/2025", "09/07/2025", "ENTREGADO", 0],
            ["PRIVADO", "ALEJANDRA HERNANDEZ", "Lenovo", "Thinkpad T14", "PF5JRJ9M", "Core Ultra 5", "16 GB", "512 GB", "28:92:00:0A:34:DF", "14\"", null, null, "Primero", "01/07/2025", "15/07/2025", "ENTREGADO", 0],
            ["PRIVADO", "KAREN MARTINEZ", "Lenovo", "Thinkpad T16", "PF5JNW4N", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "samsung", "800792W", "Segundo (2025)", "01/12/2025", "01/12/2025", "ENTREGADO", 0],
            ["PRIVADO", "SHEYLA PAYAN", "Lenovo", "Thinkpad T16", "PF5JNT59", "Core Ultra 5", "16 GB", "256 GB", "", "15\"", "Samsung", "800803Z", "Segundo (2025)", "01/12/2025", "01/12/2025", "ENTREGADO", 0],
            ["PUBLICO", "ERNESTO PATIÑO", "Lenovo", "Thinkpad T16", "PF59GWQ4", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", null, null, "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "ANGELINA FIGUEROA", "Lenovo", "Thinkpad T16", "PF59GTG9", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9B:04:F6", "15\"", "Samsung", "800739Z", "Primero", "01/07/2025", "11/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "BEATRIZ ADRIANA CERDA BARCENAS", "Lenovo", "Thinkpad T16", "PF59J7S8", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:A0:2F:1C", "15\"", "Samsung", "800781E", "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "MONTSERRAT SANCHEZ", "Lenovo", "Thinkpad T16", "PF59GR7R", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "lenovo", "VNABHWC7", "Primero", "01/07/2025", "10/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "ANA VILLANUEVA", "Lenovo", "Thinkpad T16", "PF59GTCC", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9B:7A:30", "15\"", "lenovo", "VNABLTY1", "Primero", "01/07/2025", "10/07/2025", "ENTREGADO", 1],
            ["CONFIDENCIAL", "CLAUDIA MARTINEZ", "Lenovo", "Thinkpad T16", "PF59GWPR", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9D:8C:BC", "15\"", "lenovo", "VNABHWBL", "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 0],
            ["PRIVADO", "JESSICA LOPEZ", "Lenovo", "Thinkpad T16", "PF59J7S2", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800868K", "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 0],
            ["PRIVADO", "MARTIN TADEO", "Lenovo", "Thinkpad T14", "PF577HC8", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHWBW", "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "JESUS MARRON", "Lenovo", "Thinkpad T14", "PF577MVP", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHWBV", "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "JORGE GUZMAN", "Lenovo", "Thinkpad T14", "PF577HCX", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHWBT", "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 0],
            ["PRIVADO", "MIGUEL VILLANUEVA", "Lenovo", "Thinkpad T14", "PF5796FD", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHVVY", "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "GABRIEL ARRIAGA", "Lenovo", "Thinkpad T14", "PF577SCP", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHHWBX", "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "JESUS MALAGON", "Lenovo", "Thinkpad T16", "PF58RCS5", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "Samsung", "800736H", "Primero", "01/07/2025", "11/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "Carlos Alberto Banda Villar", "Lenovo", "Thinkpad T14", "PF5753WM", "Core Ultra 5", "16 GB", "512 GB", "68:C6:AC:53:8A:54", "14\"", null, null, "Primero", "01/07/2025", "15/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "EDWIN RODRIGUEZ", "Lenovo", "Thinkpad T14", "PF57632T", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", "LENOVO", "VNABHWBN", "Primero", "01/07/2025", "15/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "LUIS FERNANDO SAMPEDRO CRUZ", "Lenovo", "Thinkpad T14", "PF5765AV", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", null, null, "Primero", "01/07/2025", "15/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "MIGUEL ANGEL MORA", "Lenovo", "Thinkpad T16", "PF58RAE0", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "lenovo", "VNABLTY2", "Primero", "01/07/2025", null, "En Proceso de baja", 0],
            ["PRIVADO", "JOSE VALDEZ", "Lenovo", "Thinkpad T16", "PF5Q27D4", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "Samsung", "800759Y", "Primero", "01/07/2025", "09/07/2025", "ENTREGADO", 0],
            ["PRIVADO", "EFRAIN MONROY", "Lenovo", "Thinkpad T16", "PF59GR3M", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800777L", "Primero", "01/07/2025", "09/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "EDWIN ALEJANDRO ROMERO REYES", "DELL", "Latitude 3420", "B9XKMG3", "Core I5", "16 GB", "256 GB", "", "14\"", null, null, "Segundo (2022)", "01/02/2022", "10/02/2022", "ENTREGADO", 0],
            ["PUBLICO", "Edwin Romero", "Lenovo", "Thinkpad T16", "PF59J7SZ", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800738T", "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "Brenda Guzman", "Lenovo", "Thinkpad T16", "PF59J7V0", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9B:11:C6", "15\"", "Samsung", "800802T", "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 0],
            ["PRIVADO", "Omar Jorge Chávez Morales", "Lenovo", "Thinkpad T16", "PF58RCTL", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "Samsung", "800759Y", "Primero", "01/07/2025", "09/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "OSCAR TRUJILLO", "Lenovo", "Thinkpad T14", "PF577AAF", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", "Samsung", "0AC1HCNR800164M", "Primero", "01/07/2025", "15/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "EMILIO RAMIREZ", "Lenovo", "Thinkpad T14", "PF577MKV", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", null, null, "Primero", "01/07/2025", "15/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "ANDRES RIVERA LAGUNA", "Lenovo", "Thinkpad T14", "PF577MLJ", "Core Ultra 5", "16 GB", "512 GB", "68:C6:AC:53:56:33", "14\"", null, null, "Primero", "01/07/2025", "15/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "RICARDO MELO", "Lenovo", "Thinkpad T16", "PF58R7WY", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "Samsung", "800783W", "Primero", "01/07/2025", "15/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "AGUSTIN MARTINEZ", "Lenovo", "Thinkpad T14", "PF577S1P", "Core Ultra 5", "16 GB", "512 GB", "E0:8F:4C:86:12:E9", "14\"", null, null, "Primero", "01/07/2025", "15/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "DANIEL VARGAS", "Lenovo", "Thinkpad T14", "PF577S2R", "Core Ultra 5", "16 GB", "512 GB", "68:C6:AC:53:56:47", "14\"", null, null, "Primero", "01/07/2025", "15/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "RUBEN MARTINEZ", "Lenovo", "Thinkpad T14", "PF578C4T", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", null, null, "Primero", "01/07/2025", "15/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "Luis Ángel Oregón Martínez", "Lenovo", "Thinkpad T14", "PF5736XJ", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", null, null, "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "JULIO EDGAR AVILA GARCIA", "Lenovo", "Thinkpad T14", "PF578JXP", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", null, null, "Primero", "01/07/2025", "15/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "SALVADOR SÁNCHEZ", "Lenovo", "Thinkpad T14", "PF5JB9EW", "Core Ultra 5", "16 GB", "256 GB", "", "14\"", null, null, "Segundo (2025)", "01/12/2025", "01/12/2025", "ENTREGADO", 0],
            ["PUBLICO", "NOEL RUÍZ", "Lenovo", "Thinkpad T14", "PF5JB9XG", "Core Ultra 5", "16 GB", "256 GB", "", "14\"", null, null, "Segundo (2025)", "01/12/2025", "01/12/2025", "ENTREGADO", 0],
            ["PUBLICO", "José Miguel Flores Castillo", "Lenovo", "Thinkpad T14", "PF5JBBZH", "Core Ultra 5", "16 GB", "256 GB", "", "14\"", null, null, "Segundo (2025)", "01/12/2025", "01/12/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "MARIO HORCASITAS", "Lenovo", "Thinkpad T14", "PF5RAV7X", "Core I7", "32 GB", "1 TB", "", "14\"", "lenovo", "VNABHVW6", "Segundo (2025)", "01/12/2025", "01/12/2025", "ENTREGADO", 0],
            ["PRIVADO", "MARIA GUADALUPE SANTOS ESCORCIA", "Lenovo", "Thinkpad T16", "PF59GWQ9", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800132V", "Primero", "01/07/2025", "14/07/2025", "ENTREGADO", 1],
            ["PRIVADO", "LEONARDO GARCIA", "Lenovo", "Thinkpad T16", "PF59GR37", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800785Z", "Primero", "01/07/2025", "09/07/2025", "ENTREGADO", 1],
            ["CONFIDENCIAL", "RICARDO MEDINA COLIN", "Lenovo", "Thinkpad T14", "PF591FDS", "Core I7 Ultra", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHWA4", "Propiedad de Niterra", "10/02/2025", "10/02/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "PATRICIA RAMIREZ OCAÑA", "Lenovo", "Thinkpad T14", "PF56SG5A", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", "Samsung", "800628L", "Primero", "01/07/2025", "11/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "JULIO CESAR MENDOZA RODRIGUEZ", "Lenovo", "Thinkpad T16", "PF59GWNM", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800234J", "Primero", "01/07/2025", "11/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "LUZ SANCHEZ", "Lenovo", "Thinkpad T16", "PF59XXX7", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "Samsung", "800161P", "Primero", "01/07/2025", "11/07/2025", "ENTREGADO", 0],
            ["PRIVADO", "ABRAHAM CABRERA", "Lenovo", "Thinkpad T16", "PF59QHRW", "Core Ultra 7", "32 GB", "512 GB", "70:15:FB:1C:47:FB", "15\"", "lenovo", "VNABHWC6", "Primero", "01/07/2025", "11/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "KAZUKI MINAI", "Lenovo", "Thinkpad T14", "PF591FE3", "Core I7 Ultra", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHWC0", "Propiedad de Niterra", "10/02/2025", "10/02/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "TAKAHIRO ARAKAWA", "Lenovo", "Thinkpad T14", "PF5LWNK6", "Core I7 Ultra", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHWBD", "Propiedad de Niterra", "19/05/2025", "19/05/2025", "ENTREGADO", 0],
            ["PUBLICO", "AXEL ALEJANDRO MONTES SOTO", "Lenovo", "Thinkpad PC-115S8W", "pc-115s8w", "Core I7", "16 GB", "512 GB", "", "14\"", null, null, "Propiedad de Niterra", "10/01/2019", "17/07/2026", "ENTREGADO", 1],
            ["PUBLICO", "EMILIO RAMIREZ", "DELL", "Latitude 3400", "BXR9MW2", "Core I5", "8 GB", "256 GB", "", "14\"", null, null, "Segundo (2022)", "01/02/2022", "10/02/2022", "RETIRADO", 0],
            ["PRIVADO", "AYLEEN CORONADO", "Lenovo", "Thinkpad T16", "PF58R4ZT", "Core Ultra 7", "32 GB", "512 GB", "70:15:FB:1D:98:F9", "15\"", "Samsung", "800911V", "Primero", "01/07/2025", "09/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "ALEJANDRA VELAZQUEZ", "Lenovo", "Thinkpad T16", "PF59GR3W", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9B:2D:AF", "15\"", "lenovo", "VNABHWA3", "Primero", "01/07/2025", "09/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "Tatiana Maribel Sánchez Jiménez", "Lenovo", "Thinkpad T16", "PF59GR42", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800765K", "Primero", null, null, "ENTREGADO", 2],
            ["PUBLICO", "MARIA FERNANDA GONZALEZ GARCIA", "Lenovo", "Thinkpad T16", "PF59GR49", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800749H", "Primero", "01/07/2025", "09/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "ANNERY AGUILAR", "Lenovo", "Thinkpad T16", "PF59GR76", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9D:9C:20", "15\"", "Samsung", "800900Y", "Primero", "01/07/2025", "10/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "LIZETH SANCHEZ LUNA", "Lenovo", "Thinkpad T16", "PF59GR7F", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "801113E", "Primero", "01/07/2025", "10/07/2025", "ENTREGADO", 0],
            ["CONFIDENCIAL", "DAVID VELAZQUEZ", "Lenovo", "Thinkpad T16", "PF59GTDA", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9D:A6:11", "15\"", "lenovo", "VNABHWAA", "Primero", "01/07/2025", "10/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "ILEANA GUTIERREZ", "Lenovo", "Thinkpad T16", "PF59GTDF", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800008J", "Primero", "01/07/2025", "10/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "BRENDA ISABEL MARTINEZ MONTELONGO", "Lenovo", "Thinkpad T16", "PF59GTEJ", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9D:8D:89", "15\"", "Samsung", "800158J", "Primero", "01/07/2025", "10/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "SONIA FRAGOSO", "Lenovo", "Thinkpad T16", "PF59GTES", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800247J", "Primero", "01/07/2025", "10/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "ALEJANDRA CARRERA FILIO", "Lenovo", "Thinkpad T16", "PF59GTFR", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9D:34:10", "15\"", "Samsung", "800243K", "Primero", "01/07/2025", "10/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "MAURICIO UGALDE", "Lenovo", "Thinkpad T16", "PF59GWMH", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800786P", "Primero", "01/07/2025", "20/08/2025", "ENTREGADO", 1],
            ["CONFIDENCIAL", "NELLY ESTEVA", "Lenovo", "Thinkpad T16", "PF59ZYRE", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "Samsung", "800254M", "Primero", "01/07/2025", "10/07/2025", "ENTREGADO", 0],
            ["PUBLICO", "JUAN CARLOS VAZQUEZ", "Lenovo", "Thinkpad T16", "PF59GTGF", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800794E", "Primero", "01/07/2025", "11/07/2025", "ENTREGADO", 0],
            ["JAZMIN MONSERRAT FERNANDEZ ROJAS", "PUBLICO", "Lenovo", "Thinkpad T16", "PF59GWMA", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800018A", "Primero", "01/07/2025", "11/07/2025", "ENTREGADO", 0],
            ["PRIVADO", "DANIEL RODRIGUEZ", "Lenovo", "Thinkpad T16", "PF58R7XG", "Core Ultra 7", "32 GB", "512 GB", "30:E3:A4:9F:2D:65", "15\"", "Samsung", "800792Y", "Primero", "01/07/2025", "11/07/2025", "ENTREGADO", 0],
        ];

        foreach ($laptopsDesktops as $data) {
            $nombreBuscado = $this->limpiarTexto($data[1]);

            // Buscar colaborador asignado
            $colaborador = $colaboradores->first(function ($c) use ($nombreBuscado) {
                $nombreCompleto = $this->limpiarTexto("{$c->name} {$c->lastname}");
                return Str::contains($nombreCompleto, $nombreBuscado) || Str::contains($nombreBuscado, $this->limpiarTexto($c->name));
            });

            // Buscar modelo de equipo en la tabla modelo_equipos
            $marca = $data[2];
            $modeloText = $data[3];
            $modelo = $modelos->first(function ($m) use ($marca, $modeloText) {
                return Str::lower($m->marca) === Str::lower($marca) && Str::contains(Str::lower($m->modelo), Str::lower($modeloText));
            });

            if ($modelo) {
                Dispositivo::create([
                    'modelo_equipo_id' => $modelo->id,
                    'colaborador_id' => $colaborador?->id,
                    'numero_serie' => $data[4] !== 'NO APLICA' ? $data[4] : null,
                    'mac_address' => !empty($data[8]) ? $data[8] : null,
                    'marca_monitor' => $data[10] !== 'NO APLICA' ? $data[10] : null,
                    'serie_monitor' => $data[11] !== 'NO APLICA' ? $data[11] : null,
                    'nivel_confidencialidad' => $data[0],
                    'location' => 'Oficina',
                    'arrendamiento_compra' => $data[12],
                    'fecha_compra' => $this->parseFecha($data[13]),
                    'fecha_asignacion' => $this->parseFecha($data[14]),
                    'estatus_asignacion' => $data[15] ?? 'ENTREGADO',
                    'ciclo_borrado' => (int) $data[16],
                ]);
            }
        }

        // --- 2. LISTA DE ANDROIDS ---
        $androids = [
            ["HONOR", "X8A", "860972062388581", "10/07/2025", "JAVIER CHAVEZ", "14/09/2026"],
            ["HONOR", "X8A", "860972062384457", "30/07/2025", "MAURICIO UGALDE", "18/02/2026"],
            ["HONOR", "X8A", "860972061834791", "30/07/2025", "ANNERY AGUILAR", "27/05/2026"],
            ["HONOR", "X8A", "860972062376032", "30/07/2025", "CESAR PANIAGUA", "26/11/2025"],
            ["MOTOROLA", "MOTO G 5", "359488353649076", "10/07/2025", "ERNESTO PATIÑO", null],
            ["MOTOROLA", "MOTO G 5", "359488353648862", "30/07/2025", "JOSE MARTIN TADEO CATALAN", null],
            ["MOTOROLA", "MOTO G 5", "359488353684982", "30/07/2025", "ANGEL ARTURO CORONA SALDAÑA", "26/11/2025"],
            ["MOTOROLA", "MOTO G 5", "359488353679032", "30/07/2025", "CESAR PANIAGUA", "17/03/2026"],
        ];

        foreach ($androids as $data) {
            $nombreBuscado = $this->limpiarTexto($data[4]);
            $colaborador = $colaboradores->first(function ($c) use ($nombreBuscado) {
                return Str::contains($this->limpiarTexto("{$c->name} {$c->lastname}"), $nombreBuscado);
            });

            $modelo = $modelos->firstWhere('modelo', $data[1]);

            if ($modelo) {
                Dispositivo::create([
                    'modelo_equipo_id' => $modelo->id,
                    'colaborador_id' => $colaborador?->id,
                    'imei' => $data[2],
                    'fecha_compra' => $this->parseFecha($data[3]),
                    'fecha_asignacion' => $this->parseFecha($data[5]),
                    'estatus_asignacion' => 'ENTREGADO',
                ]);
            }
        }

        // --- 3. LISTA DE IPHONES ---
        $iphones = [
            [true, "AGUSTIN MARTINEZ", "IPHONE 14 128 GB", "RXVWP43K97", "351168084597145", "351168084662089", "01/09/2024", "27/09/2024", "Aún activo", "PUBLICO"],
            [true, "EDWIN RODRIGUEZ", "IPHONE 14 128 GB", "VY90CX3XF5", "351168084713023", "351168084140565", "01/09/2024", "20/09/2024", "Aún activo", "PUBLICO"],
            [true, "DANIEL VARGAS", "IPHONE 14 128 GB", "H165QYXRRL", "351168084796093", "351168084548262", "01/09/2024", "23/09/2024", "Aún activo", "PUBLICO"],
            [true, "JULIO AVILA", "IPHONE 14 128 GB", "G452QQWR27", "351168084354687", "351168084775469", "01/09/2024", "13/09/2024", "Aún activo", "PUBLICO"],
            [true, "ANDRES RIVERA", "IPHONE 14 128 GB", "T02375NYWM", "351168084972363", "351168084923838", "01/09/2024", "20/09/2024", "Aún activo", "PUBLICO"],
            [true, "CARLOS BANDA", "IPHONE 14 128 GB", "NHXNM4X1XG", "351168084261817", "351168084466556", "01/09/2024", "20/09/2024", "Aún activo", "PUBLICO"],
            [true, "RUBEN MARTINEZ", "IPHONE 14 128 GB", "TD2F03HXHM", "351168084534007", "351168084252873", "01/09/2024", "23/09/2024", "Aún activo", "PUBLICO"],
            [true, "ABRAHAM CABRERA", "IPHONE 14 128 GB", "VYPL9F7RHH", "351168084715366", "351168084700442", "01/09/2024", "13/09/2024", "Aún activo", "PUBLICO"],
            [true, "NOEL RUIZ", "IPHONE 14 128 GB", "XGDP4T4FL2", "351168084255512", "351168084714534", "01/09/2024", "23/09/2024", "Aún activo", "PUBLICO"],
            [true, "OSCAR TRUJILLO", "IPHONE 14 128 GB", "W5NQ0JG4WQ", "351168084594472", "351168084110105", "01/09/2024", "18/09/2024", "Aún activo", "PUBLICO"],
            [true, "RICARDO MELO", "IPHONE 14 128 GB", "HQV36KC2L2", "351168084459700", "351168084190875", "01/09/2024", "09/09/2024", "Aún activo", "PUBLICO"],
            [true, "LUIS OREGON", "IPHONE 14 128 GB", "YP46NF26CW", "351168084858083", "351168084834993", "01/09/2024", "24/09/2024", "Aún activo", "PUBLICO"],
            [true, "SALVADOR SANCHEZ", "IPHONE 14 128 GB", "VK00F5HVJM", "351168084957836", "351168084257426", "01/09/2024", "14/09/2024", "Aún activo", "PUBLICO"],
            [true, "LUIS FERNANDO SAMPEDRO", "IPHONE 14 128 GB", "GYFTFQQ4P6", "351168084182708", "351168084038157", "01/09/2024", "20/09/2027", "Aún activo", "PUBLICO"],
            [true, "JOSE MIGUEL FLORES CASTILLO", "IPHONE 14 128 GB", "VJHY7JC792", "351168084600006", "351168084095918", "01/09/2024", "27/09/2024", "Aún activo", "PUBLICO"],
            [true, "EMILIO RAMIREZ", "IPHONE 14 128 GB", "YTWQ9P4CVY", "351168084215805", "351168084805779", "01/09/2024", "14/09/2024", "Aún activo", "PUBLICO"],
            [false, "LEONARDO GARCIA", "iPhone 12 Black 64 GB", "FFMJQ1050F0N", "354244476827403", null, "01/11/2022", "10/02/2026", "Aún activo", "PUBLICO"],
            [false, "PATRICIA RAMIREZ", "iPhone 12 Black 64 GB", "FFMJQ0K20F0N", "354244476694019", null, "01/11/2022", "20/09/2024", "Aún activo", "PUBLICO"],
            [true, "DANIEL RODRIGUEZ", "iPhone 12 Black 64 GB", "FFMJQ14B0F0N", "354244476999004", null, "01/11/2022", "13/09/2024", "Aún activo", "PUBLICO"],
            [false, "JESUS MALAGON", "iPhone 12 Black 64 GB", "FFMJQ01P0F0N", "350640547431774", null, "01/11/2022", "24/09/2024", "Aún activo", "PUBLICO"],
            [false, "OMAR CHAVEZ", "iPhone 12 Black 64 GB", "FFMJQ10G0F0N", "354244476656919", null, "01/11/2022", "18/09/2024", "Aún activo", "PUBLICO"],
            [false, "DAVID VELAZQUEZ", "iPhone 12 Black 64 GB", "FFXJ1HS30F0N", "356427674527895", null, "01/11/2022", "08/09/2024", "Aún activo", "PUBLICO"],
            [false, "CLAUDIA MARTINEZ", "iPhone 12 Black 64 GB", "FFMJQ08T0F0N", "356427674903898", null, "01/11/2022", "20/11/2024", "Aún activo", "PUBLICO"],
            [false, "ANA VILLANUEVA", "iPhone 12 Black 64 GB", "FFMJQ08T0F0N", "354244476995325", null, "01/11/2022", "17/07/2026", "Aún activo", "PUBLICO"],
            [false, "JULIO MENDOZA", "iPhone 12 Black 64 GB", "FFXJ1PWE0F0N", "356427674620468", null, "01/11/2022", "08/09/2024", "Aún activo", "PUBLICO"],
            [false, "ALEJANDRA VELAZQUEZ", "iPhone 12 Black 64 GB", "FFMJQ08T0F0N", "354244474672199", null, "01/11/2022", "20/11/2024", "Aún activo", "PUBLICO"],
            [false, "GABRIEL ARRIAGA COLIN", "iPhone 14 Pro Max 128 GB", "N/A", "359237904408940", null, "01/03/2023", "03/02/2024", "Aún activo", "PUBLICO"],
            [false, "JESUS MARRON", "iPhone 14 Pro Max 128 GB", "HHWHF93M7N", "352994539104123", null, "01/03/2023", "28/01/2024", "Aún activo", "PUBLICO"],
            [false, "JORGE LUIS GUZMAN MORA", "iPhone 13 128 GB", "JRH2JXCQPT", "357654174357304", null, "01/03/2023", "09/02/2026", "Aún activo", "PUBLICO"],
            [false, "TAKAHIRO ARAKAWA", "iPhone 15 Black 128 GB", "DQR937QY2J", "353524887045161", null, "12/05/2025", null, "Aún activo", "PUBLICO"],
            [false, "GABRIEL ARRIAGA COLIN", "iPhone 16 Plus 128 GB", "L44JJXMPY4", "353303304517619", null, "31/01/2026", "04/02/2026", "Aún activo", "PUBLICO"],
            [false, "RICARDO MEDINA", "iPhone 16 Plus 128 GB", "GVQ3H2M4VD", "353303309915198", null, "31/01/2026", "04/02/2026", "Aún activo", "PUBLICO"],
            [false, "KAZUKI MINAI", "iPhone 16 Black 128 GB", "L56NP996Y9", "354257903416574", null, "31/01/2026", "04/02/2026", "Aún activo", "PUBLICO"],
            [false, "MARIO HORCASITAS", "iPhone 16 Black 128 GB", "K7GFCPW1QP", "354257903150785", null, "31/01/2026", "04/02/2026", "Aún activo", "PUBLICO"],
            [false, "TAKAHIRO ARAKAWA", "iPhone 17 Pro Silver 256 GB", "J4YTXYHHK7", "352176456736091", null, "01/06/2026", "30/06/2026", "Aún activo", "PUBLICO"],
        ];

        foreach ($iphones as $data) {
            $nombreBuscado = $this->limpiarTexto($data[1]);
            $colaborador = $colaboradores->first(function ($c) use ($nombreBuscado) {
                return Str::contains($this->limpiarTexto("{$c->name} {$c->lastname}"), $nombreBuscado);
            });

            $modeloText = $data[2];
            $modelo = $modelos->first(function ($m) use ($modeloText) {
                return Str::contains(Str::lower($m->modelo), Str::lower($modeloText));
            });

            if ($modelo) {
                Dispositivo::create([
                    'modelo_equipo_id' => $modelo->id,
                    'colaborador_id' => $colaborador?->id,
                    'cubo_cargador' => (bool) $data[0],
                    'numero_serie' => $data[3] !== 'N/A' ? $data[3] : null,
                    'imei' => $data[4],
                    'imei2' => $data[5] !== '-' ? $data[5] : null,
                    'fecha_compra' => $this->parseFecha($data[6]),
                    'fecha_asignacion' => $this->parseFecha($data[7]),
                    'estatus_asignacion' => $data[8] ?? 'Aún activo',
                    'nivel_confidencialidad' => $data[9] ?? 'PUBLICO',
                ]);
            }
        }
    }
}