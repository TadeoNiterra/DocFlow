<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Vigencia de Documentos</title>
    <style>
        @page {
            margin: 20px;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 8px;
            color: #1a202c;
            line-height: 1.2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #0F2537;
            padding: 4px;
            text-align: left;
        }

        th {
            background-color: #0F2537;
            color: #ffffff;
            font-weight: bold;
        }

        .center {
            text-align: center;
        }

        .header-box {
            text-align: center;
            margin-bottom: 15px;
            border-bottom: 2px solid #0F2537;
            padding-bottom: 5px;
        }

        .badge-vigente {
            background-color: #c6f6d5;
            color: #22543d;
            font-weight: bold;
            padding: 2px 4px;
            border-radius: 3px;
        }

        .badge-historico {
            background-color: #edf2f7;
            color: #4a5568;
            padding: 2px 4px;
            border-radius: 3px;
        }
    </style>
</head>

<body>

    <div class="header-box">
        <h2 style="margin: 0;">EVIDENCIA DE CONTROL DOCUMENTAL SGSI</h2>
        <p style="margin: 3px 0;">Reporte de Estado de Vigencia: <b><?php echo e(strtoupper($tipoFiltro)); ?></b> | Fecha de
            Registro/Generación: <?php echo e($fecha); ?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 4%;" class="center">#</th>
                <th style="width: 26%;">Documento Maestro</th>
                <th style="width: 7%;" class="center">Versión</th>
                <th style="width: 12%;" class="center">Estatus</th>
                <th style="width: 20%;">Archivo</th>
                <th style="width: 11%;">Subido Por</th>
                <th style="width: 10%;" class="center">Fecha Registro</th>
                <th style="width: 10%;" class="center">Próx. Revisión</th>
                <th style="width: 10%;" class="center">Vigencia</th>
            </tr>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $versions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php
                    $latestId = $item->document?->latestVersion?->id;
                    $esVigente = $latestId && $item->id === $latestId;
                ?>
                <tr>
                    <td class="center"><?php echo e($loop->iteration); ?></td>
                    <td><b><?php echo e($item->document?->name ?? 'N/A'); ?></b></td>
                    <td class="center"><?php echo e($item->version_number ?? $item->version); ?></td>
                    <td class="center"><?php echo e(ucfirst($item->status)); ?></td>
                    <td><?php echo e($item->file_name ?? $item->file_path); ?></td>
                    <td><?php echo e($item->user?->name ?? 'Sistema'); ?></td>

                    <!-- 🟢 Fecha de Registro en formato DD/MM/AAAA -->
                    <td class="center">
                        <?php echo e($item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') : 'N/A'); ?></td>

                    <!-- 🟢 Fecha de Próxima Revisión fijada al 01/07/{año_proximo} -->
                    <td class="center bold" style="color: #1a365d;"><?php echo e($proximaRevision); ?></td>

                    <td class="center">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($esVigente): ?>
                            <span class="badge-vigente">Vigente</span>
                        <?php else: ?>
                            <span class="badge-historico">Histórico</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </tbody>
    </table>

</body>

</html>
<?php /**PATH C:\inetpub\wwwroot\DocFlow\resources\views/pdf/reporte-vigencia-documentos.blade.php ENDPATH**/ ?>