<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Matriz VDA / TISAX - Evidencias</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
            color: #333;
            margin: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #1e3a8a;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .header h2 {
            margin: 0;
            color: #1e3a8a;
            text-transform: uppercase;
        }
        .header p {
            margin: 4px 0 0 0;
            font-size: 10px;
            color: #666;
        }
        .tema-block {
            margin-bottom: 20px;
            page-break-inside: avoid;
        }
        .tema-title {
            background-color: #1e3a8a;
            color: #fff;
            padding: 6px 10px;
            font-weight: bold;
            font-size: 12px;
            border-radius: 4px;
            margin-bottom: 6px;
        }
        .subtema-title {
            background-color: #f1f5f9;
            color: #0f172a;
            border-left: 4px solid #3b82f6;
            padding: 4px 8px;
            font-weight: bold;
            font-size: 11px;
            margin: 8px 0 4px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #cbd5e1;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f8fafc;
            font-weight: bold;
            font-size: 10px;
            color: #475569;
        }
        .badge {
            display: inline-block;
            padding: 2px 6px;
            font-size: 9px;
            font-weight: bold;
            border-radius: 3px;
        }
        .badge-upload { background-color: #dbeafe; color: #1e40af; }
        .badge-docflow { background-color: #dcfce7; color: #166534; }
        .badge-url { background-color: #fef3c7; color: #92400e; }
        .badge-none { background-color: #f1f5f9; color: #64748b; }
    </style>
</head>
<body>
    <div class="header">
        <h2>DocFlow - Matriz de Cumplimiento VDA / TISAX</h2>
        <p>Reporte de Controles y Evidencias Asociadas | Generado el: {{ $fechaReporte }}</p>
    </div>

    @foreach($groupedControls as $nombreTema => $subtemas)
        <div class="tema-block">
            <div class="tema-title">Tema {{ $nombreTema }}</div>

            @foreach($subtemas as $nombreSubtema => $controles)
                <div class="subtema-title">Subtema {{ $nombreSubtema }}</div>

                <table>
                    <thead>
                        <tr>
                            <th style="width: 10%;">Código</th>
                            <th style="width: 40%;">Criterio / Requisito VDA</th>
                            <th style="width: 25%;">Evidencia Vinculada</th>
                            <th style="width: 12%;">Tipo</th>
                            <th style="width: 13%;">Origen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($controles as $control)
                            @if($control->evidences->isNotEmpty())
                                @foreach($control->evidences as $index => $evidence)
                                    <tr>
                                        @if($index === 0)
                                            <td rowspan="{{ $control->evidences->count() }}" style="font-weight: bold; text-align: center;">
                                                {{ $control->number }}
                                            </td>
                                            <td rowspan="{{ $control->evidences->count() }}">
                                                {{ $control->name }}
                                            </td>
                                        @endif
                                        <td><strong>{{ $evidence->name }}</strong></td>
                                        <td>
                                            @if($evidence->type === 'upload')
                                                <span class="badge badge-upload">Archivo</span>
                                            @elseif($evidence->type === 'docflow_version')
                                                <span class="badge badge-docflow">DocFlow</span>
                                            @else
                                                <span class="badge badge-url">Enlace URL</span>
                                            @endif
                                        </td>
                                        <td style="font-size: 9px; word-break: break-all;">
                                            @if($evidence->type === 'docflow_version' && $evidence->document)
                                                {{ $evidence->document->code }}
                                            @elseif($evidence->type === 'url')
                                                {{ Str::limit($evidence->external_url, 25) }}
                                            @else
                                                Almacenamiento Local
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td style="font-weight: bold; text-align: center;">{{ $control->number }}</td>
                                    <td>{{ $control->name }}</td>
                                    <td colspan="3" style="color: #94a3b8; font-style: italic;">
                                        <span class="badge badge-none">Sin evidencias vinculadas</span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    @endforeach
</body>
</html>