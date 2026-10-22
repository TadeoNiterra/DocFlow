<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CARTA RESPONSIVA DE ACTIVOS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            counter-reset: page;
        }

        @page {
            margin: 110px 40px 100px 40px;
        }

        header {
            position: fixed;
            top: -90px;
            left: 0px;
            right: 0px;
            height: 80px;
            text-align: center;
        }

        header img {
            height: 60px;
            width: auto;
            max-width: 100%;
        }

        footer {
            position: fixed;
            left: 0px;
            bottom: -80px;
            right: 0px;
            height: 90px;
            font-size: 8px;
        }

        footer table {
            width: 100%;
            border-collapse: collapse;
        }

        footer td {
            padding: 3px;
            text-align: center;
            border: 1px solid #000;
        }

        footer .page:after {
            content: "Página " counter(page) " de 2";
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 5px;
            text-align: center;
        }

        h2,
        h3,
        h4 {
            margin: 8px 0;
        }

        p,
        li {
            text-align: justify;
            line-height: 1.3;
            margin: 4px 0;
        }
    </style>
</head>

@foreach ($usuarios as $usuario)

    <body>
        <header>
            <img src="{{ public_path('img/encabezado.jpg') }}" alt="logo">
        </header>

        <footer>
            <table>
                <tr>
                    <td colspan="6"><b>CARTA RESPONSIVA ACTIVO</b></td>
                </tr>
                <tr>
                    <td><b>Elaborada por:</b></td>
                    <td colspan="2">GERENTE DE SISTEMAS</td>
                    <td><b>Revisado por:</b></td>
                    <td colspan="2">GERENTE ADMINISTRACIÓN</td>
                </tr>
                <tr>
                    <td><b>Vigente desde:</b></td>
                    <td>21/11/2023</td>
                    <td><b>Número de revisiones:</b></td>
                    <td>0</td>
                    <td><b>Código:</b></td>
                    <td>F-IT-01</td>
                </tr>
                <tr>
                    <td><b>Número de páginas:</b></td>
                    <td colspan="2">2</td>
                    <td><b>Página:</b></td>
                    <td colspan="2">
                        <span class="page"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">DOCUMENTO CONTROLADO ESTRICTAMENTE CONFIDENCIAL - SE ENCUENTRA PROHIBIDA LA
                        REPRODUCCIÓN TOTAL O PARCIAL.</td>
                </tr>
            </table>
        </footer>

        <div id="content">
            <h2 style="text-align: center;">CARTA RESPONSIVA DE USO DE ACTIVOS</h2>
            <p>
                En mi carácter de colaborador de <b>"NIterra México, S.A. DE C.V."</b>, en adelante "LA EMPRESA", por el
                presente manifiesto que, en la fecha de <u>{{ now()->format('d') }}</u> de
                <u>{{ now()->translatedFormat('F') }}</u> de <u>{{ now()->format('Y') }}</u>, he sido informado y acepto
                las políticas internas y la política de confidencialidad, las cuales establecen los criterios de
                asignación y uso de laptops y dispositivos propiedad de LA EMPRESA.
            </p>

            <p>
                LA EMPRESA, a través de su responsable de asignación y gestión de equipos, ha puesto a mi disposición el
                siguiente equipo de soporte:
            </p>

            <h3>Equipos por entregar</h3>

            @if ($usuario->dispositivos && $usuario->dispositivos->count() > 0)
                <table>
                    <thead>
                        <tr style="background-color: #f2f2f2;">
                            <th>Dispositivo</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>NS / IMEI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuario->dispositivos as $dispositivo)
                            @if ($dispositivo->modeloEquipo && $dispositivo->modeloEquipo->tipo !== 'Desktop')
                                <tr>
                                    <td>{{ $dispositivo->modeloEquipo->tipo }}</td>
                                    <td>{{ $dispositivo->modeloEquipo->marca }}</td>
                                    <td>{{ $dispositivo->modeloEquipo->modelo }}</td>
                                    <td>{{ $dispositivo->numero_serie ?? ($dispositivo->imei ?? 'N/A') }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                @if ($usuario->DDEX)
                    <h4>Dispositivo de almacenamiento Externo: Sí</h4>
                @else
                    <p><b>Dispositivo de almacenamiento Externo:</b> No tiene asignado.</p>
                @endif
            @else
                <p><i>No tiene dispositivos físicos asignados registrados.</i></p>
            @endif

            <h3>Accesos a sistemas</h3>
            <table>
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th>Plataforma / Servicio</th>
                        <th>Tipo de Usuario</th>
                        <th>Usuario / Cuenta</th>
                        <th>Área / Departamento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cuenta de correo</td>
                        <td>General</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->department }}</td>
                    </tr>
                    <tr>
                        <td>Usuario de red (Active Directory)</td>
                        <td>General</td>
                        <td>{{ $usuario->id_AD ?? 'N/A' }}</td>
                        <td>{{ $usuario->department }}</td>
                    </tr>
                </tbody>
            </table>

            <h3>Accesos externos</h3>
            <table>
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th>Plataforma / Servicio</th>
                        <th>Tipo de Usuario</th>
                        <th>Usuario</th>
                        <th>Área / Departamento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>VPN</td>
                        <td>General</td>
                        <td>{{ $usuario->id_vpn ?? 'N/A' }}</td>
                        <td>{{ $usuario->department }}</td>
                    </tr>
                    <tr>
                        <td>SAP</td>
                        <td>General</td>
                        <td>{{ $usuario->id_sap ?? 'N/A' }}</td>
                        <td>{{ $usuario->department }}</td>
                    </tr>
                    <tr>
                        <td>ATEB Cofidi</td>
                        <td>General</td>
                        <td>{{ $usuario->id_cofidi ?? 'N/A' }}</td>
                        <td>{{ $usuario->department }}</td>
                    </tr>
                </tbody>
            </table>

            <h3>Accesos físicos</h3>
            <table>
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th>Acceso Físico</th>
                        <th>Identificador / Código</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Juego de llaves (Site, Cajón de escritorio, Oficina Sistemas)</td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td>Tarjeta de proximidad / Acceso</td>
                        <td>{{ $usuario->num_tarjeta ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>

            <p style="page-break-before: always;">
                Los activos mencionados cumplen con los estándares de funcionamiento necesarios para llevar a cabo mis
                labores en LA EMPRESA.
            </p>

            <p>
                En consecuencia, me comprometo de manera expresa, incondicional e irrevocable a utilizar los activos
                descritos anteriormente de acuerdo con los siguientes términos y condiciones:
            </p>

            <ol>
                <li>Reconozco que el dispositivo me ha sido entregado en mi calidad de colaborador de LA EMPRESA y, por
                    lo tanto, lo utilizaré exclusivamente para llevar a cabo las tareas asignadas por la misma.</li>
                <li>Utilizaré el dispositivo como herramienta de trabajo y me comprometo a cuidarlo adecuadamente para
                    mantenerlo en buenas condiciones. En caso de requerimiento por parte de LA EMPRESA, lo entregaré de
                    inmediato.
                    <ul>
                        <li>El incumplimiento de estas políticas conllevará las acciones legales y administrativas según
                            lo establecido en el reglamento interior de trabajo.</li>
                    </ul>
                </li>
                <li>Asumo la responsabilidad de mantener el dispositivo en buen estado. En caso de daños causados por mi
                    negligencia o descuido, estaré obligado a cubrir el costo total de las reparaciones.</li>
                <li>Acepto cuidar la información confidencial que pudiera almacenar y no distribuirla sin autorización
                    explícita.</li>
                <li>Estoy de acuerdo en entregar el dispositivo de manera inmediata ante cualquier solicitud autorizada
                    o terminación de la relación laboral.</li>
                <li>Me comprometo a permitir inspecciones o verificaciones por parte de representantes autorizados
                    cuantas veces sea necesario.</li>
                <li>Reconozco que me consideraré únicamente como usuario del dispositivo, sin adquirir ningún derecho de
                    propiedad sobre él.</li>
                <li>Me comprometo a no modificar el hardware ni el software sin el consentimiento expreso por escrito de
                    la empresa.</li>
            </ol>
        </div>

        <br><br><br>
        <table style="border: none; width: 100%;">
            <tr>
                <td style="border: none; width: 50%;"><b>Firma de Recibe:</b></td>
                <td style="border: none; width: 50%;"><b>Firma de Entrega:</b></td>
            </tr>
            <tr>
                <td style="border: none;">{{ $usuario->name }} {{ $usuario->lastname }}</td>
                <td style="border: none;">Sistemas / Administrador de IT</td>
            </tr>
            <tr>
                <td style="border: none;"><br>____________________________________</td>
                <td style="border: none;"><br>____________________________________</td>
            </tr>
        </table>
    </body>
@endforeach

</html>
