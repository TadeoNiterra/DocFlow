<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>F-IT-09 {{ $record->folio }}</title>
    <style>
        @page {
            margin: 15px 20px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
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
            font-size: 9px;
        }

        .sgsi-label {
            background-color: #008779;
            color: white;
            font-weight: bold;
        }

        .doc-title {
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            margin: 5px 0 10px 0;
            text-transform: uppercase;
        }

        table.grid {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        table.grid th,
        table.grid td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }

        table.grid th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .section-header {
            background-color: #f8cbad;
            font-weight: bold;
            text-align: center;
            padding: 4px;
            border: 1px solid #000;
        }

        .evidence-link {
            color: #0056b3;
            text-decoration: underline;
            font-weight: bold;
            display: block;
            margin-bottom: 2px;
        }
    </style>
</head>

<body>

    <!-- Encabezado con Imagen Header -->
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
                    <strong style="font-size: 16px; color: #008779;">Niterra México, S.A. de C.V.</strong>
                @endif
            </td>
            <td style="width: 40%;">
                <table class="sgsi-box">
                    <tr>
                        <td class="sgsi-label">Código:</td>
                        <td>F-IT-09 Rev. 1</td>
                        <td class="sgsi-label">Emisión:</td>
                        <td>28-Jun-2024</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="doc-title">Análisis de riesgos de proyecto</div>

    <!-- Info del Proyecto -->
    <table class="grid">
        <tr>
            <td style="width: 15%; font-weight: bold; background-color: #e9ecef;">Proyecto:</td>
            <td style="width: 50%; text-align: left;">{{ $record->proyecto }}</td>
            <td style="width: 10%; font-weight: bold; background-color: #e9ecef;">Fecha:</td>
            <td style="width: 25%;">{{ $record->fecha?->format('d/m/Y') }}</td>
        </tr>
    </table>

    <!-- Tabla 1: Activos -->
    <table class="grid">
        <thead>
            <tr>
                <th>ID</th>
                <th>Activo</th>
                <th>Clasificación</th>
                <th>Rev. Inicial</th>
                <th>Res. Inicial</th>
                <th>Rev. Intermedia</th>
                <th>Res. Intermedio</th>
                <th>Rev. Final</th>
                <th>Res. Final</th>
            </tr>
        </thead>
        <tbody>
            @forelse($record->activos as $activo)
                <tr>
                    <td><strong>{{ $activo->id_activo }}</strong></td>
                    <td style="text-align: left;">{{ $activo->activo }}</td>
                    <td>{{ $activo->clasificacion }}</td>
                    <td>{{ $activo->revision_inicial ? \Carbon\Carbon::parse($activo->revision_inicial)->format('d/m/Y') : '' }}
                    </td>
                    <td>{{ $activo->resultado_inicial }}</td>
                    <td>{{ $activo->revision_intermedia ? \Carbon\Carbon::parse($activo->revision_intermedia)->format('d/m/Y') : '' }}
                    </td>
                    <td>{{ $activo->resultado_intermedio }}</td>
                    <td>{{ $activo->revision_final ? \Carbon\Carbon::parse($activo->revision_final)->format('d/m/Y') : '' }}
                    </td>
                    <td>{{ $activo->resultado_final }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Sin activos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tabla 2: Evaluación de Riesgos -->
    <div class="section-header">Evaluación de riesgos</div>
    <table class="grid">
        <thead>
            <tr>
                <th style="width: 3%;">NO</th>
                <th style="width: 25%;">Riesgo (problema)</th>
                <th style="width: 3%;">C</th>
                <th style="width: 3%;">I</th>
                <th style="width: 3%;">D</th>
                <th style="width: 5%;">Proba.</th>
                <th style="width: 5%;">Sever.</th>
                <th style="width: 5%;">Puntaje</th>
                <th style="width: 10%;">Nivel de Riesgo</th>
                <th style="width: 23%;">Tratamiento / causa</th>
                <th style="width: 15%;">Evidencia de tratamiento</th>
            </tr>
        </thead>
        <tbody>
            @forelse($record->riesgos as $riesgo)
                <tr>
                    <td>{{ $riesgo->numero }}</td>
                    <td style="text-align: left;">{{ $riesgo->riesgo_problema }}</td>
                    <td>{{ $riesgo->c ? 'X' : '' }}</td>
                    <td>{{ $riesgo->i ? 'X' : '' }}</td>
                    <td>{{ $riesgo->d ? 'X' : '' }}</td>
                    <td>{{ $riesgo->probabilidad }}</td>
                    <td>{{ $riesgo->severidad }}</td>
                    <td>{{ $riesgo->probabilidad * $riesgo->severidad }}</td>
                    <td>{{ $riesgo->nivel_riesgo }}</td>
                    <td style="text-align: left;">{{ $riesgo->tratamiento_causa }}</td>
                    <td style="text-align: left;">
                        @forelse($riesgo->evidencias as $evidencia)
                            <a href="{{ route('formato-it09.download-evidencia', $evidencia->id) }}"
                                class="evidence-link" target="_blank">
                                📎 {{ $evidencia->nombre_archivo }}
                            </a>
                        @empty
                            <span style="color: #888;">Sin evidencia</span>
                        @endforelse
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="11">Sin riesgos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
