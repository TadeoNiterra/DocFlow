<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>F-IT-22 Evaluación de Seguridad con Proveedores</title>
    <style>
        @page {
            margin: 15px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 7.5px;
            color: #000000;
            line-height: 1.1;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        th,
        td {
            border: 1px solid #0F2537;
            padding: 3px 4px;
            vertical-align: middle;
        }

        .header-gray {
            background-color: #D9D9D9;
        }

        .navy-header {
            background-color: #0F2537;
            color: #FFFFFF;
            font-weight: bold;
            text-align: center;
        }

        .section-bar {
            background-color: #8EA9DB;
            color: #0F2537;
            font-weight: bold;
            text-align: left;
        }

        .sub-bar {
            background-color: #D9E1F2;
            font-weight: bold;
            text-align: left;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        .bg-red {
            background-color: #FF0000;
            color: #FFFFFF;
            font-weight: bold;
        }

        .bg-yellow {
            background-color: #FFFF00;
            color: #000000;
            font-weight: bold;
        }

        .bg-green {
            background-color: #92D050;
            color: #000000;
            font-weight: bold;
        }

        .scoring-guide td {
            text-align: center;
            font-size: 7px;
            padding: 3px;
        }

        .checkbox-box {
            display: inline-block;
            width: 8px;
            height: 8px;
            border: 1px solid #0F2537;
            text-align: center;
            line-height: 8px;
            font-size: 7px;
        }
    </style>
</head>

<body>

    <!-- 1. BLOQUE SUPERIOR -->
    <table>
        <tr>
            <td style="width: 15%;" class="header-gray bold center">Código:</td>
            <td style="width: 35%;" class="center bold">F-IT-22 Rev. 0</td>
            <td style="width: 15%;" class="header-gray bold center">Emisión:</td>
            <td style="width: 35%;" class="center">31-03-2025</td>
        </tr>
        <tr>
            <td class="header-gray bold center">Nombre:</td>
            <td colspan="3" class="center bold" style="font-size: 9px;">Evaluación de seguridad con proveedores</td>
        </tr>
    </table>

    <!-- 2. DATOS DEL PROVEEDOR Y AUDITORÍA -->
    <table>
        <tr>
            <td style="width: 50%;" class="bold">
                PROVEEDOR: <span
                    style="font-weight: normal;">{{ $evaluation->supplier_name ?? ($evaluation->proveedor?->nombre ?? 'N/A') }}</span>
            </td>
            <td style="width: 50%;" class="bold">
                REPRESENTANTE DEL PROVEEDOR: <span
                    style="font-weight: normal;">{{ $evaluation->supplier_representative ?? 'N/A' }}</span>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="header-gray bold">TYPE OF AUDIT:</td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <span class="checkbox-box">{{ $evaluation->audit_type === 'precalificacion' ? 'X' : '' }}</span>
                Precalificación
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="checkbox-box">{{ $evaluation->audit_type === 'autoevaluacion' ? 'X' : '' }}</span>
                Autoevaluación
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="checkbox-box">{{ $evaluation->audit_type === 'otro' ? 'X' : '' }}</span> Otro:
                {{ $evaluation->audit_type_other }}
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 35%;">Fecha de evaluación:
                <b>{{ $evaluation->evaluation_date ? \Carbon\Carbon::parse($evaluation->evaluation_date)->format('d-m-Y') : 'N/A' }}</b>
            </td>
            <td style="width: 30%;" class="center">SCORE Objetivo: <b
                    style="color: blue;">{{ $evaluation->target_score ?? 85 }}</b></td>
            <td style="width: 35%;" class="right">SCORE Anterior: <b>{{ $evaluation->previous_score ?? 'N/A' }}</b>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 60%;">NOMBRE DEL EVALUADOR: <b>{{ $evaluation->evaluator_name ?? 'N/A' }}</b></td>
            <td style="width: 40%;">TELEPHONE #: <b>{{ $evaluation->telephone ?? 'N/A' }}</b></td>
        </tr>
        <tr>
            <td style="width: 50%;">Declaración de trabajo (SOW): <b>{{ $evaluation->sow ?? 'N/A' }}</b></td>
            <td style="width: 50%;">Acuerdo de nivel de servicio (SLA): <b>{{ $evaluation->sla ?? 'N/A' }}</b></td>
        </tr>
        <tr>
            <td style="width: 50%;">PERIODO DE EVALUACIÓN: <b>{{ $evaluation->evaluation_period ?? 'N/A' }}</b></td>
            <td style="width: 50%;">MOTIVO DE EVALUACIÓN: <b>{{ $evaluation->evaluation_reason ?? 'N/A' }}</b></td>
        </tr>
    </table>

    <!-- 3. SCORE Y PORCENTAJE GENERAL -->
    <table>
        <tr>
            <td style="width: 40%;" class="header-gray bold">ACTUAL SCORE:</td>
            <td style="width: 10%;" class="center bold" style="font-size: 11px;">{{ $evaluation->actual_score ?? 0 }}
            </td>
            <td style="width: 25%;" class="header-gray bold">PERCENT:</td>
            <td style="width: 25%; font-size: 11px;"
                class="center {{ ($evaluation->percentage ?? 0) >= 76 ? 'bg-green' : (($evaluation->percentage ?? 0) >= 25 ? 'bg-yellow' : 'bg-red') }}">
                {{ number_format($evaluation->percentage ?? 0, 0) }}%
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 50%;">
                ¿SE REQUIEREN MEDIDAS DE REMEDIACIÓN?
                &nbsp;&nbsp;<b>{{ $evaluation->requires_remediation ? 'YES' : 'NO' }}</b>
            </td>
            <td style="width: 50%;">
                FECHA LÍMITE DE MEDIDAS DE REMEDIACIÓN:
                <b>{{ $evaluation->remediation_deadline ? \Carbon\Carbon::parse($evaluation->remediation_deadline)->format('d-m-Y') : 'N/A' }}</b>
            </td>
        </tr>
    </table>

    <!-- 4. FIRMAS -->
    <table>
        <tr>
            <td colspan="2" class="header-gray bold">SIGNATURES:</td>
        </tr>
        <tr>
            <td style="width: 70%;">NOMBRE DEL EVALUADOR: <b>{{ $evaluation->evaluator_name ?? 'N/A' }}</b></td>
            <td style="width: 30%;">DATE:
                <b>{{ $evaluation->evaluation_date ? \Carbon\Carbon::parse($evaluation->evaluation_date)->format('d-m-Y') : 'N/A' }}</b>
            </td>
        </tr>
        <tr>
            <td>NOMBRE DEL REPRESENTANTE DEL PROVEEDOR: <b>{{ $evaluation->supplier_representative ?? 'N/A' }}</b></td>
            <td>DATE:
                <b>{{ $evaluation->evaluation_date ? \Carbon\Carbon::parse($evaluation->evaluation_date)->format('d-m-Y') : 'N/A' }}</b>
            </td>
        </tr>
    </table>

    <!-- 5. ANTECEDENTES DEL PROVEEDOR -->
    <table>
        <tr>
            <th colspan="2" class="header-gray bold center">ANTECEDENTES DEL PROVEEDOR</th>
            <th style="width: 15%;" class="header-gray bold center">Answer: (Yes / No)</th>
        </tr>
        <tr>
            <td style="width: 5%;" class="center bold">A</td>
            <td>Cuenta con alguna certificación vigente relacionada con seguridad de la información (ISO 27001, TISAX,
                COBIT, ISACA)</td>
            <td class="center">{{ $evaluation->bg_has_certifications ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <td class="center bold">B</td>
            <td>¿Cuánto tiempo lleva en el mercado?</td>
            <td class="center">{{ $evaluation->bg_market_time ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td class="center bold">E</td>
            <td>¿Cuenta con canales de soporte técnico activas?</td>
            <td class="center">{{ $evaluation->bg_has_support_channels ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <td class="center bold">F</td>
            <td>¿Cuenta con soporte técnico 24/7/365?</td>
            <td class="center">{{ $evaluation->bg_has_247_support ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <td colspan="3">Comments: <b>{{ $evaluation->bg_comments ?? 'Sin comentarios' }}</b></td>
        </tr>
    </table>

    <!-- 6. MATRIZ DE CRITERIOS DE SCORING -->
    <table>
        <tr>
            <th colspan="4" class="navy-header">SCORING</th>
        </tr>
        <tr class="scoring-guide">
            <td style="width: 25%;" class="bg-red">0</td>
            <td style="width: 25%; background-color: #FCE4D6;">1</td>
            <td style="width: 25%; background-color: #FFF2CC;">2</td>
            <td style="width: 25%; background-color: #E2EFDA;">3</td>
        </tr>
        <tr class="scoring-guide">
            <td>NO cuenta con antecedentes del control</td>
            <td>Demuestra la aplicación empírica y/o documental, sin embargo, no hay evidencias claras o actualizadas
            </td>
            <td>Demuestra la implementación de procesos e/o infraestructura para demostrar la aplicación del control
            </td>
            <td>Demuestra la implementación de procesos e infraestructura para demostrar la efectividad del control</td>
        </tr>
    </table>

    <!-- 7. CUESTIONARIO COMPLETO (10 ÍTEMS) -->
    <table>
        <thead>
            <tr class="header-gray bold">
                <th style="width: 10%;" class="center">SECTION</th>
                <th style="width: 80%;" class="center">ITEM</th>
                <th style="width: 10%;" class="center">SCORE</th>
            </tr>
        </thead>
        <tbody>
            <!-- SECCIÓN 1 -->
            <tr>
                <td rowspan="2" class="center bold" style="font-size: 14px;">1</td>
                <td class="sub-bar">CERTIFICACIONES</td>
                <td
                    class="center {{ ($evaluation->sec1_percent ?? 0) >= 76 ? 'bg-green' : (($evaluation->sec1_percent ?? 0) >= 25 ? 'bg-yellow' : 'bg-red') }}">
                    {{ number_format($evaluation->sec1_percent ?? 0, 0) }}%
                </td>
            </tr>
            <tr>
                <td>1. ¿Cuenta con certificaciones relacionadas con seguridad de la información?</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->q1_score ?? 0 }}</td>
            </tr>

            <!-- SECCIÓN 2 -->
            <tr>
                <td rowspan="4" class="center bold" style="font-size: 14px;">2</td>
                <td class="sub-bar">CONTROL DE ACCESOS FÍSICOS</td>
                <td
                    class="center {{ ($evaluation->sec2_percent ?? 0) >= 76 ? 'bg-green' : (($evaluation->sec2_percent ?? 0) >= 25 ? 'bg-yellow' : 'bg-red') }}">
                    {{ number_format($evaluation->sec2_percent ?? 0, 0) }}%
                </td>
            </tr>
            <tr>
                <td>2. ¿Cuenta con políticas de control de accesos o seguridad física?</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->q2_score ?? 0 }}</td>
            </tr>
            <tr>
                <td>3. ¿Cuenta con algún mecanismo de registro de visitantes o externos?</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->q3_score ?? 0 }}</td>
            </tr>
            <tr>
                <td>4. ¿Cuenta con infraestructuras de control de accesos físicos (Cerrojos, biométricos, tarjeta de
                    proximidad)?</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->q4_score ?? 0 }}</td>
            </tr>

            <!-- SECCIÓN 3 -->
            <tr>
                <td rowspan="4" class="center bold" style="font-size: 14px;">3</td>
                <td class="sub-bar">CONTROL DE ACCESOS LÓGICOS</td>
                <td
                    class="center {{ ($evaluation->sec3_percent ?? 0) >= 76 ? 'bg-green' : (($evaluation->sec3_percent ?? 0) >= 25 ? 'bg-yellow' : 'bg-red') }}">
                    {{ number_format($evaluation->sec3_percent ?? 0, 0) }}%
                </td>
            </tr>
            <tr>
                <td>5. Cuenta con políticas de control de accesos lógicos o a sistemas?</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->q5_score ?? 0 }}</td>
            </tr>
            <tr>
                <td>6. Cuenta con algún medio de autentificación según la cantidad de licencias o usuarios contratados?
                </td>
                <td class="center bold" style="color: blue;">{{ $evaluation->q6_score ?? 0 }}</td>
            </tr>
            <tr>
                <td>7. Se tienen definidos los medios de recuperación de usuarios?</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->q7_score ?? 0 }}</td>
            </tr>

            <!-- SECCIÓN 4 -->
            <tr>
                <td rowspan="2" class="center bold" style="font-size: 14px;">4</td>
                <td class="sub-bar">SEGURIDAD EN EL INTERCAMBIO DE INFORMACIÓN</td>
                <td
                    class="center {{ ($evaluation->sec4_percent ?? 0) >= 76 ? 'bg-green' : (($evaluation->sec4_percent ?? 0) >= 25 ? 'bg-yellow' : 'bg-red') }}">
                    {{ number_format($evaluation->sec4_percent ?? 0, 0) }}%
                </td>
            </tr>
            <tr>
                <td>8. El intercambio de información se realiza a través de un dominio protegido</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->q8_score ?? 0 }}</td>
            </tr>

            <!-- SECCIÓN 5 -->
            <tr>
                <td rowspan="3" class="center bold" style="font-size: 14px;">5</td>
                <td class="sub-bar">COMPLIANCE</td>
                <td
                    class="center {{ ($evaluation->sec5_percent ?? 0) >= 76 ? 'bg-green' : (($evaluation->sec5_percent ?? 0) >= 25 ? 'bg-yellow' : 'bg-red') }}">
                    {{ number_format($evaluation->sec5_percent ?? 0, 0) }}%
                </td>
            </tr>
            <tr>
                <td>9. Tiene disponible la información legal o contractual sobre los servicios o productos contratados?
                </td>
                <td class="center bold" style="color: blue;">{{ $evaluation->q9_score ?? 0 }}</td>
            </tr>
            <tr>
                <td>10. Cuenta con un aviso de privacidad actualizado y visible</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->q10_score ?? 0 }}</td>
            </tr>
        </tbody>
    </table>

    <!-- 8. RESUMEN DE PUNTUACIÓN POR SECCIONES Y TOTALES -->
    <table>
        <thead>
            <tr class="header-gray bold">
                <th colspan="2" style="width: 50%;" class="center">SECTION</th>
                <th style="width: 15%;" class="center">TOTAL POINTS POSSIBLE</th>
                <th style="width: 20%;" class="center">ACTUAL POINTS SCORED BY SECTION</th>
                <th style="width: 15%;" class="center">PERCENTAGE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 5%;" class="center bold">1</td>
                <td>CERTIFICACIONES</td>
                <td class="center">3</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->sec1_score ?? 0 }}</td>
                <td
                    class="center {{ ($evaluation->sec1_percent ?? 0) >= 76 ? 'bg-green' : (($evaluation->sec1_percent ?? 0) >= 25 ? 'bg-yellow' : 'bg-red') }}">
                    {{ number_format($evaluation->sec1_percent ?? 0, 0) }}%
                </td>
            </tr>
            <tr>
                <td class="center bold">2</td>
                <td>CONTROLES DE ACCESO FÍSICOS</td>
                <td class="center">9</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->sec2_score ?? 0 }}</td>
                <td
                    class="center {{ ($evaluation->sec2_percent ?? 0) >= 76 ? 'bg-green' : (($evaluation->sec2_percent ?? 0) >= 25 ? 'bg-yellow' : 'bg-red') }}">
                    {{ number_format($evaluation->sec2_percent ?? 0, 0) }}%
                </td>
            </tr>
            <tr>
                <td class="center bold">3</td>
                <td>CONTROLES DE ACCESOS LÓGICOS</td>
                <td class="center">9</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->sec3_score ?? 0 }}</td>
                <td
                    class="center {{ ($evaluation->sec3_percent ?? 0) >= 76 ? 'bg-green' : (($evaluation->sec3_percent ?? 0) >= 25 ? 'bg-yellow' : 'bg-red') }}">
                    {{ number_format($evaluation->sec3_percent ?? 0, 0) }}%
                </td>
            </tr>
            <tr>
                <td class="center bold">4</td>
                <td>SEGURIDAD EN EL INTERCAMBIO DE INFORMACIÓN</td>
                <td class="center">3</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->sec4_score ?? 0 }}</td>
                <td
                    class="center {{ ($evaluation->sec4_percent ?? 0) >= 76 ? 'bg-green' : (($evaluation->sec4_percent ?? 0) >= 25 ? 'bg-yellow' : 'bg-red') }}">
                    {{ number_format($evaluation->sec4_percent ?? 0, 0) }}%
                </td>
            </tr>
            <tr>
                <td class="center bold">5</td>
                <td>COMPLIANCE</td>
                <td class="center">6</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->sec5_score ?? 0 }}</td>
                <td
                    class="center {{ ($evaluation->sec5_percent ?? 0) >= 76 ? 'bg-green' : (($evaluation->sec5_percent ?? 0) >= 25 ? 'bg-yellow' : 'bg-red') }}">
                    {{ number_format($evaluation->sec5_percent ?? 0, 0) }}%
                </td>
            </tr>
            <tr class="header-gray bold">
                <td colspan="2" class="bold">TOTALS:</td>
                <td class="center">30</td>
                <td class="center bold" style="color: blue;">{{ $evaluation->actual_score ?? 0 }}</td>
                <td
                    class="center {{ ($evaluation->percentage ?? 0) >= 76 ? 'bg-green' : (($evaluation->percentage ?? 0) >= 25 ? 'bg-yellow' : 'bg-red') }}">
                    {{ number_format($evaluation->percentage ?? 0, 0) }}%
                </td>
            </tr>
        </tbody>
    </table>

    <!-- 9. GUÍA DE DICTAMEN -->
    <table>
        <tr>
            <td style="width: 45%;" class="bg-green center">Proveedor Calificado</td>
            <td rowspan="3" style="width: 25%;" class="center bold">
                SCORING<br>GUIDELINES
            </td>
            <td style="width: 20%;" class="center">76 to 100%</td>
            <td style="width: 10%;" class="center bg-green">G</td>
        </tr>
        <tr>
            <td class="bg-yellow center">El proveedor sujeto a mejora</td>
            <td class="center">25 to 75%</td>
            <td class="center bg-yellow">Y</td>
        </tr>
        <tr>
            <td class="bg-red center">El proveedor requiere de una evaluación extraordinaria</td>
            <td class="center">25 or LESS</td>
            <td class="center bg-red">R</td>
        </tr>
    </table>

    <!-- 10. ACCIONES CORRECTIVAS -->
    @if (isset($evaluation->correctiveActions) && $evaluation->correctiveActions->count() > 0)
        <table>
            <thead>
                <tr class="header-gray bold">
                    <th colspan="6" class="center">CORRECTIVE ACTIONS</th>
                </tr>
                <tr class="header-gray bold">
                    <th style="width: 8%;" class="center">ITEM</th>
                    <th style="width: 32%;">CONCERN</th>
                    <th style="width: 32%;">ACTION</th>
                    <th style="width: 14%;">RESPONSIBLE</th>
                    <th style="width: 7%;" class="center">START DATE</th>
                    <th style="width: 7%;" class="center">CLOSE DATE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluation->correctiveActions as $action)
                    <tr>
                        <td class="center bold">{{ $action->item ?? $loop->iteration }}</td>
                        <td>{{ $action->concern }}</td>
                        <td>{{ $action->action }}</td>
                        <td>{{ $action->responsible }}</td>
                        <td class="center">
                            {{ $action->start_date ? \Carbon\Carbon::parse($action->start_date)->format('d-m-Y') : 'N/A' }}
                        </td>
                        <td class="center">
                            {{ $action->close_date ? \Carbon\Carbon::parse($action->close_date)->format('d-m-Y') : 'N/A' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>

</html>
