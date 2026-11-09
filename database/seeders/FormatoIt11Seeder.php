<?php

namespace Database\Seeders;

use App\Models\FormatoIt11Fase;
use App\Models\FormatoIt11Reporte;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatoIt11Seeder extends Seeder
{
    private function generarFolio(string $fecha, int $consecutivo): string
    {
        $year = Carbon::parse($fecha)->format('Y');
        $pad = str_pad($consecutivo, 3, '0', STR_PAD_LEFT);

        return "FMT-IT11-{$year}-{$pad}";
    }

    public function run(): void
    {
        $creador = User::where('email', 'jesus.marron@niterragroup.com')->first()
            ?? User::first()
            ?? User::create([
                'name'     => 'Administrador TI',
                'email'    => 'admin.it@niterragroup.com',
                'password' => bcrypt('password123'),
            ]);

        $reportes = [
            // -------------------------------------------------------------
            // 1. 17-02-2025
            // -------------------------------------------------------------
            [
                'fecha_prueba'       => '2025-02-17',
                'escenario'          => 'Falla de sistemas o componentes críticos',
                'consideraciones'    => "Descripción del escenario de recuperación: Interrupción por falla de sistemas o componentes críticos en áreas operativas y administrativas, por sismo\nNo. De personas presentes: 70\nNo. De personas involucradas: 4",
                'personas_presentes' => 70,
                'personas_involucradas' => 4,
                'evacuacion_teorico' => null,
                'evacuacion_real'    => 0.10,
                'rpo_teorico'        => 1.25,
                'rpo_real'           => 0.67,
                'rto_teorico'        => 4.00,
                'rto_real'           => 0.83,
                'mtd_teorico'        => 5.25,
                'mtd_real'           => 1.50,
                'plan_efectivo'      => true,
                'porque_efectivo'    => 'Porque el tiempo de recuperación fue 3.5 veces menor al tiempo estimado en el F-IT-12 Rev. 1 Plan de continuidad de negocio (BCP).',
                'lecciones_aprendidas' => "Lecciones aprendidas: La pronta revisión física y la coordinación con proveedores permitió restablecer los enlaces de red sin daño físico mayor.\n\nOportunidades de mejora: Estandarizar las conexiones eléctricas de los switches con aseguradores de cable para evitar desconexiones accidentales por vibración.",
                'fases' => [
                    ['bloque' => 'Activación BCP', 'fase' => '1. Notificación', 'inicio' => '11:00', 'fin' => '11:10', 'descripcion' => 'Se activa la alerta sísmica a las 11:00, se comienza con el alertamiento y se toma posición de seguridad.'],
                    ['bloque' => 'Activación BCP', 'fase' => '2. Evaluación', 'inicio' => '11:10', 'fin' => '11:20', 'descripcion' => 'al regresar a nuestro lugar de trabajo, Miguel Villanueva hace la revisión de servidores y se percata de que no hay red ni conexión a la red interna, Miguel Villanueva y Jorge Luis Guzman revisan la instalación físicamente y se percatan de la desconexión de los disposivos de red del suministro eléctrico.'],
                    ['bloque' => 'Activación BCP', 'fase' => '3. Contención', 'inicio' => '11:30', 'fin' => '11:40', 'descripcion' => 'Se pone en marcha el plan de contención, se comienza con la reconexión de los dispositivos de red, y comienzan con la reanudación de la red local.'],
                    ['bloque' => 'Activación BCP', 'fase' => '4. Comunicación', 'inicio' => '11:40', 'fin' => '11:55', 'descripcion' => 'Jorge Luis Guzman, se pone en contacto con los proveedores de servicios de red, para la verificación del correcto funcionamiento de las configuraciones de cada uno de los dispositivos de esta.'],
                    ['bloque' => 'Activación DRP', 'fase' => '5. Mitigación', 'inicio' => '11:55', 'fin' => '12:10', 'descripcion' => 'Jorge Luis Guzman junto a los proveedores de servicio, revisan las configuraciones de todos los servicios, y se ponen los dispositivos en producción.'],
                    ['bloque' => 'Activación DRP', 'fase' => '6. Evaluación de daños', 'inicio' => '12:10', 'fin' => '12:20', 'descripcion' => 'Miguel Villanueva junto con un grupo integrado por una persona de cada departamento hacen pruebas de servicios y aplicativos, las cuales funcionan correctamente, con lo que se da por entendido que no hubo algún tipo de fallo mayor físico o desconfiguración de los dispositivos de red'],
                    ['bloque' => 'Activación DRP', 'fase' => '7. Reanudación de operaciones', 'inicio' => '12:20', 'fin' => '12:30', 'descripcion' => 'Jesus Alejandro Marron, da la orden de reanudar operaciones después de las pruebas realizadas por el equipo de pruebas junta a Miguel Villanueva.'],
                ],
            ],

            // -------------------------------------------------------------
            // 2. 29-04-2025
            // -------------------------------------------------------------
            [
                'fecha_prueba'       => '2025-04-29',
                'escenario'          => 'Falla de sistemas o componentes críticos (Pérdida de Base de Datos Operativa)',
                'consideraciones'    => "Descripción del escenario de recuperación: Durante el simulacro de incendio institucional se ejecuta un corte preventivo de energía parcial en una sección administrativa. Al reestablecer la corriente, se detecta un pico de voltaje que corrompe el sistema de archivos del servidor de base de datos de producción, provocando la pérdida total y desaparición de la base de datos operativa. Los aplicativos dependientes quedan fuera de línea de inmediato.\nNo. De personas presentes: 70\nNo. De personas involucradas: 4",
                'personas_presentes' => 70,
                'personas_involucradas' => 4,
                'evacuacion_teorico' => null,
                'evacuacion_real'    => 0.80,
                'rpo_teorico'        => 1.25,
                'rpo_real'           => 0.20,
                'rto_teorico'        => 4.00,
                'rto_real'           => 0.40,
                'mtd_teorico'        => 5.25,
                'mtd_real'           => 0.48,
                'plan_efectivo'      => true,
                'porque_efectivo'    => 'Porque el tiempo de recuperación fue 10 veces menor al tiempo estimado en el F-IT-12 Rev. 1 Plan de continuidad de negocio (BCP).',
                'lecciones_aprendidas' => "Lecciones aprendidas:\nSe comprobó que el proceso de guardado de backups locales responde de manera inmediata y sin corrupción interna ante interrupciones de energía imprevistas.\n\nOportunidades de mejora:\nInstalar protectores de picos y supresores adicionales en las líneas secundarias de energía que alimentan las bahías del SITE de comunicaciones para evitar daños físicos directos en los discos duros durante futuros simulacros o incidentes reales de incendio.",
                'fases' => [
                    ['bloque' => 'Activación BCP', 'fase' => '1. Notificación', 'inicio' => '11:00', 'fin' => '11:10', 'descripcion' => 'Se activa la alarma de incendio y el personal evacúa. Al regresar a las estaciones de trabajo tras el pase de lista, Miguel Villanueva inspecciona las consolas y se percata de que el motor de SQL Server no responde y la base de datos operativa principal ha desaparecido del sistema de archivos. Da aviso urgente a Jorge Guzmán.'],
                    ['bloque' => 'Activación BCP', 'fase' => '2. Evaluación', 'inicio' => '11:10', 'fin' => '11:20', 'descripcion' => 'Jorge Guzmán se conecta a la infraestructura virtual del servidor afectado. Confirma que la base de datos operativa sufrió un daño lógico crítico insalvable por el reinicio eléctrico inesperado. Escala el nivel de severidad a Jesús Marrón.'],
                    ['bloque' => 'Activación BCP', 'fase' => '3. Contención', 'inicio' => '11:30', 'fin' => '11:40', 'descripcion' => 'Como medida de contención, Jorge Guzmán deshabilita temporalmente los sockets y puertos de comunicación hacia las aplicaciones web y de terceros para evitar inyecciones de consultas corruptas.'],
                    ['bloque' => 'Activación BCP', 'fase' => '4. Comunicación', 'inicio' => '11:40', 'fin' => '11:55', 'descripcion' => 'Jesús Marrón evalúa los tiempos de afectación al negocio y declara formalmente la contingencia tecnológica, autorizando dar paso a la Activación del DRP. Informa a los gerentes de las áreas usuarias sobre la ventana técnica de restauración.'],
                    ['bloque' => 'Activación DRP', 'fase' => '5. Mitigación', 'inicio' => '11:55', 'fin' => '12:10', 'descripcion' => 'Martín Tadeo ubica el último respaldo (backup) completo válido en la unidad de almacenamiento segura local e inicia la restauración forzada de la base de datos operativa. Simultáneamente, Jorge Guzmán reconfigura los servicios vinculados de los proveedores para su recepción limpia.'],
                    ['bloque' => 'Activación DRP', 'fase' => '6. Evaluación de daños', 'inicio' => '12:10', 'fin' => '12:20', 'descripcion' => 'Concluida la restauración, Miguel Villanueva corre tareas de indexación y rutinas de integridad sobre la BD. Realiza pruebas de estrés junto al equipo de validación confirmando cero pérdidas de datos críticos respecto al último punto de control.'],
                    ['bloque' => 'Activación DRP', 'fase' => '7. Reanudación de operaciones', 'inicio' => '12:20', 'fin' => '12:30', 'descripcion' => 'Se levantan las restricciones de red y el tráfico vuelve a la normalidad. Las aplicaciones operativas quedan 100% en línea. Jesús Marrón da por cerrado el simulacro de IT con éxito y reporta la recuperación completa a la dirección general.'],
                ],
            ],

            // -------------------------------------------------------------
            // 3. 16-06-2025
            // -------------------------------------------------------------
            [
                'fecha_prueba'       => '2025-06-16',
                'escenario'          => 'Falla de sistemas o componentes críticos (Inaccesibilidad del servidor de base de datos CODIFI_WEB por sismo)',
                'consideraciones'    => "Descripción del escenario de recuperación: Interrupción por falla de sistemas o componentes críticos en áreas operativas y administrativas, por sismo. El movimiento telúrico provoca una caída de tensión en el SITE, lo que genera una alerta crítica y deja el volumen de almacenamiento de la base de datos de CODIFI_WEB en estado corrupto e inaccesible.\nNo. De personas presentes: 70\nNo. De personas involucradas: 4",
                'personas_presentes' => 70,
                'personas_involucradas' => 4,
                'evacuacion_teorico' => null,
                'evacuacion_real'    => 0.08,
                'rpo_teorico'        => 1.25,
                'rpo_real'           => 0.20,
                'rto_teorico'        => 4.00,
                'rto_real'           => 0.40,
                'mtd_teorico'        => 5.25,
                'mtd_real'           => 0.48,
                'plan_efectivo'      => true,
                'porque_efectivo'    => 'Porque el tiempo de recuperación real de IT fue 10 veces menor al tiempo estimado en el F-IT-12 Rev. 1 Plan de continuidad de negocio (BCP).',
                'lecciones_aprendidas' => "Lecciones aprendidas:\nConsiderar dentro de las limitaciones del plan específico de recuperación F-IT-18 PER-01 la demora en tiempo de respuesta de terceros (como IMO) para la validación y restauración de datos en infraestructuras compartidas.\n\nOportunidades de mejora:\nEstablecer un canal de comunicación de emergencia directo (vía chat o teléfono prioritario) con el soporte de IMO exclusivo para ventanas de sismos o desastres naturales, agilizando el diagnóstico del almacenamiento virtual.",
                'fases' => [
                    ['bloque' => 'Activación BCP', 'fase' => '1. Notificación', 'inicio' => '11:00', 'fin' => '11:15', 'descripcion' => 'Se activa la alerta sísmica a las 11:00, se comienza con el alertamiento y se toma posición de seguridad/evacuación. Al regresar al lugar de trabajo, Miguel Villanueva hace la revisión de servidores y se percata de que el servidor de base de datos se encuentra alertado; notifica de inmediato a Jorge Guzmán y al equipo de facturación.'],
                    ['bloque' => 'Activación BCP', 'fase' => '2. Evaluación', 'inicio' => '11:15', 'fin' => '11:40', 'descripcion' => 'Jorge Guzmán entra a la máquina virtual y reinicia el servidor para evaluar los daños en primera instancia. Al notar que el sistema operativo responde pero el servicio de base de datos sigue caído, se pone en contacto con IMO para coordinar el diagnóstico del volumen de almacenamiento.'],
                    ['bloque' => 'Activación BCP', 'fase' => '3. Contención', 'inicio' => '11:40', 'fin' => '11:55', 'descripcion' => 'Se pone en marcha el plan de contención: Jorge Guzmán aísla las peticiones del sitio web externo para evitar corrupción de peticiones concurrentes y saturación de hilos en el servidor afectado.'],
                    ['bloque' => 'Activación BCP', 'fase' => '4. Comunicación', 'inicio' => '11:55', 'fin' => '12:15', 'descripcion' => 'Hace el análisis de la problemática y, al encender el servidor, se realiza la evaluación final de daños encontrando que la base de datos de CODIFI_WEB se encuentra completamente inaccesible. Al terminar esto, Jesús Marrón autoriza formalmente la declaración de contingencia y se comienzan los trabajos de recuperación (Activación DRP).'],
                    ['bloque' => 'Activación DRP', 'fase' => '5. Mitigación', 'inicio' => '12:15', 'fin' => '12:55', 'descripcion' => 'Martín Tadeo comienza la restauración de la base de datos en SQL Server desde la interfaz gráfica utilizando el último backup transaccional, mientras Jorge Guzmán comienza a levantar servicios de terceros desde el servidor de aplicaciones.'],
                    ['bloque' => 'Activación DRP', 'fase' => '6. Evaluación de daños', 'inicio' => '12:55', 'fin' => '13:10', 'descripcion' => 'Miguel Villanueva hace las pruebas necesarias junto al equipo de facturación y el staff de IT. Nos percatamos de que no hubo pérdida significante de datos y vemos que tanto los servicios de bases de datos como de aplicación web están funcionando de forma correcta.'],
                    ['bloque' => 'Activación DRP', 'fase' => '7. Reanudación de operaciones', 'inicio' => '13:10', 'fin' => '13:20', 'descripcion' => 'Se regresa al trabajo con pérdidas de datos mínimas (RPO óptimo) y se continúa con la operación comercial normal.'],
                ],
            ],

            // -------------------------------------------------------------
            // 4. 18-08-2025
            // -------------------------------------------------------------
            [
                'fecha_prueba'       => '2025-08-18',
                'escenario'          => 'Caída general de servicios de IT y telecomunicaciones (Daño físico en cableado estructurado)',
                'consideraciones'    => "Descripción del escenario de recuperación: Durante el simulacro de incendio, se sobrecalienten las líneas de energía del SITE lo que provoca un conato de fuego localizado que destruye los latiguillos (patch cords) principales y daña el cableado estructurado del rack de distribución core. Al reingresar al edificio, la planta se encuentra completamente incomunicada (sin red LAN ni salida WAN).\nNo. De personas presentes: 70\nNo. De personas involucradas: 4",
                'personas_presentes' => 70,
                'personas_involucradas' => 4,
                'evacuacion_teorico' => null,
                'evacuacion_real'    => 0.25,
                'rpo_teorico'        => 1.25,
                'rpo_real'           => 0.00,
                'rto_teorico'        => 15.00,
                'rto_real'           => 1.50,
                'mtd_teorico'        => 16.25,
                'mtd_real'           => 1.75,
                'plan_efectivo'      => true,
                'porque_efectivo'    => 'Porque gracias a contar con el stock de cableado de emergencia y las herramientas listas en el SITE, el tiempo de recuperación real fue 10 veces menor al tiempo estimado en el peor escenario del F-IT-12 Rev. 1 Plan de continuidad de negocio (BCP) (15 horas).',
                'lecciones_aprendidas' => "Lecciones aprendidas:\nEl stock de consumibles de red (patch cords, conectores, herramientas) dentro del SITE demostró ser suficiente para resolver una contingencia física de manera autónoma.\n\nOportunidades de mejora:\nImplementar una guía visual rápida de código de colores en el rack de distribución para que Martín y Miguel agilicen la identificación de los cables troncales prioritarios en situaciones de baja visibilidad o estrés.",
                'fases' => [
                    ['bloque' => 'Activación BCP', 'fase' => '1. Notificación', 'inicio' => '11:00', 'fin' => '11:15', 'descripcion' => 'Se activa la alarma de incendio y el personal evacúa a los puntos de reunión. Al retornar a las oficinas (11:15), los usuarios reportan caída total del sistema. Miguel Villanueva ingresa al SITE e identifica que el switch principal no enlaza debido al daño físico en los cables de parcheo del rack core. Notifica de inmediato a Jorge Guzmán.'],
                    ['bloque' => 'Activación BCP', 'fase' => '2. Evaluación', 'inicio' => '11:15', 'fin' => '11:30', 'descripcion' => 'Jorge Guzmán inspecciona visualmente el rack. Confirma que 24 líneas principales de red hacia el área operativa y los servidores locales están caídas por el daño físico en los hilos. Informa a Jesús Marrón que la afectación es crítica y requiere intervención de hardware inmediata.'],
                    ['bloque' => 'Activación BCP', 'fase' => '3. Contención', 'inicio' => '11:30', 'fin' => '11:35', 'descripcion' => 'Jorge Guzmán desvía de forma temporal los enlaces perimetrales hacia un switch secundario de contingencia que no sufrió afectaciones para asegurar que los servicios externos (nube y correos) sigan operando de forma aislada.'],
                    ['bloque' => 'Activación BCP', 'fase' => '4. Comunicación', 'inicio' => '11:35', 'fin' => '11:45', 'descripcion' => 'Jesús Marrón evalúa los impactos y declara formalmente la contingencia física de telecomunicaciones (PER-02). Notifica a las gerencias afectadas sobre la ventana técnica de reconstrucción y autoriza al staff la Activación del DRP.'],
                    ['bloque' => 'Activación DRP', 'fase' => '5. Mitigación', 'inicio' => '11:45', 'fin' => '12:20', 'descripcion' => 'Martín Tadeo y Miguel Villanueva extraen del inventario de emergencia los insumos de repuesto y comienzan el reemplazo de los patch cords quemados, así como el re-ponchado express de los bloques de parcheo (patch panels) dañados. Jorge Guzmán valida la estabilidad eléctrica.'],
                    ['bloque' => 'Activación DRP', 'fase' => '6. Evaluación de daños', 'inicio' => '12:20', 'fin' => '12:35', 'descripcion' => 'Una vez concluido el cableado físico, Miguel Villanueva realiza ráfagas de pruebas (pings, trazas de ruta) hacia los servidores y puertas de enlace. Valida junto con Martín Tadeo que los equipos de la planta vuelvan a recibir direccionamiento IP estable.'],
                    ['bloque' => 'Activación DRP', 'fase' => '7. Reanudación de operaciones', 'inicio' => '12:35', 'fin' => '12:45', 'descripcion' => 'Se restablece la conectividad LAN/WAN al 100%. Los usuarios de Niterra México confirman acceso exitoso a los aplicativos locales y de facturación. Jesús Marrón da por cerrado el simulacro e instruye documentar el evento.'],
                ],
            ],

            // -------------------------------------------------------------
            // 5. 19-09-2025
            // -------------------------------------------------------------
            [
                'fecha_prueba'       => '2025-09-19',
                'escenario'          => 'Caída general de servicios de IT y telecomunicaciones (Pérdida de enlace troncal externo)',
                'consideraciones'    => "Descripción del escenario de recuperación: Tras la evacuación por sismo, se detecta que el enlace principal de internet dedicado (Fibra Óptica) queda completamente fuera de servicio debido a la caída de postes de luz y telefonía en la vía pública externa. La planta de Niterra México se queda sin salida a internet ni comunicación con servicios en la nube.\nNo. De personas presentes: 70\nNo. De personas involucradas: 4",
                'personas_presentes' => 70,
                'personas_involucradas' => 4,
                'evacuacion_teorico' => null,
                'evacuacion_real'    => 0.25,
                'rpo_teorico'        => 1.25,
                'rpo_real'           => 0.00,
                'rto_teorico'        => 35.00,
                'rto_real'           => 3.50,
                'mtd_teorico'        => 36.25,
                'mtd_real'           => 3.75,
                'plan_efectivo'      => true,
                'porque_efectivo'    => 'Porque al contar con un enlace de respaldo configurado y un protocolo técnico de failover, el tiempo de recuperación real fue 10 veces menor al tiempo estimado en el peor escenario del F-IT-12 Rev. 1 Plan de continuidad de negocio (BCP) (35 horas).',
                'lecciones_aprendidas' => "Lecciones aprendidas:\nSe validó con éxito que el enlace secundario tiene la capacidad necesaria para soportar la carga transaccional crítica de la planta de Niterra México ante emergencias externas.\n\nOportunidades de mejora:\nConfigurar reglas de Failover automático (SD-WAN) en el Firewall perimetral para que el cambio al enlace de respaldo se realice en menos de 5 minutos, eliminando la necesidad de una intervención técnica manual tan prolongada en la fase de mitigación.",
                'fases' => [
                    ['bloque' => 'Activación BCP', 'fase' => '1. Notificación', 'inicio' => '11:00', 'fin' => '11:20', 'descripcion' => 'Se activa la alerta sísmica institucional y se realiza la evacuación a las zonas de seguridad. Al regresar a las oficinas, Miguel Villanueva detecta pérdida total de navegación en la red. Revisa el Firewall perimetral y constata que el enlace de fibra principal está caído (Link Down). Da aviso inmediato a Jorge Guzmán.'],
                    ['bloque' => 'Activación BCP', 'fase' => '2. Evaluación', 'inicio' => '11:20', 'fin' => '11:45', 'descripcion' => 'Jorge Guzmán levanta el ticket de soporte con el proveedor telefónico, el cual confirma daños estructurales en la zona externa y un tiempo de reparación indefinido. Jorge evalúa el impacto físico local y reporta a Jesús Marrón que la afectación es externa y masiva.'],
                    ['bloque' => 'Activación BCP', 'fase' => '3. Contención', 'inicio' => '11:45', 'fin' => '12:00', 'descripcion' => 'Jorge Guzmán ingresa a la configuración del Firewall core para congelar y priorizar el ancho de banda disponible, limitando descargas secundarias y priorizando únicamente los puertos transaccionales y de facturación de Niterra.'],
                    ['bloque' => 'Activación BCP', 'fase' => '4. Comunicación', 'inicio' => '12:00', 'fin' => '12:20', 'descripcion' => 'Jesús Marrón declara formalmente la contingencia de telecomunicaciones por causas externas (PER-02). Envía una notificación a la planta informando que se operará a través del enlace secundario con ancho de banda limitado y autoriza al staff la Activación del DRP.'],
                    ['bloque' => 'Activación DRP', 'fase' => '5. Mitigación', 'inicio' => '12:20', 'fin' => '13:40', 'descripcion' => 'Martín Tadeo ejecuta el cambio de ruteo (Failover manual) en el Firewall hacia la línea secundaria de respaldo (enlace microondas/satelital). Miguel Villanueva realiza ajustes en las tablas de ruteo internas y reconfigura los túneles VPN críticos de comunicación con el corporativo.'],
                    ['bloque' => 'Activación DRP', 'fase' => '6. Evaluación de daños', 'inicio' => '13:40', 'fin' => '16:10', 'descripcion' => 'Una vez activo el enlace de respaldo, Miguel Villanueva corre pruebas de latencia y velocidad. Valida junto con Martín Tadeo que el portal de facturación, timbrado y correos operen correctamente bajo la línea de contingencia sin interrupciones.'],
                    ['bloque' => 'Activación DRP', 'fase' => '7. Reanudación de operaciones', 'inicio' => '16:10', 'fin' => '16:30', 'descripcion' => 'La planta recupera la conectividad externa de forma estable. Los usuarios confirman salida a internet y operación fluida. Jesús Marrón da por cerrado el simulacro de enlace, manteniendo el monitoreo hasta que el proveedor externo repare la fibra pública.'],
                ],
            ],

            // -------------------------------------------------------------
            // 6. 17-11-2025
            // -------------------------------------------------------------
            [
                'fecha_prueba'       => '2025-11-17',
                'escenario'          => 'Interrupción de operaciones por ataque cibernético',
                'consideraciones'    => "Descripción del escenario de recuperación: Durante un incendio, se detecta que un equipo de la red ejecuta un archivo malicioso (Phishing). Al regresar de la evacuación, el malware muta a Ransomware y comienza a cifrar masivamente las carpetas compartidas del servidor de archivos local de Niterra México, dejando notas de rescate en las pantallas.\nNo. De personas presentes: 70\nNo. De personas involucradas: 4",
                'personas_presentes' => 70,
                'personas_involucradas' => 4,
                'evacuacion_teorico' => null,
                'evacuacion_real'    => 0.25,
                'rpo_teorico'        => 1.25,
                'rpo_real'           => 1.00,
                'rto_teorico'        => 25.00,
                'rto_real'           => 2.50,
                'mtd_teorico'        => 26.25,
                'mtd_real'           => 2.75,
                'plan_efectivo'      => true,
                'porque_efectivo'    => 'Porque el tiempo de recuperación real de IT fue 10 veces menor al tiempo estimado en el peor escenario del F-IT-12 Rev. 1 Plan de continuidad de negocio (BCP) (25 horas), gracias a contar con respaldos limpios e inmunizados fuera de la red.',
                'lecciones_aprendidas' => "Lecciones aprendidas:\nLa estrategia de aislamiento inmediato de la red fue efectiva para contener el alcance del Ransomware y evitar que afectara a las bases de datos de producción como CODIFI_WEB.\n\nOportunidades de mejora:\nReforzar las campañas de concientización de Phishing entre el personal administrativo de Niterra México y automatizar las alertas del Firewall para bloquear de forma automática IPs que muestren patrones de cifrado masivo.",
                'fases' => [
                    ['bloque' => 'Activación BCP', 'fase' => '1. Notificación', 'inicio' => '11:00', 'fin' => '11:15', 'descripcion' => 'Se activa la alarma de incendio y se evacúa el edificio. Al regresar a los puestos de trabajo (11:15), un usuario reporta que no puede abrir sus documentos y que sus archivos tienen extensiones extrañas. Miguel Villanueva revisa el servidor de archivos y confirma actividad sospechosa de cifrado. Notifica a Jorge Guzmán.'],
                    ['bloque' => 'Activación BCP', 'fase' => '2. Evaluación', 'inicio' => '11:15', 'fin' => '11:35', 'descripcion' => 'Jorge Guzmán analiza los logs de seguridad e identifica la dirección IP del equipo origen de la infección. Confirma que se trata de una variante de Ransomware activa que está comprometiendo el almacenamiento local. Reporta la gravedad inmediata a Jesús Marrón.'],
                    ['bloque' => 'Activación BCP', 'fase' => '3. Contención', 'inicio' => '11:35', 'fin' => '11:50', 'descripcion' => 'Jorge Guzmán ordena el aislamiento físico e inmediato de la red: se desconecta el puerto del switch del usuario infectado y se bloquean temporalmente los accesos SMB/CIFS al servidor de archivos para congelar y frenar la propagación del ataque.'],
                    ['bloque' => 'Activación BCP', 'fase' => '4. Comunicación', 'inicio' => '11:50', 'fin' => '12:10', 'descripcion' => 'Jesús Marrón declara formalmente la contingencia por ataque cibernético. Informa a las gerencias de Niterra que el servidor de archivos compartidos estará fuera de línea por mantenimiento forense y restauración limpia, y autoriza al staff la Activación del DRP.'],
                    ['bloque' => 'Activación DRP', 'fase' => '5. Mitigación', 'inicio' => '12:10', 'fin' => '13:10', 'descripcion' => 'Martín Tadeo ejecuta un borrado seguro (Wipe) de los discos del servidor afectado para eliminar residuos del virus. Posteriormente, inicia la restauración completa del sistema de archivos desde la unidad de respaldos históricos aislada (Air-Gapped Backup), libre de infección.'],
                    ['bloque' => 'Activación DRP', 'fase' => '6. Evaluación de daños', 'inicio' => '13:10', 'fin' => '13:30', 'descripcion' => 'Miguel Villanueva corre un escaneo profundo con el antivirus corporativo sobre el servidor restaurado. Verifica junto con Martín Tadeo la integridad de las carpetas y realiza pruebas de acceso de lectura y escritura para asegurar que el entorno esté limpio y sano.'],
                    ['bloque' => 'Activación DRP', 'fase' => '7. Reanudación de operaciones', 'inicio' => '13:30', 'fin' => '13:45', 'descripcion' => 'Se rehabilitan los permisos de red en producción. Los usuarios confirman acceso normal a sus archivos compartidos. Jesús Marrón da por cerrado el simulacro de ciberseguridad con éxito y restablece las alertas normales de monitoreo.'],
                ],
            ],

            // -------------------------------------------------------------
            // 7. 18-02-2026
            // -------------------------------------------------------------
            [
                'fecha_prueba'       => '2026-02-18',
                'escenario'          => 'Falla de sistemas o componentes críticos (Falla de hardware en almacenamiento primario)',
                'consideraciones'    => "Descripción del escenario de recuperación: Tras un simulacro de sismo institucional con evacuación, un asentamiento o vibración en el SITE provoca una falla física mecánica en el arreglo de discos duros primarios (SAN/NAS) que almacena las máquinas virtuales operativas. Al retornar, los sistemas entran en estado crítico por pérdida de lectura/escritura de hardware.\nNo. De personas presentes: 70\nNo. De personas involucradas: 4",
                'personas_presentes' => 70,
                'personas_involucradas' => 4,
                'evacuacion_teorico' => null,
                'evacuacion_real'    => 0.25,
                'rpo_teorico'        => 1.25,
                'rpo_real'           => 0.00,
                'rto_teorico'        => 18.00,
                'rto_real'           => 1.80,
                'mtd_teorico'        => 19.25,
                'mtd_real'           => 2.05,
                'plan_efectivo'      => true,
                'porque_efectivo'    => 'Porque al contar con refacciones físicas inmediatas en el stock de IT y personal calificado en sitio, el tiempo de recuperación real fue exactamente 10 veces menor al tiempo estimado si se hubiera dependido del soporte técnico extendido del proveedor externo (18 horas).',
                'lecciones_aprendidas' => "Lecciones aprendidas:\nMantener refacciones críticas de hardware (discos homologados) directamente en el SITE de Niterra demostró ser una estrategia vital para mitigar fallas físicas sin penalizar la operación del negocio.\n\nOportunidades de mejora:\nProgramar rutinas de mantenimiento preventivo trimestrales específicas para verificar el estado de salud e integridad de los discos Hot-Spare (reserva), garantizando que su activación automática responda siempre correctamente.",
                'fases' => [
                    ['bloque' => 'Activación BCP', 'fase' => '1. Notificación', 'inicio' => '11:00', 'fin' => '11:15', 'descripcion' => 'Se activa la alerta sísmica y se procede a la evacuación civil. Al regresar a las oficinas (11:15), los monitores de infraestructura alertan fallas de hardware físicas (leds rojos en chasis). Miguel Villanueva constata la caída del arreglo principal y da aviso de inmediato a Jorge Guzmán.'],
                    ['bloque' => 'Activación BCP', 'fase' => '2. Evaluación', 'inicio' => '11:15', 'fin' => '11:35', 'descripcion' => 'Jorge Guzmán revisa el controlador de almacenamiento. Confirma que un disco duro crítico del arreglo colapsó mecánicamente y el disco de reserva (Hot-Spare) falló en montarse automáticamente. Reporta el daño de hardware a Jesús Marrón.'],
                    ['bloque' => 'Activación BCP', 'fase' => '3. Contención', 'inicio' => '11:35', 'fin' => '11:45', 'descripcion' => 'Jorge Guzmán aísla la cabina de almacenamiento afectada a nivel lógico en la red interna para prevenir corrupciones secundarias de datos en los servidores virtuales que aún permanecen estables.'],
                    ['bloque' => 'Activación BCP', 'fase' => '4. Comunicación', 'inicio' => '11:45', 'fin' => '12:05', 'descripcion' => 'Jesús Marrón evalúa los riesgos e impactos operativos. Declara formalmente la contingencia tecnológica por falla física de hardware (PER-01), notifica a la planta sobre los tiempos estimados de reparación técnica y autoriza la Activación del DRP.'],
                    ['bloque' => 'Activación DRP', 'fase' => '5. Mitigación', 'inicio' => '12:05', 'fin' => '12:45', 'descripcion' => 'Martín Tadeo extrae del stock de refacciones del SITE un disco duro nuevo compatible y realiza el reemplazo físico en caliente (Hot-swap). En paralelo, Jorge Guzmán fuerza de manera manual la reconstrucción del arreglo RAID desde la consola de administración de almacenamiento.'],
                    ['bloque' => 'Activación DRP', 'fase' => '6. Evaluación de daños', 'inicio' => '12:45', 'fin' => '13:00', 'descripcion' => 'Miguel Villanueva monitorea que el proceso de reconstrucción (rebuilding) avance sin errores. Corre scripts de verificación de lectura y valida junto con Martín Tadeo que las máquinas virtuales vuelvan a responder de manera ágil y correcta.'],
                    ['bloque' => 'Activación DRP', 'fase' => '7. Reanudación de operaciones', 'inicio' => '13:00', 'fin' => '13:05', 'descripcion' => 'El almacenamiento se estabiliza por completo y los aplicativos operativos vuelven a estar en línea para toda la planta. Jesús Marrón da por cerrado con éxito el simulacro técnico de hardware.'],
                ],
            ],

            // -------------------------------------------------------------
            // 8. 20-03-2026
            // -------------------------------------------------------------
            [
                'fecha_prueba'       => '2026-03-20',
                'escenario'          => 'Caída general de servicios de IT y telecomunicaciones (Falla de Core Switch)',
                'consideraciones'    => "Descripción del escenario de recuperación: El Switch Core principal del SITE sufre una falla crítica en su tarjeta madre (falla lógica/física de firmware) tras un ciclo de energía rutinario, interrumpiendo por completo la comunicación de datos entre todos los servidores, los segmentos de red de las áreas administrativas/operativas y la salida hacia la red externa de internet.\nNo. De personas presentes: 70\nNo. De personas involucradas: 4",
                'personas_presentes' => 70,
                'personas_involucradas' => 4,
                'evacuacion_teorico' => null,
                'evacuacion_real'    => 0.00,
                'rpo_teorico'        => 1.25,
                'rpo_real'           => 0.00,
                'rto_teorico'        => 22.00,
                'rto_real'           => 2.20,
                'mtd_teorico'        => 23.25,
                'mtd_real'           => 2.20,
                'plan_efectivo'      => true,
                'porque_efectivo'    => 'Porque al contar con un equipo switch de respaldo idéntico en el stock físico de IT y las plantillas de configuración actualizadas, el tiempo de recuperación real fue exactamente 10 veces menor al tiempo estimado en el peor escenario del F-IT-12 Rev. 1 Plan de continuidad de negocio (BCP) (22 horas).',
                'lecciones_aprendidas' => "Lecciones aprendidas:\nMantener un switch idéntico en modalidad Cold-Spare configurado con hardware homologado demostró ser indispensable para levantar la red interna sin depender de las garantías del fabricante que tardan días.\n\nOportunidad de mejora:\nAutomatizar las copias de seguridad de la configuración del switch core para que se guarden semanalmente de forma programada en un repositorio externo, garantizando que cualquier cambio de red reciente no se pierda al restaurar el equipo de respaldo.",
                'fases' => [
                    ['bloque' => 'Activación BCP', 'fase' => '1. Notificación', 'inicio' => '11:00', 'fin' => '11:15', 'descripcion' => 'A las 11:00, las alertas de monitoreo indican de forma masiva la desconexión de todos los nodos de la red local. Al mismo tiempo, el personal de la planta reporta pérdida total de acceso a sistemas. Miguel Villanueva se desplaza al SITE, observa que el Core Switch principal no responde (leds apagados en los puertos) y notifica de inmediato a Jorge Guzmán.'],
                    ['bloque' => 'Activación BCP', 'fase' => '2. Evaluación', 'inicio' => '11:15', 'fin' => '11:40', 'descripcion' => 'Jorge Guzmán intenta conectarse al switch por puerto de consola física para diagnóstico, pero el equipo no genera respuesta ni señal de arranque, confirmando una falla letal de hardware. Escala la gravedad y el impacto de aislamiento total de la planta a Jesús Marrón.'],
                    ['bloque' => 'Activación BCP', 'fase' => '3. Contención', 'inicio' => '11:40', 'fin' => '11:55', 'descripcion' => 'Jorge Guzmán instruye desconectar los cables de fibra óptica troncales del switch dañado para evitar bucles de red en los switches secundarios (esclavos) y preparar físicamente el área del rack para el desmonte.'],
                    ['bloque' => 'Activación BCP', 'fase' => '4. Comunicación', 'inicio' => '11:55', 'fin' => '12:15', 'descripcion' => 'Jesús Marrón declara formalmente la contingencia crítica de conectividad de red local. Notifica a la planta que no habrá servicios internos de red durante las próximas dos horas y autoriza oficialmente al staff de IT la Activación del DRP.'],
                    ['bloque' => 'Activación DRP', 'fase' => '5. Mitigación', 'inicio' => '12:15', 'fin' => '13:20', 'descripcion' => 'Martín Tadeo extrae del almacén de TI el switch Core de respaldo homologado (Cold-Spare) y procede al montaje físico en el rack. Simultáneamente, Jorge Guzmán y Miguel Villanueva cargan mediante consola la última copia de seguridad de la configuración de red (VLANs, ruteo y políticas) previamente respaldada.'],
                    ['bloque' => 'Activación DRP', 'fase' => '6. Evaluación de daños', 'inicio' => '13:20', 'fin' => '13:50', 'descripcion' => 'Una vez encendido el nuevo switch con su configuración cargada, Miguel Villanueva reconecta paulatinamente los enlaces de fibra y corre pruebas de conectividad (ping continuo). Valida junto con Martín Tadeo que los servidores operativos vuelvan a ser visibles en la red de Niterra.'],
                    ['bloque' => 'Activación DRP', 'fase' => '7. Reanudación de operaciones', 'inicio' => '13:50', 'fin' => '14:15', 'descripcion' => 'Los servicios LAN/WAN se estabilizan al 100%. Las áreas administrativas y de facturación confirman que el acceso a los sistemas web y ERP volvió a la normalidad. Jesús Marrón da por cerrado el simulacro de telecomunicaciones.'],
                ],
            ],

            // -------------------------------------------------------------
            // 9. 20-04-2026
            // -------------------------------------------------------------
            [
                'fecha_prueba'       => '2026-04-20',
                'escenario'          => 'Caída general de servicios de IT y telecomunicaciones (Corte de suministro eléctrico)',
                'consideraciones'    => "Descripción del escenario de recuperación: Durante el simulacro de incendio institucional se simula un corte total de energía por parte de la brigada de mantenimiento. Sin embargo, el sistema de transferencia automática hacia la planta de emergencia falla y las UPS de respaldo del SITE se agotan antes de restablecer la línea comercial, provocando un apagón repentino y apagado sucio de toda la infraestructura de red y servidores corporativos.\nNo. De personas presentes: 70\nNo. De personas involucradas: 4",
                'personas_presentes' => 70,
                'personas_involucradas' => 4,
                'evacuacion_teorico' => null,
                'evacuacion_real'    => 0.25,
                'rpo_teorico'        => 1.25,
                'rpo_real'           => 0.00,
                'rto_teorico'        => 32.00,
                'rto_real'           => 3.20,
                'mtd_teorico'        => 33.25,
                'mtd_real'           => 3.45,
                'plan_efectivo'      => true,
                'porque_efectivo'    => 'Porque al ejecutar un protocolo ordenado de encendido secuencial y aislamiento eléctrico preventivo, el tiempo de recuperación real fue 10 veces menor al tiempo estimado en el peor escenario del F-IT-12 Rev. 1 Plan de continuidad de negocio (BCP) (32 horas).',
                'lecciones_aprendidas' => "Lecciones aprendidas:\nEl protocolo de encendido secuencial de IT (Red -> Almacenamiento -> Servidores) funcionó perfectamente, evitando colisiones de dependencia lógicas entre las máquinas virtuales al arrancar.\n\nOportunidad de mejora:\nSolicitar formalmente al área de mantenimiento una revisión e inspección mensual preventiva sobre el interruptor de transferencia automática (ATS) de la planta de emergencia para asegurar que responda de forma autónoma ante un corte de luz real.",
                'fases' => [
                    ['bloque' => 'Activación BCP', 'fase' => '1. Notificación', 'inicio' => '11:00', 'fin' => '11:15', 'descripcion' => 'Se activa la alarma de incendio y se realiza la evacuación del edificio. Al retornar (11:15), el equipo de IT detecta que todo el SITE está completamente apagado y sin energía. Las UPS se agotaron debido a la falla de la planta de emergencia. Miguel Villanueva da aviso inmediato a Jorge Guzmán.'],
                    ['bloque' => 'Activación BCP', 'fase' => '2. Evaluación', 'inicio' => '11:15', 'fin' => '11:45', 'descripcion' => 'Jorge Guzmán coordina con el área de mantenimiento y confirma que la línea comercial de luz ha sido reestablecida, pero el tablero de distribución del SITE se encuentra bloqueado por seguridad. Reporta la gravedad del apagón general y los riesgos de daños en equipos a Jesús Marrón.'],
                    ['bloque' => 'Activación BCP', 'fase' => '3. Contención', 'inicio' => '11:45', 'fin' => '12:00', 'descripcion' => 'Jorge Guzmán instruye desconectar físicamente las fuentes de poder de los servidores críticos y almacenamiento (SAN) antes de levantar los interruptores principales, para contener y evitar daños por variaciones de voltaje de entrada.'],
                    ['bloque' => 'Activación BCP', 'fase' => '4. Comunicación', 'inicio' => '12:00', 'fin' => '12:20', 'descripcion' => 'Jesús Marrón declara formalmente la contingencia crítica de infraestructura por energía (PER-02). Notifica a los líderes de la planta que el arranque e inspección de los sistemas tomará algunas horas y autoriza formalmente al staff la Activación del DRP.'],
                    ['bloque' => 'Activación DRP', 'fase' => '5. Mitigación', 'inicio' => '12:20', 'fin' => '13:30', 'descripcion' => 'Martín Tadeo y mantenimiento coordinan el levantamiento manual de los interruptores del SITE. Una vez estabilizada la energía eléctrica, Jorge Guzmán y Martín inician el encendido secuencial y controlado de la infraestructura: Primero Core Switch, luego almacenamiento central, y finalmente los servidores virtuales.'],
                    ['bloque' => 'Activación DRP', 'fase' => '6. Evaluación de daños', 'inicio' => '13:30', 'fin' => '14:00', 'descripcion' => 'Miguel Villanueva verifica el estado de salud de los sistemas operativos tras el apagón sucio. Corre herramientas de comprobación de consistencia de discos y valida junto con el equipo que los switches perimetrales y los enlaces WAN con terceros se hayan reestablecido sin daños físicos.'],
                    ['bloque' => 'Activación DRP', 'fase' => '7. Reanudación de operaciones', 'inicio' => '14:00', 'fin' => '14:15', 'descripcion' => 'Los servicios de red y telecomunicaciones operan al 100%. Los usuarios de Niterra México confirman acceso estable al ERP y sistemas de facturación. Jesús Marrón da por cerrado el simulacro de energía con éxito.'],
                ],
            ],

            // -------------------------------------------------------------
            // 10. 06-05-2026
            // -------------------------------------------------------------
            [
                'fecha_prueba'       => '2026-05-06',
                'escenario'          => 'Falla de sistemas o componentes críticos (Falla de hardware en servidor)',
                'consideraciones'    => "Descripción del escenario de recuperación: Tras la evacuación física del personal por el sismo, una descarga estática o vibración en el rack provoca el daño físico total de la tarjeta de red (NIC) del servidor físico que aloja las aplicaciones web de producción. Al regresar a las estaciones de trabajo, los usuarios no pueden establecer comunicación con la plataforma de operaciones.\nNo. De personas presentes: 70\nNo. De personas involucradas: 4",
                'personas_presentes' => 70,
                'personas_involucradas' => 4,
                'evacuacion_teorico' => null,
                'evacuacion_real'    => 0.25,
                'rpo_teorico'        => 1.25,
                'rpo_real'           => 0.00,
                'rto_teorico'        => 16.00,
                'rto_real'           => 1.60,
                'mtd_teorico'        => 17.25,
                'mtd_real'           => 1.85,
                'plan_efectivo'      => true,
                'porque_efectivo'    => 'Porque al contar con componentes de expansión modulares de stock inmediato en el SITE, el tiempo de recuperación real fue exactamente 10 veces menor al tiempo estimado en el peor escenario del F-IT-12 Rev. 1 Plan de continuidad de negocio (BCP) (16 horas).',
                'lecciones_aprendidas' => "Lecciones aprendidas:\nDisponer de componentes de red y hardware modular genérico homologado en el almacén de IT demostró ser una contramedida indispensable para mitigar incidentes físicos en minutos.\n\nOportunidad de mejora:\nDocumentar en un manual fotográfico rápido el procedimiento de apertura de chasis y asignación de puertos PCIe específicos para los servidores de producción, asegurando que Martín o Miguel puedan realizar el reemplazo mecánico ágilmente bajo situaciones de alta presión.",
                'fases' => [
                    ['bloque' => 'Activación BCP', 'fase' => '1. Notificación', 'inicio' => '11:00', 'fin' => '11:10', 'descripcion' => 'Se activa la alerta sísmica corporativa y el personal evacúa hacia los puntos de reunión. Al regresar a las oficinas, los usuarios reportan interrupción de acceso a los portales internos. Miguel Villanueva inspecciona la consola del hipervisor y detecta pérdida total de conectividad en el nodo físico de producción. Notifica a Jorge Guzmán.'],
                    ['bloque' => 'Activación BCP', 'fase' => '2. Evaluación', 'inicio' => '11:10', 'fin' => '11:20', 'descripcion' => 'Jorge Guzmán ingresa físicamente al SITE para inspeccionar el servidor. Detecta que los indicadores LED traseros de la tarjeta de red integrada están completamente apagados y el hardware no es reconocido a nivel de BIOS. Reporta la falla física a Jesús Marrón.'],
                    ['bloque' => 'Activación BCP', 'fase' => '3. Contención', 'inicio' => '11:30', 'fin' => '11:40', 'descripcion' => 'Jorge Guzmán ejecuta el protocolo de contención aislando de forma lógica las interfaces huérfanas en el switch core y redirige los flujos de peticiones del balanceador hacia una página temporal de mantenimiento técnico.'],
                    ['bloque' => 'Activación BCP', 'fase' => '4. Comunicación', 'inicio' => '11:40', 'fin' => '11:55', 'descripcion' => 'Jesús Marrón declara formalmente la contingencia tecnológica por falla de hardware crítico (PER-01). Notifica a las gerencias comerciales sobre la interrupción temporal del servicio web y autoriza al staff la Activación del DRP.'],
                    ['bloque' => 'Activación DRP', 'fase' => '5. Mitigación', 'inicio' => '11:55', 'fin' => '12:10', 'descripcion' => 'Martín Tadeo extrae del inventario del SITE una tarjeta de red de expansión modular PCIe homologada. Con el servidor apagado de forma segura, realiza la instalación física de la nueva tarjeta. Jorge Guzmán reconecta los enlaces de fibra óptica y enciende el equipo para el aprovisionamiento de drivers.'],
                    ['bloque' => 'Activación DRP', 'fase' => '6. Evaluación de daños', 'inicio' => '12:10', 'fin' => '12:20', 'descripcion' => 'Miguel Villanueva reconfigura el direccionamiento IP de la nueva interfaz e inicia pruebas de tráfico de red (ping continuo y paso de paquetes). Valida junto con Martín Tadeo que las máquinas virtuales del entorno web vuelvan a ser visibles externamente.'],
                    ['bloque' => 'Activación DRP', 'fase' => '7. Reanudación de operaciones', 'inicio' => '12:20', 'fin' => '12:30', 'descripcion' => 'Se desactiva la página de mantenimiento y se restablece el balanceo de producción al 100%. Los usuarios confirman acceso normal al portal. Jesús Marrón da por cerrado con éxito el simulacro de recuperación física.'],
                ],
            ],
        ];

        // Orden cronológico por fecha de prueba
        usort($reportes, fn($a, $b) => strcmp($a['fecha_prueba'], $b['fecha_prueba']));

        DB::transaction(function () use ($reportes, $creador) {
            $consecutivoPorAnio = [];

            foreach ($reportes as $item) {
                $year = Carbon::parse($item['fecha_prueba'])->format('Y');

                if (!isset($consecutivoPorAnio[$year])) {
                    $consecutivoPorAnio[$year] = 1;
                } else {
                    $consecutivoPorAnio[$year]++;
                }

                $folio = $this->generarFolio($item['fecha_prueba'], $consecutivoPorAnio[$year]);

                $reporte = FormatoIt11Reporte::updateOrCreate(
                    ['folio' => $folio],
                    [
                        'area_negocio'          => 'IT',
                        'unidad_funcional'      => 'Niterra México',
                        'fecha_prueba'          => $item['fecha_prueba'],
                        'responsable_respuesta' => 'Operations Department Emergency Response Head Office',
                        'escenario'             => $item['escenario'],
                        'lugar_entrevista'      => 'Niterra México, Depto IT',
                        'consideraciones'       => $item['consideraciones'],
                        'personas_presentes'    => $item['personas_presentes'],
                        'personas_involucradas' => $item['personas_involucradas'],
                        'evacuacion_teorico'    => $item['evacuacion_teorico'],
                        'evacuacion_real'       => $item['evacuacion_real'],
                        'rpo_teorico'           => $item['rpo_teorico'],
                        'rpo_real'              => $item['rpo_real'],
                        'rto_teorico'           => $item['rto_teorico'],
                        'rto_real'              => $item['rto_real'],
                        'mtd_teorico'           => $item['mtd_teorico'],
                        'mtd_real'              => $item['mtd_real'],
                        'plan_efectivo'         => $item['plan_efectivo'],
                        'porque_efectivo'       => $item['porque_efectivo'],
                        'lecciones_aprendidas'  => $item['lecciones_aprendidas'],
                        'user_id_creador'       => $creador->id,
                    ]
                );

                // Insertar las fases correspondientes
                foreach ($item['fases'] as $fase) {
                    FormatoIt11Fase::updateOrCreate(
                        [
                            'fmt_it_11_reporte_id' => $reporte->id,
                            'fase'                 => $fase['fase'],
                        ],
                        [
                            'bloque'      => $fase['bloque'],
                            'inicio'      => $fase['inicio'],
                            'fin'         => $fase['fin'],
                            'descripcion' => $fase['descripcion'],
                        ]
                    );
                }

                $this->command->line(" ✓ Reporte [{$folio}] sembrado: {$item['fecha_prueba']} ({$item['escenario']})");
            }
        });

        $this->command->info('¡Los 10 reportes FMT-IT-11 y sus fases han sido sembrados con éxito!');
    }
}