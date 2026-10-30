<?php

namespace Database\Seeders;

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
     * Helper para convertir cadenas de fecha (ej. "01/07/2025") a formato SQL
     */
    private function parseFecha(?string $fecha): ?string
    {
        if (empty($fecha) || in_array(trim($fecha), ['-', 'N/A', 'NO APLICA', 'PENDIENTE', '´-'])) {
            return null;
        }

        try {
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

        // 2. Cargar modelos de equipos creados por ModeloEquipoSeeder
        $modelos = ModeloEquipo::all();

        // --- 1. LISTA DE LAPTOPS & DESKTOPS (Datos físicos del inventario) ---
        $laptopsDesktops = [
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T16", "PF58RC2L", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "lenovo", "VNABLTY3", "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T16", "PF5JRN1F", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", null, null, null, null, 0],
            ["PRIVADO", "Lenovo", "Thinkpad T16", "PF59GNYY", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9D:EC:11", "15\"", "Samsung", "801103T", "Primero", "01/07/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T14", "PF5JRJ9M", "Core Ultra 5", "16 GB", "512 GB", "28:92:00:0A:34:DF", "14\"", null, null, "Primero", "01/07/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T16", "PF5JNW4N", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "samsung", "800792W", "Segundo (2025)", "01/12/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T16", "PF5JNT59", "Core Ultra 5", "16 GB", "256 GB", "", "15\"", "Samsung", "800803Z", "Segundo (2025)", "01/12/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59GWQ4", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", null, null, "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59GTG9", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9B:04:F6", "15\"", "Samsung", "800739Z", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59J7S8", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:A0:2F:1C", "15\"", "Samsung", "800781E", "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T16", "PF59GR7R", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "lenovo", "VNABHWC7", "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T16", "PF59GTCC", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9B:7A:30", "15\"", "lenovo", "VNABLTY1", "Primero", "01/07/2025", 1],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T16", "PF59GWPR", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9D:8C:BC", "15\"", "lenovo", "VNABHWBL", "Primero", "01/07/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T16", "PF59J7S2", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800868K", "Primero", "01/07/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T14", "PF577HC8", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHWBW", "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T14", "PF577MVP", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHWBV", "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T14", "PF577HCX", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHWBT", "Primero", "01/07/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T14", "PF5796FD", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHVVY", "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T14", "PF577SCP", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHHWBX", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF58RCS5", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "Samsung", "800736H", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF5753WM", "Core Ultra 5", "16 GB", "512 GB", "68:C6:AC:53:8A:54", "14\"", null, null, "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T14", "PF57632T", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", "LENOVO", "VNABHWBN", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF5765AV", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", null, null, "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T16", "PF58RAE0", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "lenovo", "VNABLTY2", "Primero", "01/07/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T16", "PF5Q27D4", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "Samsung", "800759Y", "Primero", "01/07/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T16", "PF59GR3M", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800777L", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59J7SZ", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800738T", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59J7V0", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9B:11:C6", "15\"", "Samsung", "800802T", "Primero", "01/07/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T16", "PF58RCTL", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "Samsung", "800759Y", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF577AAF", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", "Samsung", "0AC1HCNR800164M", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF577MKV", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", null, null, "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF577MLJ", "Core Ultra 5", "16 GB", "512 GB", "68:C6:AC:53:56:33", "14\"", null, null, "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF58R7WY", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "Samsung", "800783W", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF577S1P", "Core Ultra 5", "16 GB", "512 GB", "E0:8F:4C:86:12:E9", "14\"", null, null, "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF577S2R", "Core Ultra 5", "16 GB", "512 GB", "68:C6:AC:53:56:47", "14\"", null, null, "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF578C4T", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", null, null, "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF5736XJ", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", null, null, "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF578JXP", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", null, null, "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF5JB9EW", "Core Ultra 5", "16 GB", "256 GB", "", "14\"", null, null, "Segundo (2025)", "01/12/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF5JB9XG", "Core Ultra 5", "16 GB", "256 GB", "", "14\"", null, null, "Segundo (2025)", "01/12/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T14", "PF5JBBZH", "Core Ultra 5", "16 GB", "256 GB", "", "14\"", null, null, "Segundo (2025)", "01/12/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T14", "PF5RAV7X", "Core I7", "32 GB", "1 TB", "", "14\"", "lenovo", "VNABHVW6", "Segundo (2025)", "01/12/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T16", "PF59GWQ9", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800132V", "Primero", "01/07/2025", 1],
            ["PRIVADO", "Lenovo", "Thinkpad T16", "PF59GR37", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800785Z", "Primero", "01/07/2025", 1],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T14", "PF591FDS", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHWA4", "Propiedad de Niterra", "10/02/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T14", "PF56SG5A", "Core Ultra 5", "16 GB", "512 GB", "", "14\"", "Samsung", "800628L", "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T16", "PF59GWNM", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800234J", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59XXX7", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "Samsung", "800161P", "Primero", "01/07/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T16", "PF59QHRW", "Core Ultra 7", "32 GB", "512 GB", "70:15:FB:1C:47:FB", "15\"", "lenovo", "VNABHWC6", "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T14", "PF591FE3", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHWC0", "Propiedad de Niterra", "10/02/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T14", "PF5LWNK6", "Core Ultra 7", "32 GB", "512 GB", "", "14\"", "lenovo", "VNABHWBD", "Propiedad de Niterra", "19/05/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T16", "PF58R4ZT", "Core Ultra 7", "32 GB", "512 GB", "70:15:FB:1D:98:F9", "15\"", "Samsung", "800911V", "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T16", "PF59GR3W", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9B:2D:AF", "15\"", "lenovo", "VNABHWA3", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59GR42", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800765K", "Primero", null, 2],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59GR49", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800749H", "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T16", "PF59GR76", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9D:9C:20", "15\"", "Samsung", "800900Y", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59GR7F", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "801113E", "Primero", "01/07/2025", 0],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T16", "PF59GTDA", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9D:A6:11", "15\"", "lenovo", "VNABHWAA", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59GTDF", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800008J", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59GTEJ", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9D:8D:89", "15\"", "Samsung", "800158J", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59GTES", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800247J", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59GTFR", "Core Ultra 5", "16 GB", "512 GB", "30:E3:A4:9D:34:10", "15\"", "Samsung", "800243K", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59GWMH", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800786P", "Primero", "01/07/2025", 1],
            ["CONFIDENCIAL", "Lenovo", "Thinkpad T16", "PF59ZYRE", "Core Ultra 7", "32 GB", "512 GB", "", "15\"", "Samsung", "800254M", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59GTGF", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800794E", "Primero", "01/07/2025", 0],
            ["PUBLICO", "Lenovo", "Thinkpad T16", "PF59GWMA", "Core Ultra 5", "16 GB", "512 GB", "", "15\"", "Samsung", "800018A", "Primero", "01/07/2025", 0],
            ["PRIVADO", "Lenovo", "Thinkpad T16", "PF58R7XG", "Core Ultra 7", "32 GB", "512 GB", "30:E3:A4:9F:2D:65", "15\"", "Samsung", "800792Y", "Primero", "01/07/2025", 0],
        ];

        foreach ($laptopsDesktops as $data) {
            $marca = $data[1];
            $modeloText = $data[2];
            $procesador = $data[4];

            // Busca el modelo exacto por marca, nombre de modelo y procesador
            $modelo = $modelos->first(function ($m) use ($marca, $modeloText, $procesador) {
                return Str::lower($m->marca) === Str::lower($marca)
                    && Str::contains(Str::lower($m->modelo), Str::lower($modeloText))
                    && Str::lower($m->processor) === Str::lower($procesador);
            }) ?? $modelos->first(function ($m) use ($marca, $modeloText) {
                return Str::lower($m->marca) === Str::lower($marca)
                    && Str::contains(Str::lower($m->modelo), Str::lower($modeloText));
            });

            if ($modelo) {
                Dispositivo::create([
                    'modelo_equipo_id' => $modelo->id,
                    'colaborador_id' => null, // Sin asignación
                    'numero_serie' => $data[3] !== 'NO APLICA' ? $data[3] : null,
                    'mac_address' => !empty($data[7]) ? $data[7] : null,
                    'marca_monitor' => !empty($data[9]) && $data[9] !== 'NO APLICA' ? $data[9] : null,
                    'serie_monitor' => !empty($data[10]) && $data[10] !== 'NO APLICA' ? $data[10] : null,
                    'nivel_confidencialidad' => $data[0],
                    'location' => 'Almacén',
                    'arrendamiento_compra' => $data[11],
                    'fecha_compra' => $this->parseFecha($data[12]),
                    'fecha_asignacion' => null, // Sin asignación
                    'estatus_asignacion' => 'EN STOCK', // Listo para ser asignado
                    'ciclo_borrado' => (int) $data[13],
                ]);
            }
        }

        // --- 2. LISTA DE ANDROIDS ---
        $androids = [
            ["HONOR", "X8A", "860972062388581", "10/07/2025"],
            ["HONOR", "X8A", "860972062384457", "30/07/2025"],
            ["HONOR", "X8A", "860972061834791", "30/07/2025"],
            ["HONOR", "X8A", "860972062376032", "30/07/2025"],
            ["MOTOROLA", "MOTO G 5", "359488353649076", "10/07/2025"],
            ["MOTOROLA", "MOTO G 5", "359488353648862", "30/07/2025"],
            ["MOTOROLA", "MOTO G 5", "359488353684982", "30/07/2025"],
            ["MOTOROLA", "MOTO G 5", "359488353679032", "30/07/2025"],
        ];

        foreach ($androids as $data) {
            $modelo = $modelos->firstWhere('modelo', $data[1]);

            if ($modelo) {
                Dispositivo::create([
                    'modelo_equipo_id' => $modelo->id,
                    'colaborador_id' => null, // Sin asignación
                    'imei' => $data[2],
                    'fecha_compra' => $this->parseFecha($data[3]),
                    'fecha_asignacion' => null, // Sin asignación
                    'estatus_asignacion' => 'EN STOCK',
                    'location' => 'Almacén',
                ]);
            }
        }

        // --- 3. LISTA DE IPHONES ---
        $iphones = [
            [true, "iPhone 14 128 GB", "RXVWP43K97", "351168084597145", "351168084662089", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "VY90CX3XF5", "351168084713023", "351168084140565", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "H165QYXRRL", "351168084796093", "351168084548262", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "G452QQWR27", "351168084354687", "351168084775469", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "T02375NYWM", "351168084972363", "351168084923838", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "NHXNM4X1XG", "351168084261817", "351168084466556", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "TD2F03HXHM", "351168084534007", "351168084252873", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "VYPL9F7RHH", "351168084715366", "351168084700442", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "XGDP4T4FL2", "351168084255512", "351168084714534", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "W5NQ0JG4WQ", "351168084594472", "351168084110105", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "HQV36KC2L2", "351168084459700", "351168084190875", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "YP46NF26CW", "351168084858083", "351168084834993", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "VK00F5HVJM", "351168084957836", "351168084257426", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "GYFTFQQ4P6", "351168084182708", "351168084038157", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "VJHY7JC792", "351168084600006", "351168084095918", "01/09/2024", "PUBLICO"],
            [true, "iPhone 14 128 GB", "YTWQ9P4CVY", "351168084215805", "351168084805779", "01/09/2024", "PUBLICO"],
            [false, "iPhone 12 Black 64 GB", "FFMJQ1050F0N", "354244476827403", null, "01/11/2022", "PUBLICO"],
            [false, "iPhone 12 Black 64 GB", "FFMJQ0K20F0N", "354244476694019", null, "01/11/2022", "PUBLICO"],
            [true, "iPhone 12 Black 64 GB", "FFMJQ14B0F0N", "354244476999004", null, "01/11/2022", "PUBLICO"],
            [false, "iPhone 12 Black 64 GB", "FFMJQ01P0F0N", "350640547431774", null, "01/11/2022", "PUBLICO"],
            [false, "iPhone 12 Black 64 GB", "FFMJQ10G0F0N", "354244476656919", null, "01/11/2022", "PUBLICO"],
            [false, "iPhone 12 Black 64 GB", "FFXJ1HS30F0N", "356427674527895", null, "01/11/2022", "PUBLICO"],
            [false, "iPhone 12 Black 64 GB", "FFMJQ08T0F0N", "356427674903898", null, "01/11/2022", "PUBLICO"],
            [false, "iPhone 12 Black 64 GB", "FFMJQ08T0F0N", "354244476995325", null, "01/11/2022", "PUBLICO"],
            [false, "iPhone 12 Black 64 GB", "FFXJ1PWE0F0N", "356427674620468", null, "01/11/2022", "PUBLICO"],
            [false, "iPhone 12 Black 64 GB", "FFMJQ08T0F0N", "354244474672199", null, "01/11/2022", "PUBLICO"],
            [false, "iPhone 14 Pro Max 128 GB", "N/A", "359237904408940", null, "01/03/2023", "PUBLICO"],
            [false, "iPhone 14 Pro Max 128 GB", "HHWHF93M7N", "352994539104123", null, "01/03/2023", "PUBLICO"],
            [false, "iPhone 13 128 GB", "JRH2JXCQPT", "357654174357304", null, "01/03/2023", "PUBLICO"],
            [false, "iPhone 15 Black 128 GB", "DQR937QY2J", "353524887045161", null, "12/05/2025", "PUBLICO"],
            [false, "iPhone 16 Plus 128 GB", "L44JJXMPY4", "353303304517619", null, "31/01/2026", "PUBLICO"],
            [false, "iPhone 16 Plus 128 GB", "GVQ3H2M4VD", "353303309915198", null, "31/01/2026", "PUBLICO"],
            [false, "iPhone 16 Black 128 GB", "L56NP996Y9", "354257903416574", null, "31/01/2026", "PUBLICO"],
            [false, "iPhone 16 Black 128 GB", "K7GFCPW1QP", "354257903150785", null, "31/01/2026", "PUBLICO"],
            [false, "iPhone 17 Pro Silver 256 GB", "J4YTXYHHK7", "352176456736091", null, "01/06/2026", "PUBLICO"],
        ];

        foreach ($iphones as $data) {
            $modeloText = $data[1];
            $modelo = $modelos->first(function ($m) use ($modeloText) {
                return Str::contains(Str::lower($m->modelo), Str::lower($modeloText));
            });

            if ($modelo) {
                Dispositivo::create([
                    'modelo_equipo_id' => $modelo->id,
                    'colaborador_id' => null, // Sin asignación
                    'cubo_cargador' => (bool) $data[0],
                    'numero_serie' => $data[2] !== 'N/A' ? $data[2] : null,
                    'imei' => $data[3],
                    'imei2' => (!empty($data[4]) && $data[4] !== '-') ? $data[4] : null,
                    'fecha_compra' => $this->parseFecha($data[5]),
                    'fecha_asignacion' => null, // Sin asignación
                    'estatus_asignacion' => 'EN STOCK',
                    'nivel_confidencialidad' => $data[6] ?? 'PUBLICO',
                    'location' => 'Almacén',
                ]);
            }
        }
    }
}