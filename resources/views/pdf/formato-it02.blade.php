<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>F-IT-02 Matriz de Derechos y Privilegios</title>
    <style>
        @page {
            margin: 20px;
            size: a2 landscape;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
            color: #000;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .sgsi-box {
            border: 1px solid #000;
            border-collapse: collapse;
            width: 100%;
        }

        .sgsi-box td {
            border: 1px solid #000;
            padding: 4px 8px;
            text-align: center;
            font-size: 10px;
        }

        .doc-title {
            font-weight: bold;
            font-size: 14px;
            margin: 10px 0 6px 0;
            text-transform: uppercase;
        }

        table.grid {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table.grid th,
        table.grid td {
            border: 1px solid #333;
            padding: 4px;
            text-align: center;
        }

        /* Encabezado de Roles ampliado */
        .th-rol {
            height: 180px;
            vertical-align: bottom;
            background-color: #8b5cf6;
            color: #fff;
            font-size: 9px;
            padding: 4px 0;
            width: 25px;
        }

        .rotar-texto {
            writing-mode: vertical-rl;
            -webkit-transform: rotate(270deg);
            -moz-transform: rotate(270deg);
            -ms-transform: rotate(270deg);
            -o-transform: rotate(270deg);
            transform: rotate(270deg);
            white-space: nowrap;
            width: 20px;
            margin: 0 auto;
            font-weight: bold;
        }

        .td-funcion {
            text-align: left !important;
            padding-left: 8px !important;
            font-weight: bold;
            font-size: 10px;
            width: 320px;
        }

        .tr-cat {
            background-color: #fef08a;
            font-weight: bold;
            text-align: left !important;
            font-size: 11px;
            text-transform: uppercase;
            padding: 6px !important;
        }

        .cell-d {
            background-color: #bfdbfe;
            font-weight: bold;
            color: #1e3a8a;
            font-size: 10px;
        }

        .cell-p {
            background-color: #fca5a5;
            font-weight: bold;
            color: #991b1b;
            font-size: 10px;
        }

        .cell-n {
            color: #9ca3af;
            font-size: 9px;
        }

        .leyenda {
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 11px;
        }

        .badge-d {
            background-color: #bfdbfe;
            color: #1e3a8a;
            padding: 2px 6px;
            border-radius: 3px;
        }

        .badge-p {
            background-color: #fca5a5;
            color: #991b1b;
            padding: 2px 6px;
            border-radius: 3px;
        }
    </style>
</head>

<body>

    <!-- Encabezado -->
    <table class="header-table">
        <tr>
            <td style="width: 50%;">
                <strong style="font-size: 18px; color: #008779;">Niterra México, S.A. de C.V.</strong>
            </td>
            <td style="width: 50%;">
                <table class="sgsi-box">
                    <tr>
                        <td style="background-color: #e5e7eb; font-weight: bold;">Código:</td>
                        <td>F-IT-02 R0</td>
                        <td style="background-color: #e5e7eb; font-weight: bold;">Emisión:</td>
                        <td>01-DIC-2023</td>
                    </tr>
                    <tr>
                        <td style="background-color: #e5e7eb; font-weight: bold;" colspan="2">Nombre:</td>
                        <td colspan="2">Matriz de Derechos y Privilegios</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="leyenda">
        Simbología:
        <span class="badge-d">D = Derecho (D)</span> &nbsp;
        <span class="badge-p">P = Privilegio (P)</span> &nbsp;
        <span>N = No aplicable (N)</span>
    </div>

    <!-- MATRIZ 1: FUNCIONES -->
    <div class="doc-title">Matriz 1: Funciones y Permisos</div>
    <table class="grid">
        <thead>
            <tr>
                <th style="width: 320px; background-color: #5b21b6; color: #fff; text-align: left; padding-left: 8px;">
                    Roles / Funciones</th>
                @foreach ($roles as $rol)
                    <th class="th-rol">
                        <div class="rotar-texto">{{ $rol->nombre }}</div>
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($categoriasFunciones as $cat)
                <tr class="tr-cat">
                    <td colspan="{{ count($roles) + 1 }}">{{ $cat->nombre }}</td>
                </tr>
                @foreach ($cat->funciones as $func)
                    <tr>
                        <td class="td-funcion">{{ $func->nombre }}</td>
                        @foreach ($roles as $rol)
                            @php $v = $permisosMap[$rol->id][$func->id] ?? 'N'; @endphp
                            <td class="{{ $v === 'D' ? 'cell-d' : ($v === 'P' ? 'cell-p' : 'cell-n') }}">
                                {{ $v }}</td>
                        @endforeach
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <!-- MATRIZ 2: RECURSOS -->
    @if (count($categoriasRecursos) > 0)
        <div class="doc-title" style="page-break-before: always;">Matriz 2: Recursos de Acceso</div>
        <table class="grid">
            <thead>
                <tr>
                    <th
                        style="width: 320px; background-color: #5b21b6; color: #fff; text-align: left; padding-left: 8px;">
                        Roles / Recursos</th>
                    @foreach ($roles as $rol)
                        <th class="th-rol">
                            <div class="rotar-texto">{{ $rol->nombre }}</div>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($categoriasRecursos as $cat)
                    <tr class="tr-cat">
                        <td colspan="{{ count($roles) + 1 }}">{{ $cat->nombre }}</td>
                    </tr>
                    @foreach ($cat->funciones as $func)
                        <tr>
                            <td class="td-funcion">{{ $func->nombre }}</td>
                            @foreach ($roles as $rol)
                                @php $v = $permisosMap[$rol->id][$func->id] ?? 'N'; @endphp
                                <td class="{{ $v === 'D' ? 'cell-d' : ($v === 'P' ? 'cell-p' : 'cell-n') }}">
                                    {{ $v }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @endif

</body>

</html>
