<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CHECKLIST DE EQUIPO DE COMPUTO</title>
    <style>
        @page {
            margin: 110px 30px 40px 30px;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #111;
        }

        header {
            position: fixed;
            top: -95px;
            left: 0px;
            right: 0px;
            height: 80px;
            text-align: center;
        }

        header img {
            width: 80%;
            height: auto;
            max-height: 70px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        table.bordered,
        table.bordered th,
        table.bordered td {
            border: 1px solid #000;
        }

        th, td {
            padding: 3px 5px;
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-bold {
            font-weight: bold;
        }

        .vertical-text {
            writing-mode: vertical-lr;
            transform: rotate(270deg);
            text-align: center;
            font-weight: bold;
            font-size: 10px;
        }

        .bg-green {
            background-color: #28a745;
            color: #ffffff;
            font-weight: bold;
            text-align: center;
        }

        .bg-yellow {
            background-color: #ffc107;
            color: #000000;
            font-weight: bold;
            text-align: center;
        }

        .bg-gray {
            background-color: #6c757d;
            color: #ffffff;
            font-weight: bold;
            text-align: center;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
@foreach ($checklists as $item)
    <header>
        @php
            $headerPath = public_path('img/encabezado.jpg');
        @endphp
        @if (file_exists($headerPath))
            <img src="{{ $headerPath }}" alt="Logo Corporativo">
        @endif
    </header>

    {{-- Encabezado SGSI --}}
    <table class="bordered">
        <tr>
            <td style="width: 15%; font-size: 11px;" class="text-bold">Código:</td>
            <td style="width: 35%; font-size: 11px;">F-IT-03 Rev. 0</td>
            <td style="width: 15%; font-size: 11px;" class="text-bold">Emisión:</td>
            <td style="width: 35%; font-size: 11px;">01-DIC-2023</td>
        </tr>
        <tr>
            <td style="font-size: 11px;" class="text-bold">Nombre:</td>
            <td colspan="3" class="text-center text-bold" style="font-size: 13px; text-transform: uppercase;">
                Checklist de Equipo de Cómputo ({{ $item->folio }})
            </td>
        </tr>
    </table>

    {{-- Datos Generales del Colaborador y Equipo --}}
    <table style="border: none; margin-bottom: 8px;">
        <tr>
            <td style="border: none; width: 12%; font-weight: bold;">Usuario:</td>
            <td style="border-bottom: 1px solid #000; width: 30%;">{{ $item->nombre_usuario ?? $item->colaborador?->name . ' ' . $item->colaborador?->lastname }}</td>
            
            <td style="border: none; width: 10%; font-weight: bold;">Equipo:</td>
            <td style="border-bottom: 1px solid #000; width: 25%;">
                {{ $item->dispositivo?->numero_serie ?? $item->dispositivo?->imei ?? 'S/N' }}
                @if($item->dispositivo?->modeloEquipo)
                    ({{ $item->dispositivo->modeloEquipo->marca }} {{ $item->dispositivo->modeloEquipo->modelo }})
                @endif
            </td>

            <td style="border: none; width: 8%; font-weight: bold;">Fecha:</td>
            <td style="border-bottom: 1px solid #000; width: 15%;">{{ \Carbon\Carbon::parse($item->fecha)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td style="border: none; font-weight: bold;">Acción:</td>
            <td style="border-bottom: 1px solid #000;">{{ $item->accion }}</td>

            <td style="border: none; font-weight: bold;">Accesorios:</td>
            <td style="border-bottom: 1px solid #000;">
                {{ $item->accion === 'MANTENIMIENTO' ? 'No aplica' : ($item->accesorios ?? 'Ninguno') }}
            </td>

            <td style="border: none; font-weight: bold;">Área:</td>
            <td style="border-bottom: 1px solid #000;">{{ $item->colaborador?->departamento?->nombre ?? 'Niterra' }}</td>
        </tr>
    </table>

    {{-- Matriz de Inspección: Hardware, Software y Seguridad --}}
    <table class="bordered">
        {{-- HARDWARE --}}
        <tr>
            <td rowspan="8" style="width: 5%; text-align: center; vertical-align: middle;">
                <p class="vertical-text">Hardware</p>
            </td>
            <td style="width: 65%; font-weight: bold;">Puntos de Inspección Física y Funcional</td>
            <td style="width: 12%; text-align: center; font-weight: bold;">C, NC, NA</td>
            <td style="width: 18%; font-weight: bold;">Observaciones</td>
        </tr>
        <tr>
            <td>Inspección física (accesorios asignados completos)</td>
            <td class="{{ $item->hw_accesorios_completos === 'C' ? 'bg-green' : ($item->hw_accesorios_completos === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->hw_accesorios_completos ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Inspección funcional (todas las partes del equipo funcionan)</td>
            <td class="{{ $item->hw_partes_funcionan === 'C' ? 'bg-green' : ($item->hw_partes_funcionan === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->hw_partes_funcionan ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Inspección operativa (el equipo enciende correctamente)</td>
            <td class="{{ $item->hw_enciende_bien === 'C' ? 'bg-green' : ($item->hw_enciende_bien === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->hw_enciende_bien ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Estado de carcasa del equipo (sin golpes, sin rasguños)</td>
            <td class="{{ $item->hw_carcasa_estado === 'C' ? 'bg-green' : ($item->hw_carcasa_estado === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->hw_carcasa_estado ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Estado de los accesorios asignados (cargador, mouse, base)</td>
            <td class="{{ $item->hw_accesorios_estado === 'C' ? 'bg-green' : ($item->hw_accesorios_estado === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->hw_accesorios_estado ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Limpieza general del equipo</td>
            <td class="{{ $item->hw_limpieza === 'C' ? 'bg-green' : ($item->hw_limpieza === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->hw_limpieza ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">Otros: {{ $item->hw_otros ?? 'Ninguno' }}</td>
        </tr>

        {{-- SOFTWARE --}}
        <tr>
            <td rowspan="7" style="text-align: center; vertical-align: middle;">
                <p class="vertical-text">Software</p>
            </td>
            <td>Inspección física (programas instalados completos)</td>
            <td class="{{ $item->sw_programas_completos === 'C' ? 'bg-green' : ($item->sw_programas_completos === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->sw_programas_completos ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Inspección funcional (programas principales se ejecutan correctamente)</td>
            <td class="{{ $item->sw_programas_principales === 'C' ? 'bg-green' : ($item->sw_programas_principales === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->sw_programas_principales ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Inspección operativa (programas secundarios se ejecutan correctamente)</td>
            <td class="{{ $item->sw_programas_secundarios === 'C' ? 'bg-green' : ($item->sw_programas_secundarios === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->sw_programas_secundarios ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>MFA Office desbloqueado / revisado</td>
            <td class="{{ $item->seg_mfa_desbloqueado === 'C' ? 'bg-green' : ($item->seg_mfa_desbloqueado === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->seg_mfa_desbloqueado ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Bloqueo de configuración de antivirus</td>
            <td class="{{ $item->seg_antivirus_bloqueado === 'C' ? 'bg-green' : ($item->seg_antivirus_bloqueado === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->seg_antivirus_bloqueado ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Limpieza de historial de navegaciones y Cookies</td>
            <td class="{{ $item->sw_limpieza_cookies_historial === 'C' ? 'bg-green' : ($item->sw_limpieza_cookies_historial === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->sw_limpieza_cookies_historial ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Revisión de software (autorizado por la empresa)</td>
            <td class="{{ $item->sw_autorizado === 'C' ? 'bg-green' : ($item->sw_autorizado === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->sw_autorizado ?? 'NA' }}
            </td>
            <td></td>
        </tr>

        {{-- SEGURIDAD --}}
        <tr>
            <td rowspan="5" style="text-align: center; vertical-align: middle;">
                <p class="vertical-text">Seguridad</p>
            </td>
            <td>Respaldo de la información local</td>
            <td class="{{ $item->sw_respaldo_local === 'C' ? 'bg-green' : ($item->sw_respaldo_local === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->sw_respaldo_local ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Revisión de permisos, derechos y privilegios (F-IT-02 Matriz SGSI)</td>
            <td class="{{ $item->seg_derechos_privilegios === 'C' ? 'bg-green' : ($item->seg_derechos_privilegios === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->seg_derechos_privilegios ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Revisión de espacio de almacenamiento local</td>
            <td class="{{ $item->sw_espacio_almacenamiento === 'C' ? 'bg-green' : ($item->sw_espacio_almacenamiento === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->sw_espacio_almacenamiento ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Revisión de velocidad de respuesta del equipo</td>
            <td class="{{ $item->sw_velocidad_respuesta === 'C' ? 'bg-green' : ($item->sw_velocidad_respuesta === 'NC' ? 'bg-yellow' : 'bg-gray') }}">
                {{ $item->sw_velocidad_respuesta ?? 'NA' }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">Otros: {{ $item->seg_otros ?? 'Ninguno' }}</td>
        </tr>
    </table>

    {{-- Observaciones y Bloque de Firmas --}}
    <table style="width: 100%; border: none; margin-top: 5px;">
        <tr>
            <td style="width: 60%; vertical-align: top; border: none; padding: 0 10px 0 0;">
                <table class="bordered">
                    <tr>
                        <th style="background-color: #f2f2f2;">OBSERVACIONES GENERALES DEL EQUIPO</th>
                    </tr>
                    <tr>
                        <td style="height: 120px; vertical-align: top;">
                            {{ $item->observaciones ?? 'No se encontraron observaciones adicionales.' }}
                        </td>
                    </tr>
                </table>
                <p style="font-size: 10px; margin-top: 8px;">
                    <strong>C</strong> = Cumple | <strong>NC</strong> = No Cumple | <strong>NA</strong> = No Aplica
                </p>
            </td>

            <td style="width: 40%; vertical-align: top; border: none; padding: 0;">
                <table class="bordered">
                    <tr>
                        <th class="text-center" style="background-color: #e0e0e0;">Usuario del equipo</th>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-size: 10px;">{{ $item->nombre_usuario ?? $item->colaborador?->name }}</td>
                    </tr>
                    <tr>
                        <td class="text-center" style="height: 25px; vertical-align: middle;">
                            @if ($item->accion === 'MANTENIMIENTO')
                                <span style="font-style: italic; color: #555;">Firma no necesaria</span>
                            @else
                                &nbsp;
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="text-center" style="background-color: #e0e0e0;">Jefe directo</th>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-size: 10px;">
                            {{ ($item->accion === 'MANTENIMIENTO' || $item->accion === 'CAMBIO') ? 'NA' : ($item->nombre_jefe_directo ?? 'NA') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" style="height: 25px; vertical-align: middle;">
                            @if ($item->accion === 'MANTENIMIENTO' || $item->accion === 'CAMBIO')
                                <span style="font-style: italic; color: #555;">Firma no necesaria</span>
                            @else
                                &nbsp;
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th class="text-center" style="background-color: #e0e0e0;">Sistemas TI</th>
                    </tr>
                    <tr>
                        <td class="text-center" style="font-size: 10px;">{{ $item->nombre_sistemas ?? 'Sistemas' }}</td>
                    </tr>
                    <tr>
                        <td class="text-center" style="height: 25px; vertical-align: middle;">
                            @if ($item->accion === 'MANTENIMIENTO')
                                <span style="font-style: italic; color: #555;">Firma no necesaria</span>
                            @else
                                &nbsp;
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    @if (!$loop->last)
        <div class="page-break"></div>
    @endif
@endforeach
</body>
</html>