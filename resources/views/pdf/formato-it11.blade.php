<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $record->folio }}</title>
    <style>
        @page {
            margin: 30px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: #000;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        .sgsi-box {
            border: 1px solid #000;
            border-collapse: collapse;
            width: 100%;
        }

        .sgsi-box td {
            border: 1px solid #000;
            padding: 3px;
            text-align: center;
            font-size: 12px;
        }

        .sgsi-label {
            background-color: #008779;
            color: white;
            font-weight: bold;
        }

        .doc-title {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            margin: 5px 0 10px 0;
            text-transform: uppercase;
        }

        table.grid {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        table.grid th,
        table.grid td {
            border: 1px solid #000;
            padding: 4px;
            font-size: 14px;
        }

        table.grid th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
        }

        .bg-gray {
            background-color: #e9ecef;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- Encabezado corporativo -->
    <table class="header-table">
        <tr>
            <td style="width: 60%;">
                @php $headerExists = \Illuminate\Support\Facades\Storage::disk('local')->exists('encabezado.jpg'); @endphp
                @if ($headerExists)
                    @php
                        $headerContent = \Illuminate\Support\Facades\Storage::disk('local')->get('encabezado.jpg');
                        $headerBase64 = base64_encode($headerContent);
                        $headerMime = \Illuminate\Support\Facades\Storage::disk('local')->mimeType('encabezado.jpg');
                    @endphp
                    <img src="data:{{ $headerMime }};base64,{{ $headerBase64 }}" style="max-height: 40px;">
                @else
                    <strong style="font-size: 14px; color: #008779;">Niterra México, S.A. de C.V.</strong>
                @endif
            </td>
            <td style="width: 40%;">
                <table class="sgsi-box">
                    <tr>
                        <td class="sgsi-label">Código:</td>
                        <td>F-IT-11 Rev. 1</td>
                        <td class="sgsi-label">Emisión:</td>
                        <td>16-Jun-2025</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="doc-title">F-IT-11 Rev. 1 Reporte de prueba de continuidad</div>

    <!-- Encabezado de la Prueba -->
    <table class="grid">
        <tr>
            <td class="bg-gray" style="width: 20%;">Área de negocio:</td>
            <td style="width: 30%;">{{ $record->area_negocio }}</td>
            <td class="bg-gray" style="width: 20%;">Fecha de prueba:</td>
            <td style="width: 30%;">{{ $record->fecha_prueba?->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td class="bg-gray">Unidad funcional:</td>
            <td>{{ $record->unidad_funcional }}</td>
            <td class="bg-gray">Responsable de respuesta:</td>
            <td>{{ $record->responsable_respuesta }}</td>
        </tr>
        <tr>
            <td class="bg-gray">Escenario:</td>
            <td>{{ $record->escenario }}</td>
            <td class="bg-gray">Lugar de entrevista:</td>
            <td>{{ $record->lugar_entrevista }}</td>
        </tr>
        <tr>
            <td class="bg-gray">Consideraciones:</td>
            <td colspan="3">{{ $record->consideraciones }}
                <br>
                No. De personas presentes: {{ $record->personas_presentes }}

                <br>
                No. De personas involucradas: {{ $record->personas_involucradas }}

            </td>
        </tr>
    </table>

    <!-- Tabla de Fases -->
    <table class="grid">
        <thead>
            <tr>
                <th style="width: 18%;">Fase</th>
                <th style="width: 20%;">Paso</th>
                <th style="width: 8%;">Inicio</th>
                <th style="width: 8%;">Fin</th>
                <th style="width: 46%;">Descripción</th>
            </tr>
        </thead>
        <tbody>
            @forelse($record->fases as $fase)
                <tr>
                    <td><strong>{{ $fase->bloque }}</strong></td>
                    <td>{{ $fase->fase }}</td>
                    <td class="text-center">{{ $fase->inicio }}</td>
                    <td class="text-center">{{ $fase->fin }}</td>
                    <td>{{ $fase->descripcion }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Sin fases registradas</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tabla de Métricos -->
    <table class="grid" style="width: 60%; margin-top: 10px; margin-left: auto; margin-right: auto;">
        <thead>
            <tr>
                <th style="width: 50%;">Métrico</th>
                <th style="width: 25%;">Teórico (h)</th>
                <th style="width: 25%;">Real (h)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiempo de evacuación, si aplica</td>
                <td class="text-center">{{ $record->evacuacion_teorico }}</td>
                <td class="text-center">{{ $record->evacuacion_real }}</td>
            </tr>
            <tr>
                <td>RPO</td>
                <td class="text-center">{{ $record->rpo_teorico }}</td>
                <td class="text-center">{{ $record->rpo_real }}</td>
            </tr>
            <tr>
                <td>RTO</td>
                <td class="text-center">{{ $record->rto_teorico }}</td>
                <td class="text-center">{{ $record->rto_real }}</td>
            </tr>
            <tr>
                <td>MTD</td>
                <td class="text-center">{{ $record->mtd_teorico }}</td>
                <td class="text-center">{{ $record->mtd_real }}</td>
            </tr>
        </tbody>
    </table>

    <p>
        ¿El plan de recuperación fue efectivo? Sí ___{{ $record->plan_efectivo ? 'X' : '' }}___
        No ___{{ !$record->plan_efectivo ? 'X' : '' }}___
    </p>
    <p>
        ¿Por qué?
        <br>
        {{ $record->porque_efectivo }}
    </p>
    <!-- Evaluación Final -->
    <table class="grid" style="margin-top: 10px;">
        <tr>
            <td class="bg-gray">Lecciones aprendidas / oportunidades de mejora:</td>
        </tr>
        <tr>
            <td>{{ $record->lecciones_aprendidas }}</td>
        </tr>
    </table>

</body>

</html>
