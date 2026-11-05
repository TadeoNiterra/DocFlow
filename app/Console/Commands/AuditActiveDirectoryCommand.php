<?php

namespace App\Console\Commands;

use App\Models\Recertificacion;
use App\Models\RecertificacionDetalle;
use Carbon\Carbon;
use Illuminate\Console\Command;
use LdapRecord\Container;

class AuditActiveDirectoryCommand extends Command
{
    protected $signature = 'ad:recertificar {--periodo= : Nombre opcional del periodo}';
    protected $description = 'Extrae el padrón de AD (OU=Mexico) y analiza cambios, altas y bajas contra la auditoría previa';

    public function handle(): int
    {
        $this->info('Consultando usuarios de Active Directory en OU=Mexico...');

        $connection = Container::getDefaultConnection();

        // 1. Consultar usuarios en la OU de México solicitando los atributos requeridos
        $adUsersRaw = $connection->query()
            ->in('OU=Mexico,DC=NiterraNA,DC=com')
            ->where('objectclass', '=', 'user')
            ->where('objectclass', '!=', 'computer')
            ->select([
                'samaccountname',
                'cn',
                'mail',
                'department',
                'useraccountcontrol',
                'whencreated', // Fecha de creación nativa de AD
                'whenchanged', // Última fecha de modificación en AD
            ])
            ->paginate(500);

        $cuentasActualesAd = collect();

        foreach ($adUsersRaw as $u) {
            $sam = strtolower(trim($u['samaccountname'][0] ?? ''));

            // Omitir cuentas vacías o cuentas técnicas
            if (empty($sam) || str_ends_with($sam, '$') || str_starts_with($sam, '$')) {
                continue;
            }

            $uac = (int) ($u['useraccountcontrol'][0] ?? 512);
            $estaActivo = !($uac & 2);

            $dn = $u['distinguishedname'][0] ?? '';

            // ==========================================
            // AQUÍ SE PEGA EL BLOQUE DE CONVERSIÓN:
            // ==========================================
            $fechaCreacion = null;
            if (!empty($u['whencreated'][0])) {
                try {
                    $fechaCreacion = \Carbon\Carbon::parse($u['whencreated'][0]);
                } catch (\Exception $e) {
                    $fechaCreacion = null;
                }
            }

            $fechaModificacion = null;
            if (!empty($u['whenchanged'][0])) {
                try {
                    $fechaModificacion = \Carbon\Carbon::parse($u['whenchanged'][0]);
                } catch (\Exception $e) {
                    $fechaModificacion = null;
                }
            }
            // ==========================================

            // Guardas las variables convertidas en la colección para usarlas al insertar
            $cuentasActualesAd->put($sam, [
                'samaccountname' => $sam,
                'nombre' => $u['displayname'][0] ?? ($u['cn'][0] ?? $sam),
                'email' => $u['mail'][0] ?? null,
                'departamento' => $u['department'][0] ?? 'No asignado',
                'clasificacion' => 'Empleado',
                'tipo_cuenta' => 'Usuario',
                'dn' => $dn,
                'guid' => isset($u['objectguid'][0]) ? bin2hex($u['objectguid'][0]) : null,
                'activo' => $estaActivo,
                'whencreated' => $fechaCreacion,     // <-- Variable lista
                'whenchanged' => $fechaModificacion, // <-- Variable lista
            ]);
        }

        // 2. Obtener la última recertificación registrada para contrastar diferencias
        $ultimaAuditoria = Recertificacion::with('detalles')->latest('fecha_ejecucion')->first();
        $censoAnterior = $ultimaAuditoria
            ? $ultimaAuditoria->detalles->keyBy(fn($d) => strtolower($d->id_ad_registrado))
            : collect();

        // 3. Crear cabecera de la auditoría actual
        $periodo = $this->option('periodo') ?? 'Q' . ceil(now()->month / 3) . ' ' . now()->year;
        $folio = 'RC-' . now()->format('Y') . '-T' . ceil(now()->month / 3) . '-' . strtoupper(substr(uniqid(), -3));

        // Define el mes y año en curso (ej. "Noviembre 2026")
        $mesActual = ucfirst(now()->translatedFormat('F Y'));

        $recertificacion = Recertificacion::create([
            'folio' => $folio,
            'periodo' => $periodo,
            'fecha_ejecucion' => now(),
            'estatus' => 'PENDIENTE_REVISION',
        ]);

        $nuevos = 0;
        $inhabilitados = 0;
        $reactivados = 0;
        $sinCambios = 0;
        $eliminados = 0;

        // 4. Evaluar cuentas actuales presentes en AD
        foreach ($cuentasActualesAd as $sam => $datosAd) {
            $registroPrevio = $censoAnterior->get($sam);

            if (!$registroPrevio) {
                $tipoCambio = 'NUEVO';
                $nuevos++;
            } else {
                if ($registroPrevio->activo_en_ad && !$datosAd['activo']) {
                    $tipoCambio = 'INHABILITADO';
                    $inhabilitados++;
                } elseif (!$registroPrevio->activo_en_ad && $datosAd['activo']) {
                    $tipoCambio = 'REACTIVADO';
                    $reactivados++;
                } else {
                    $tipoCambio = 'SIN_CAMBIOS';
                    $sinCambios++;
                }
            }

            RecertificacionDetalle::create([
                'recertificacion_id' => $recertificacion->id,
                'id_ad_registrado' => $sam,
                'guid_ad' => $datosAd['guid'],
                'nombre_completo_ad' => $datosAd['nombre'],
                'email_ad' => $datosAd['email'],
                'departamento_ad' => $datosAd['departamento'],
                'clasificacion' => $datosAd['clasificacion'],
                'tipo_cuenta' => $datosAd['tipo_cuenta'],
                'mes_recertificacion' => $mesActual,
                'distinguished_name' => $datosAd['dn'],
                'existe_en_ad' => true,
                'activo_en_ad' => $datosAd['activo'],
                'estado_ad' => $datosAd['activo'] ? 'VIGENTE' : 'DESACTIVADO_EN_AD',
                'tipo_cambio' => $tipoCambio,
                'fecha_creacion_ad' => $datosAd['whencreated'],
                'fecha_recertificacion' => now(),
                'fecha_cambio_ad' => $datosAd['whenchanged'],
            ]);
        }

        // 5. Detectar cuentas borradas respecto al escaneo anterior
        if ($censoAnterior->isNotEmpty()) {
            foreach ($censoAnterior as $samPrevio => $detallePrevio) {
                if (!$cuentasActualesAd->has($samPrevio)) {
                    $eliminados++;
                    RecertificacionDetalle::create([
                        'recertificacion_id' => $recertificacion->id,
                        'id_ad_registrado' => $samPrevio,
                        'guid_ad' => $detallePrevio->guid_ad,
                        'nombre_completo_ad' => $detallePrevio->nombre_completo_ad,
                        'email_ad' => $detallePrevio->email_ad,
                        'departamento_ad' => $detallePrevio->departamento_ad,
                        'clasificacion' => $detallePrevio->clasificacion,
                        'tipo_cuenta' => $detallePrevio->tipo_cuenta,
                        'mes_recertificacion' => $mesActual,
                        'distinguished_name' => $detallePrevio->distinguished_name,
                        'existe_en_ad' => false,
                        'activo_en_ad' => false,
                        'estado_ad' => 'NO_EXISTE_EN_AD',
                        'tipo_cambio' => 'ELIMINADO',
                        'fecha_creacion_ad' => $detallePrevio->fecha_creacion_ad,
                        'fecha_recertificacion' => now(),
                        'fecha_cambio_ad' => $detallePrevio->fecha_cambio_ad,
                    ]);
                }
            }
        }

        // 6. Actualizar métricas consolidadas en recertificaciones
        $recertificacion->update([
            'total_evaluados' => $cuentasActualesAd->count() + $eliminados,
            'total_vigentes' => $sinCambios + $nuevos + $reactivados,
            'total_desactivados_ad' => $inhabilitados,
            'total_no_encontrados_ad' => $eliminados,
            'total_nuevos' => $nuevos,
            'total_inhabilitados' => $inhabilitados,
            'total_reactivados' => $reactivados,
            'total_eliminados' => $eliminados,
            'estatus' => ($eliminados > 0 || $inhabilitados > 0) ? 'ACCION_REQUERIDA' : 'APROBADO',
        ]);

        $this->info("Auditoría completada. Evaluados: {$recertificacion->total_evaluados} | Nuevos: {$nuevos} | Inhabilitados: {$inhabilitados} | Eliminados: {$eliminados}");

        return self::SUCCESS;
    }
}