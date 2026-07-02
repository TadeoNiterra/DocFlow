<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>F-IT-04 {{ $record->folio }}</title>
    <style>
        @page {
            margin: 20px 25px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
            color: #000;
        }

        /* Encabezado Corporativo */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .company-title {
            font-size: 20px;
            font-weight: bold;
            color: #008779;
            /* Verde Niterra */
        }

        .company-subtitle {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .sgsi-box {
            border: 1px solid #000;
            border-collapse: collapse;
            width: 100%;
        }

        .sgsi-box td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
            font-size: 10px;
        }

        .sgsi-label {
            background-color: #008779;
            color: white;
            font-weight: bold;
        }

        .doc-title {
            text-align: center;
            font-weight: bold;
            font-size: 13px;
            margin: 10px 0 20px 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Tabla de Datos de Registro */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .data-table td {
            border: 1px solid #000;
            padding: 7px 10px;
        }

        .field-label {
            width: 35%;
            font-weight: bold;
            background-color: #f4f6f8;
        }

        .field-value {
            width: 65%;
        }

        /* Firmas al pie de página 1 */
        .signatures-table {
            width: 100%;
            margin-top: 50px;
            border-collapse: collapse;
        }

        .signatures-table td {
            width: 50%;
            text-align: center;
            vertical-align: bottom;
        }

        .signature-line {
            width: 75%;
            margin: 0 auto;
            border-top: 1px solid #000;
            padding-top: 5px;
            font-weight: bold;
            font-size: 11px;
        }

        .signature-subtext {
            font-weight: normal;
            font-size: 10px;
            color: #444;
            margin-top: 3px;
        }

        /* Salto de página para Anexo de Evidencias */
        .page-break {
            page-break-before: always;
        }

        /* Galería de Evidencias Fotográficas */
        .gallery-container {
            width: 100%;
            margin-top: 15px;
        }

        .gallery-item {
            width: 48%;
            display: inline-block;
            vertical-align: top;
            margin-bottom: 20px;
            text-align: center;
        }

        .gallery-img {
            max-width: 100%;
            height: 220px;
            object-fit: contain;
            border: 1px solid #ccc;
            padding: 4px;
            background-color: #fff;
        }

        .gallery-caption {
            font-size: 10px;
            font-weight: bold;
            margin-top: 5px;
            color: #333;
        }
    </style>
</head>

<body>

    <!-- ==================== PÁGINA 1: FORMATO F-IT-04 ==================== -->
    <table class="header-table">
        <tr>
            <td style="width: 55%;">
                @php
                    $headerImgExists = \Illuminate\Support\Facades\Storage::disk('local')->exists('encabezado.jpg');
                @endphp

                @if ($headerImgExists)
                    @php
                        $headerContent = \Illuminate\Support\Facades\Storage::disk('local')->get('encabezado.jpg');
                        $headerBase64 = base64_encode($headerContent);
                        $headerMime = \Illuminate\Support\Facades\Storage::disk('local')->mimeType('encabezado.jpg');
                    @endphp
                    <img src="data:{{ $headerMime }};base64,{{ $headerBase64 }}"
                        style="max-width: 100%; height: auto; max-height: 50px;">
                @else
                    <!-- Fallback por si la imagen no existe en la carpeta -->
                    <span class="company-title">Niterra</span>
                    <span class="company-subtitle">Niterra México, S.A. de C.V.</span>
                @endif
            </td>
            <td style="width: 45%;">
                <table class="sgsi-box">
                    <tr>
                        <td class="sgsi-label">Código:</td>
                        <td>F-IT-04 Rev. 0</td>
                        <td class="sgsi-label">Emisión:</td>
                        <td>01-dic-2023</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="doc-title">
        FORMATO DE DESMANTELAMIENTO Y ELIMINACIÓN
    </div>

    <table class="data-table">
        <tr>
            <td class="field-label">Folio:</td>
            <td class="field-value"><strong>{{ $record->folio }}</strong></td>
        </tr>
        <tr>
            <td class="field-label">Fecha de eliminación:</td>
            <td class="field-value">{{ $record->fecha_eliminacion?->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td class="field-label">Nombre de puesto de trabajo:</td>
            <td class="field-value">{{ $record->nombre_puesto }}</td>
        </tr>
        <tr>
            <td class="field-label">Nombre de la maquina:</td>
            <td class="field-value">{{ $record->nombre_maquina }}</td>
        </tr>
        <tr>
            <td class="field-label">Service Tag - Num Serie:</td>
            <td class="field-value">{{ $record->num_serie }}</td>
        </tr>
        <tr>
            <td class="field-label">Carpetas a respaldar:</td>
            <td class="field-value">{{ $record->carpeta_respaldo ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td class="field-label">Dispositivo físico o virtual:</td>
            <td class="field-value">{{ $record->tipo_dispositivo }}</td>
        </tr>
        <tr>
            <td class="field-label">Tipo de dispositivo:</td>
            <td class="field-value">{{ $record->dispositivo }}</td>
        </tr>
        <tr>
            <td class="field-label">Destruccion total o reutilizable:</td>
            <td class="field-value">{{ $record->tratamiento }}</td>
        </tr>
    </table>

    <table class="signatures-table">
        <tr>
            <td>
                <div class="signature-line">
                    FIRMA SOPORTE IT
                    <div class="signature-subtext">{{ $record->Creador?->name }}</div>
                </div>
            </td>
            <td>
                <div class="signature-line">
                    FIRMA GERENCIA
                    <div class="signature-subtext">{{ $record->nombre_gerente }}</div>
                </div>
            </td>
        </tr>
    </table>


    <!-- ==================== PÁGINA 2: EVIDENCIAS FOTOGRÁFICAS ==================== -->
    @if ($record->evidencias && $record->evidencias->count() > 0)
        <div class="page-break"></div>

        <!-- Encabezado de la página de evidencias -->
        <table class="header-table">
            <tr>
                <td style="width: 55%;">
                    @php
                        $headerImgExists = \Illuminate\Support\Facades\Storage::disk('local')->exists('encabezado.jpg');
                    @endphp

                    @if ($headerImgExists)
                        @php
                            $headerContent = \Illuminate\Support\Facades\Storage::disk('local')->get('encabezado.jpg');
                            $headerBase64 = base64_encode($headerContent);
                            $headerMime = \Illuminate\Support\Facades\Storage::disk('local')->mimeType(
                                'encabezado.jpg',
                            );
                        @endphp
                        <img src="data:{{ $headerMime }};base64,{{ $headerBase64 }}"
                            style="max-width: 100%; height: auto; max-height: 50px;">
                    @else
                        <!-- Fallback por si la imagen no existe en la carpeta -->
                        <span class="company-title">Niterra</span>
                        <span class="company-subtitle">Niterra México, S.A. de C.V.</span>
                    @endif
                </td>
                <td style="width: 45%;">
                    <table class="sgsi-box">
                        <tr>
                            <td class="sgsi-label">Anexo:</td>
                            <td>Evidencias</td>
                            <td class="sgsi-label">Folio:</td>
                            <td>{{ $record->folio }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div class="doc-title">
            EVIDENCIAS FOTOGRÁFICAS DEL PROCESO DE DESMANTELAMIENTO
        </div>

        <div class="gallery-container">
            @foreach ($record->evidencias as $evidencia)
                @php
                    $exists = \Illuminate\Support\Facades\Storage::disk('local')->exists($evidencia->ruta_archivo);
                @endphp
                @if ($exists)
                    @php
                        $fileContent = \Illuminate\Support\Facades\Storage::disk('local')->get(
                            $evidencia->ruta_archivo,
                        );
                        $base64 = base64_encode($fileContent);
                        $mime = \Illuminate\Support\Facades\Storage::disk('local')->mimeType($evidencia->ruta_archivo);
                    @endphp
                    <div class="gallery-item">
                        <img class="gallery-img" src="data:{{ $mime }};base64,{{ $base64 }}">
                        <div class="gallery-caption">{{ $evidencia->nombre_archivo }}</div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif

</body>

</html>
