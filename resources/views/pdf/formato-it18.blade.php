<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $record->folio }}</title>
    <style>
        @page {
            margin: 18px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 9.5px;
            color: #000;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
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
            font-size: 8.5px;
        }

        .sgsi-label {
            background-color: #008779;
            color: white;
            font-weight: bold;
        }

        .doc-title {
            text-align: center;
            font-weight: bold;
            font-size: 11px;
            margin: 4px 0 8px 0;
            text-transform: uppercase;
        }

        table.grid {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 6px;
        }

        table.grid th,
        table.grid td {
            border: 1px solid #000;
            padding: 3.5px;
            font-size: 9px;
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
    </style>
</head>

<body>

    <table class="header-table">
        <tr>
            <td style="width: 60%;">
                <strong style="font-size: 15px; color: #008779;">Niterra México, S.A. de C.V.</strong>
            </td>
            <td style="width: 40%;">
                <table class="sgsi-box">
                    <tr>
                        <td class="sgsi-label">Código:</td>
                        <td>F-IT-18 Rev. 0</td>
                        <td class="sgsi-label">Emisión:</td>
                        <td>31-01-2025</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="doc-title">Plan Específico de Recuperación en Caso de Interrupción (PER)</div>

    <table class="grid">
        <tr>
            <td class="bg-gray" style="width: 20%;">Fecha de elaboración:</td>
            <td style="width: 30%;">{{ $record->fecha_elaboracion?->format('d-m-Y') }}</td>
            <td class="bg-gray" style="width: 20%;">Escenario crítico:</td>
            <td style="width: 30%;">{{ $record->escenario_critico }}</td>
        </tr>
        <tr>
            <td class="bg-gray">Tipo de escenario:</td>
            <td colspan="3">{{ $record->tipo_escenario }}</td>
        </tr>
        <tr>
            <td class="bg-gray">Descripción del escenario:</td>
            <td colspan="3">{{ $record->descripcion_escenario }}</td>
        </tr>
        <tr>
            <td class="bg-gray">Antecedentes:</td>
            <td colspan="3">{{ $record->antecedentes }}</td>
        </tr>
    </table>

    <!-- FODA -->
    <div style="font-weight: bold; margin-top: 4px; margin-bottom: 2px;">Factores del entorno que influyen:</div>
    <table class="grid">
        <thead>
            <tr>
                <th style="width: 15%;">Tipo</th>
                <th style="width: 55%;">Descripción</th>
                <th style="width: 15%;">F, O, D, A</th>
                <th style="width: 15%;">Influencia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($record->factores as $factor)
                <tr>
                    <td class="text-center">{{ $factor->tipo }}</td>
                    <td>{{ $factor->descripcion }}</td>
                    <td class="text-center">{{ $factor->clasificacion }}</td>
                    <td class="text-center">{{ $factor->influencia }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- FASES -->
    <div style="font-weight: bold; margin-top: 4px; margin-bottom: 2px;">Actividades y Fases de Recuperación:</div>
    <table class="grid">
        <thead>
            <tr>
                <th style="width: 25%;">Fase de Recuperación</th>
                <th style="width: 60%;">Acciones que se tomarán</th>
                <th style="width: 15%;">Tiempo (h)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($record->fases as $fase)
                <tr>
                    <td><strong>{{ $fase->fase_nombre }}</strong></td>
                    <td>{{ $fase->acciones }}</td>
                    <td class="text-center">{{ $fase->tipo_metrico }}: {{ $fase->tiempo_horas }} h</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- RESUMEN MÉTRICOS -->
    <table class="grid" style="width: 70%; margin: 6px auto;">
        <tr>
            <td class="bg-gray text-center">RPO Global: {{ $record->rpo_global }} h</td>
            <td class="bg-gray text-center">RTO Global: {{ $record->rto_global }} h</td>
            <td class="bg-gray text-center">MTD: {{ $record->mtd }} h</td>
        </tr>
    </table>

    <!-- AFECTACIÓN AL CLIENTE -->
    <div style="font-weight: bold; margin-top: 4px; margin-bottom: 2px;">Evaluación de Afectación al Cliente:</div>
    <table class="grid">
        <thead>
            <tr>
                <th>Cliente Afectado</th>
                <th>Tipo de Afectación</th>
                <th>Consideraciones de Manejo de Crisis</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>OEM/OES</td>
                <td>{{ $record->oem_tipo_afectacion }}</td>
                <td>{{ $record->oem_consideraciones }}</td>
            </tr>
            <tr>
                <td>Aftermarket 1</td>
                <td>{{ $record->aftermarket1_tipo_afectacion }}</td>
                <td>{{ $record->aftermarket1_consideraciones }}</td>
            </tr>
            <tr>
                <td>Aftermarket 2</td>
                <td>{{ $record->aftermarket2_tipo_afectacion }}</td>
                <td>{{ $record->aftermarket2_consideraciones }}</td>
            </tr>
            <tr>
                <td>Otros</td>
                <td>{{ $record->otros_tipo_afectacion }}</td>
                <td>{{ $record->otros_consideraciones }}</td>
            </tr>
        </tbody>
    </table>

    <!-- CADENA DE LLAMADAS Y TEXTOS -->
    <table class="grid" style="margin-top: 6px;">
        <tr>
            <td class="bg-gray" style="width: 30%;">Comité de Crisis:</td>
            <td>{{ $record->comite_crisis }}</td>
        </tr>
        <tr>
            <td class="bg-gray">Otros Miembros Involucrados:</td>
            <td>{{ $record->otros_niterra }}</td>
        </tr>
        <tr>
            <td class="bg-gray">Otras Partes Interesadas:</td>
            <td>{{ $record->otras_partes_interesadas }}</td>
        </tr>
        <tr>
            <td class="bg-gray">Limitaciones:</td>
            <td>{{ $record->limitaciones }}</td>
        </tr>
        <tr>
            <td class="bg-gray">Coordinaciones y Responsabilidades:</td>
            <td>{{ $record->coordinaciones_responsabilidades }}</td>
        </tr>
    </table>

</body>

</html>
