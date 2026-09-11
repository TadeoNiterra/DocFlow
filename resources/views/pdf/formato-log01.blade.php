<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>F-LOG-(T)-01 Rev. 04</title>
    <style>
        @page {
            margin: 80px 25px 50px 25px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 8px;
            color: #000;
            line-height: 1.15;
        }

        /* Encabezado fijo en todas las páginas */
        header {
            position: fixed;
            top: -65px;
            left: 0px;
            right: 0px;
            height: 55px;
        }

        /* Pie de página fijo */
        footer {
            position: fixed;
            bottom: -35px;
            left: 0px;
            right: 0px;
            height: 30px;
        }

        .page-number:before {
            content: counter(page);
        }

        /* Estilos de tablas */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 6px;
            page-break-inside: auto;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 2.5px 4px;
            vertical-align: middle;
        }

        .header-table td {
            border: 1px solid #000;
        }

        .header-title {
            font-size: 9px;
            font-weight: bold;
            text-align: center;
        }

        .section-title {
            font-weight: bold;
            background-color: #e6e6e6;
            padding: 3px 4px;
            border: 1px solid #000;
            margin-top: 4px;
            margin-bottom: 2px;
            font-size: 8.5px;
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

        .bg-gray {
            background-color: #f2f2f2;
        }

        .page-break {
            page-break-after: always;
        }

        .instructions {
            font-size: 7.5px;
            text-align: justify;
            padding: 4px;
            line-height: 1.1;
        }
    </style>
</head>

<body>

    <!-- ENCABEZADO REPETITIVO -->
    <header>
        <table class="header-table">
            <tr>
                <td width="20%" class="center bold" style="font-size: 11px;">Niterra</td>
                <td width="60%" class="header-title">
                    Niterra México, S.A. de C.V.<br>
                    SELECCIÓN, EVALUACIÓN Y RE-EVALUACIÓN DE PROVEEDOR
                </td>
                <td width="20%" class="center bold" style="font-size: 7.5px;">
                    F-LOG-(T)-01<br>
                    2024-06-28<br>
                    Rev. 4
                </td>
            </tr>
        </table>
    </header>

    <!-- PIE DE PÁGINA REPETITIVO -->
    <footer>
        <table style="border: none;">
            <tr style="border: none;">
                <td style="border: none;" width="33%">F-LOG-(T)-01 Rev. 4</td>
                <td style="border: none;" width="33%" class="center">Niterra México, S.A. de C.V.</td>
                <td style="border: none;" width="33%" class="right">Página <span class="page-number"></span></td>
            </tr>
        </table>
    </footer>

    <!-- ==================== PÁGINA 1 ==================== -->

    <!-- 1. INFORMACIÓN DEL PROVEEDOR -->
    <div class="section-title">1. Información del proveedor</div>
    <table>
        <tr>
            <td class="bold bg-gray" width="12%">Razón social:</td>
            <td colspan="3">{{ $proveedor->razonSocial ?? $proveedor->nombre }}</td>
            <td class="bold bg-gray" width="10%">Contacto:</td>
            <td colspan="3">{{ $proveedor->personaContacto }}</td>
        </tr>
        <tr>
            <td class="bold bg-gray">Teléfonos:</td>
            <td width="15%">{{ $proveedor->numeroContacto }}</td>
            <td class="bold bg-gray" width="8%">Celular:</td>
            <td width="15%">N/A</td>
            <td class="bold bg-gray">Fax:</td>
            <td width="12%">N/A</td>
            <td class="bold bg-gray" width="12%">Correo:</td>
            <td>{{ $proveedor->email }}</td>
        </tr>
        <tr>
            <td class="bold bg-gray">Domicilio:</td>
            <td colspan="3">{{ $proveedor->domicilio }}</td>
            <td class="bold bg-gray">Colonia:</td>
            <td colspan="3">{{ $proveedor->colonia }}</td>
        </tr>
        <tr>
            <td class="bold bg-gray">Delegación/Mun:</td>
            <td>{{ $proveedor->municipio }}</td>
            <td class="bold bg-gray">Ciudad:</td>
            <td>{{ $proveedor->ciudad }}</td>
            <td class="bold bg-gray">CP:</td>
            <td>{{ $proveedor->cp }}</td>
            <td class="bold bg-gray">País:</td>
            <td>{{ $proveedor->pais }}</td>
        </tr>
    </table>

    <table>
        <tr>
            <td class="bold bg-gray" width="10%">Área:</td>
            <td width="20%">{{ $evaluacion->area }}</td>
            <td class="bold bg-gray" width="25%">Seleccionar opción:</td>
            <td width="22%">[{{ $evaluacion->tipo ? 'X' : ' ' }}] Evaluación inicial</td>
            <td width="23%">[{{ !$evaluacion->tipo ? 'X' : ' ' }}] Re-evaluación</td>
        </tr>
        <tr>
            <td class="bold bg-gray">Fecha:</td>
            <td>{{ \Carbon\Carbon::parse($evaluacion->fecha)->format('d/m/Y') }}</td>
            <td class="bold bg-gray">Fecha evaluación anterior:</td>
            <td colspan="2">
                {{ $evaluacion->fechaAnterior ? \Carbon\Carbon::parse($evaluacion->fechaAnterior)->format('d/m/Y') : 'NA' }}
            </td>
        </tr>
        <tr>
            <td class="bold bg-gray">Producto/Servicio:</td>
            <td colspan="4">{{ $evaluacion->producto }}</td>
        </tr>
    </table>

    <div class="instructions">
        <b>Instrucciones:</b><br>
        La selección del proveedor se basa en los siguientes criterios: precio, respuesta, experiencia y condiciones de
        pago. Una vez seleccionado el proveedor, estará sujeto a evaluaciones y re-evaluaciones periódicas, en función
        del tipo de insumo o servicio, desempeño satisfactorio, opciones de proveedores y frecuencia de compra.<br>
        Todas las áreas que soliciten insumos y servicios participarán en la selección, evaluación y re-evaluación. Cada
        área participante marcará la característica que evalúa, en el renglón que le corresponde en el inciso 3. Este
        registro debe conservarse en el área solicitante.<br>
        Para todos aquellos proveedores que ya hayan trabajado para Niterra México antes de la fecha de implementación
        del SGC, se les exenta de la selección inicial, aunque estarán sujetos a evaluación y re-evaluación en su caso
        de acuerdo a la tabla al final del formato en función al impacto de su producto/servicio, frecuencia de compra y
        desempeño del proveedor. Para todos los proveedores nuevos a partir de la fecha indicada, estarán sujetos a
        selección, evaluación y re-evaluación.<br>
        Llenar una evaluación por proveedor. Este formato corresponde al desempeño global del proveedor y todos los
        productos y servicios que proporcione.
    </div>

    <!-- 2. RESULTADO DE SELECCIÓN -->
    <div class="section-title">2. Resultado de selección</div>
    <table>
        <tr>
            <td colspan="6" class="bg-gray">
                <b>Puntuación preliminar:</b> 2 Bueno / 1 Regular / 0 Malo<br>
                <b>Criterios de aceptación:</b> seleccionar al proveedor con puntaje más alto.
            </td>
        </tr>
        <tr class="bg-gray bold center">
            <td width="20%">Opción de proveedor</td>
            <td>Precio = Opción más económica</td>
            <td>Respuesta = Menor a 48 horas</td>
            <td>Experiencia en su ramo = 3 – 5 años</td>
            <td>Condiciones de pago = opciones de crédito</td>
            <td width="12%">TOTAL</td>
        </tr>
        <tr class="center">
            <td class="bold">{{ $proveedor->nombre }}</td>
            <td>{{ $evaluacion->precio }}</td>
            <td>{{ $evaluacion->respuesta }}</td>
            <td>{{ $evaluacion->experiencia ?? 2 }}</td>
            <td>{{ $evaluacion->pago }}</td>
            <td class="bold">{{ $totalPreliminar }} / 8</td>
        </tr>
        <tr>
            <td class="bold bg-gray">RESULTADO:</td>
            <td colspan="5" class="bold center">
                {{ $pctPreliminar >= 75 ? 'SELECCIONADO' : 'NO SELECCIONADO' }}
            </td>
        </tr>
    </table>

    <div class="page-break"></div>

    <!-- ==================== PÁGINA 2 Y 3 ==================== -->

    <!-- 3. RESULTADOS DE EVALUACIÓN -->
    <div class="section-title">3. Resultados de evaluación</div>
    <div class="instructions" style="padding: 2px 0;">
        <b>Criterios de evaluación:</b> Puntuación preliminar: 2 Bueno / 1 Regular / 0 Malo. Total cada área / (Puntaje
        máximo posible * áreas que intervienen). Puntaje Mayor ≥ 0.5 Cumple (1), Puntaje < 0.5 Incumple (0). </div>

            <table>
                <tr class="bg-gray bold center">
                    <td width="22%">Categorías de evaluación</td>
                    <td width="53%">Sub-categorías</td>
                    <td width="15%">Área evaluadora</td>
                    <td width="10%">Puntaje</td>
                </tr>

                <!-- 1. Desempeño -->
                <tr>
                    <td rowspan="2" class="bold">1. Desempeño</td>
                    <td>1. Respuesta: atención a solicitudes en menos de 48 horas.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta1 }}</td>
                </tr>
                <tr>
                    <td>2. Cumplimiento con lo establecido en el pedido.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta2 }}</td>
                </tr>
                <tr class="bold bg-gray">
                    <td colspan="3" class="right">Total Desempeño:</td>
                    <td class="center">{{ $cat1_desempeno }}</td>
                </tr>

                <!-- 2. Servicio -->
                <tr>
                    <td rowspan="3" class="bold">2. Servicio</td>
                    <td>3. Seguimiento a la satisfacción del cliente: atención oportuna a quejas o retroalimentación.
                    </td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta3 }}</td>
                </tr>
                <tr>
                    <td>4. Trato: Cortés.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta4 }}</td>
                </tr>
                <tr>
                    <td>5. Valor agregado: Flexibilidad en atender solicitudes por parte de la empresa.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta5 }}</td>
                </tr>
                <tr class="bold bg-gray">
                    <td colspan="3" class="right">Total Servicio:</td>
                    <td class="center">{{ $cat2_servicio }}</td>
                </tr>

                <!-- 3. Otras percepciones -->
                <tr>
                    <td rowspan="2" class="bold">3. Otras percepciones</td>
                    <td>6. Precio: respetar acuerdos negociados.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta6 }}</td>
                </tr>
                <tr>
                    <td>7. Infraestructura.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta7 }}</td>
                </tr>
                <tr class="bold bg-gray">
                    <td colspan="3" class="right">Total Otras Percepciones:</td>
                    <td class="center">{{ $cat3_percepcion }}</td>
                </tr>

                <!-- 4. Confiabilidad -->
                <tr>
                    <td rowspan="3" class="bold">4. Confiabilidad y conformidad con requisitos</td>
                    <td>8. Compromiso con el medio ambiente.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta8 }}</td>
                </tr>
                <tr>
                    <td>9. Mejora: Existencia de procesos de mejora continua en su organización y mantenimiento de
                        niveles iniciales.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta9 }}</td>
                </tr>
                <tr>
                    <td>10. Grado de satisfacción: en términos del cumplimiento con expectativas.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta10 }}</td>
                </tr>
                <tr class="bold bg-gray">
                    <td colspan="3" class="right">Total Confiabilidad:</td>
                    <td class="center">{{ $cat4_confiab }}</td>
                </tr>

                <!-- 5. Seguridad de la información -->
                <tr>
                    <td rowspan="5" class="bold">5. Seguridad de la información</td>
                    <td>11. Manejo responsable de la información compartida al proveedor y aplicación de reglas
                        definidas.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta11 ?? 2 }}</td>
                </tr>
                <tr>
                    <td>12. Conocimientos relacionados con seguridad de la información, protección de datos y
                        ciberseguridad.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta12 ?? 2 }}</td>
                </tr>
                <tr>
                    <td>13. Estatus de medidas y controles de seguridad implementadas por el proveedor.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta13 ?? 2 }}</td>
                </tr>
                <tr>
                    <td>14. Certificaciones de seguridad de la información u otras certificaciones relacionadas.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta14 ?? 2 }}</td>
                </tr>
                <tr>
                    <td>15. Escalabilidad de las medidas de seguridad en función de la importancia de los activos.</td>
                    <td class="center">{{ $evaluacion->area }}</td>
                    <td class="center">{{ $evaluacion->pregunta15 ?? 2 }}</td>
                </tr>
                <tr class="bold bg-gray">
                    <td colspan="3" class="right">Total Seguridad de la Información:</td>
                    <td class="center">{{ $cat5_seguridad }}</td>
                </tr>

                <!-- TOTALES Y RANGOS -->
                <tr class="bold">
                    <td colspan="3" class="right bg-gray">Total Subcategorías (Puntaje Obtenido):</td>
                    <td class="center">{{ $totalPuntosEvaluacion }} / 30</td>
                </tr>
                <tr class="bold">
                    <td colspan="3" class="right bg-gray">Puntaje resultante en %:</td>
                    <td class="center">{{ $pctEvaluacion }}%</td>
                </tr>
            </table>

            <!-- RANGOS DE EVALUACIÓN Y DICTAMEN -->
            <table>
                <tr class="bg-gray bold center">
                    <td colspan="2">Rangos de evaluación</td>
                    <td width="30%">Resultado Obtención</td>
                </tr>
                <tr>
                    <td width="35%">Del 80% a 100%</td>
                    <td width="35%">Aprobado (A)</td>
                    <td rowspan="3" class="center bold" style="font-size: 11px; background-color: #f9f9f9;">
                        RESULTADO:<br>
                        <span style="font-size: 13px;">{{ $dictamen }}</span>
                    </td>
                </tr>
                <tr>
                    <td>De 60% a 79.99%</td>
                    <td>Condicionado (C)</td>
                </tr>
                <tr>
                    <td>Menor a 60%</td>
                    <td>Rechazado (R)</td>
                </tr>
            </table>

            <table>
                <tr>
                    <td width="50%"><b>FECHA DE PRÓXIMA EVALUACIÓN:</b>
                        {{ \Carbon\Carbon::parse($evaluacion->fecha)->addYear()->format('d/m/Y') }}</td>
                    <td width="50%"><b>Evaluaron (Área):</b> {{ $evaluacion->area }} /
                        {{ $evaluacion->evaluador }}</td>
                </tr>
                <tr>
                    <td>¿Se tiene contrato con el proveedor? Si <u>{{ $evaluacion->contrato ? 'X' : ' ' }}</u> No
                        <u>{{ !$evaluacion->contrato ? 'X' : ' ' }}</u>
                    </td>
                    <td>En caso afirmativo, ¿se mantiene vigente? Si <u>{{ $evaluacion->vigencia ? 'X' : ' ' }}</u> No
                        <u>{{ !$evaluacion->vigencia ? 'X' : ' ' }}</u>
                    </td>
                </tr>
            </table>

            <table>
                <tr class="bg-gray bold">
                    <td colspan="3">Acciones Tomadas en caso de ser Condicionado o Rechazado:</td>
                </tr>
                <tr class="bg-gray bold center">
                    <td>Acciones</td>
                    <td width="30%">Responsable</td>
                    <td width="30%">Resultados</td>
                </tr>
                <tr>
                    <td>&nbsp;{{ $pctEvaluacion < 80 ? 'Seguimiento a plan de acción por dictamen ' . $dictamen : 'N/A' }}
                    </td>
                    <td>&nbsp;{{ $pctEvaluacion < 80 ? $evaluacion->evaluador : 'N/A' }}</td>
                    <td>&nbsp;{{ $pctEvaluacion < 80 ? 'Pendiente' : 'N/A' }}</td>
                </tr>
            </table>

            <div class="page-break"></div>

            <!-- ==================== PÁGINA 4: TABLA 1 MATRIZ ==================== -->

            <div class="section-title">TABLA 1. MATRIZ PARA ELECCIÓN DE PERIODICIDAD DE RE-EVALUACION</div>
            <table>
                <tr class="bg-gray bold center">
                    <td rowspan="2" width="18%">Frecuencia recomendada</td>
                    <td colspan="3">Impacto</td>
                    <td colspan="2">Frecuencia de compra</td>
                    <td colspan="3">Desempeño Del proveedor</td>
                </tr>
                <tr class="bg-gray bold center">
                    <td>Alto</td>
                    <td>Regular</td>
                    <td>Bajo</td>
                    <td>Ocasional</td>
                    <td>Rutinario</td>
                    <td>Bueno</td>
                    <td>Regular</td>
                    <td>Malo</td>
                </tr>

                <!-- Matriz de Opciones -->
                <tr class="center">
                    <td class="bold">1 año</td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="center">
                    <td class="bold">3 meses</td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                </tr>
                <tr class="center">
                    <td class="bold">Rechazar</td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                </tr>
                <tr class="center">
                    <td class="bold">1 año</td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="center">
                    <td class="bold">6 meses</td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                </tr>
                <tr class="center">
                    <td class="bold">Rechazar</td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                </tr>
                <tr class="center">
                    <td class="bold">1 año</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="center">
                    <td class="bold">6 meses</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                </tr>
                <tr class="center">
                    <td class="bold">Rechazar</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                </tr>
                <tr class="center">
                    <td class="bold">1 año</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="center">
                    <td class="bold">6 meses</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                </tr>
                <tr class="center">
                    <td class="bold">Rechazar</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                </tr>
                <tr class="center">
                    <td class="bold">1 año</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td>X</td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="center">
                    <td class="bold">6 meses</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                </tr>
                <tr class="center">
                    <td class="bold">Rechazar</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                </tr>
                <tr class="center">
                    <td class="bold">1 año</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td>X</td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="center">
                    <td class="bold">6 meses</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                </tr>
                <tr class="center">
                    <td class="bold">Rechazar</td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>X</td>
                </tr>
            </table>

            <div class="page-break"></div>

            <!-- ==================== PÁGINA 5: TABLA 2 DESCRIPCIÓN DE CATEGORÍAS ==================== -->

            <div class="section-title">TABLA 2. DEFINICION DE CATEGORIAS DE EVALUACION</div>
            <table>
                <!-- Desempeño -->
                <tr class="bg-gray bold">
                    <td colspan="2">Desempeño</td>
                </tr>
                <tr>
                    <td width="30%" class="bold">Respuesta</td>
                    <td>Capacidad para responder ante alguna solicitud o brindar soporte en caso de fallas en el
                        servicio.</td>
                </tr>
                <tr>
                    <td class="bold">Entrega</td>
                    <td>Capacidad para entregar en el plazo o SLA (Service Level Agreement; Acuerdo de Nivel de
                        Servicio) acordado.</td>
                </tr>
                <tr>
                    <td class="bold">Disponibilidad</td>
                    <td>Que Niterra México, S.A. de C.V. tenga facilidad para localizar o encontrar al contacto.</td>
                </tr>
                <tr>
                    <td class="bold">Habilidad de proveer producto/servicio</td>
                    <td>Capacidad para entregar a tiempo y bien.</td>
                </tr>

                <!-- Servicio -->
                <tr class="bg-gray bold">
                    <td colspan="2">Servicio</td>
                </tr>
                <tr>
                    <td class="bold">Seguimiento a la satisfacción del cliente</td>
                    <td>Que el proveedor se ocupe de monitorear la satisfacción (a través de llamadas, visitas o
                        cuestionarios).</td>
                </tr>
                <tr>
                    <td class="bold">Trato</td>
                    <td>Atención personal del proveedor por parte del contacto u otros miembros de su organización.</td>
                </tr>
                <tr>
                    <td class="bold">Accesibilidad y conveniencia</td>
                    <td>Cercanía o facilidad para comunicarse.</td>
                </tr>
                <tr>
                    <td class="bold">Atención oportuna y eficaz a quejas</td>
                    <td>Respuesta y seguimiento ante situaciones no satisfactorias.</td>
                </tr>

                <!-- Otras percepciones -->
                <tr class="bg-gray bold">
                    <td colspan="2">Otras percepciones</td>
                </tr>
                <tr>
                    <td class="bold">Precio (Respetar montos negociados)</td>
                    <td>Cumplimiento y respeto estricto de las cotizaciones y precios pactados.</td>
                </tr>
                <tr>
                    <td class="bold">Referencias del proveedor</td>
                    <td>Contar con al menos 2 referencias aceptables en el mercado.</td>
                </tr>
                <tr>
                    <td class="bold">Experiencia (Más de 5 años en su ramo)</td>
                    <td>Capacidad de comprobar que el proveedor no es improvisado y que tiene capacidad, prestigio y
                        reconocimiento en el mercado.</td>
                </tr>
                <tr>
                    <td class="bold">Infraestructura e instalaciones</td>
                    <td>Oficinas, equipo de transporte, almacenamiento o infraestructura tecnológica/analítica para la
                        protección de la información contra factores físicos, ambientales e informáticos (UPS, aire
                        acondicionado, antivirus, controles de acceso).</td>
                </tr>

                <!-- Confiabilidad -->
                <tr class="bg-gray bold">
                    <td colspan="2">Confiabilidad y conformidad con requisitos</td>
                </tr>
                <tr>
                    <td class="bold">Compromiso con el medio ambiente</td>
                    <td>El proveedor cuenta con políticas, compromisos o equivalente sobre el cuidado ambiental en su
                        producto o servicio suministrado.</td>
                </tr>
                <tr>
                    <td class="bold">Calidad consistente</td>
                    <td>Siempre su oferta sea consistente (no hay variación), no solo cuando obtienen el contrato.</td>
                </tr>
                <tr>
                    <td class="bold">Terminación satisfactoria (Usuario final)</td>
                    <td>Usuario final está satisfecho con el producto/servicio.</td>
                </tr>

                <!-- Seguridad de la Información -->
                <tr class="bg-gray bold">
                    <td colspan="2">Seguridad de la información</td>
                </tr>
                <tr>
                    <td class="bold">11. Aplicación de reglas de seguridad de la información</td>
                    <td>Comunicación a través de canales oficiales y dominios protegidos, cumplimiento de acuerdos de
                        confidencialidad conforme lo definido por Niterra México.</td>
                </tr>
                <tr>
                    <td class="bold">12. Conocimientos en seguridad, protección de datos y ciberseguridad</td>
                    <td>Respaldo de conocimientos en función del tipo de servicio ofertado por el proveedor (AWS,
                        Google, ISACA, CISSP, CISA, OSCP, CASP, entre otras).</td>
                </tr>
                <tr>
                    <td class="bold">13. Estatus de medidas y controles de seguridad implementadas</td>
                    <td>Desempeño de seguridad especificado en SLA, condiciones comerciales, oferta de valor de
                        servicio, entre otras fuentes adicionales.</td>
                </tr>
                <tr>
                    <td class="bold">14. Certificaciones de seguridad de la información u otras</td>
                    <td>Certificación vigente en ISO/IEC 27001, EC Council, ITIL, ISO/IEC 20000-1, ISO 22301, COBIT,
                        entre otras.</td>
                </tr>
                <tr>
                    <td class="bold">15. Escalabilidad de las medidas de seguridad</td>
                    <td>Métodos internos de escalamiento proporcionalmente al tipo de información intercambiada con el
                        proveedor (Tiers de servicio, flujos de atención y soporte, procedimientos de escalamiento).
                    </td>
                </tr>
            </table>

</body>

</html>
