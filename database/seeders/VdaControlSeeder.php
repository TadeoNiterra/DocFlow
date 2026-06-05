<?php

namespace Database\Seeders;

use App\Models\VdaControl;
use Illuminate\Database\Seeder;

class VdaControlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiamos la tabla para evitar duplicados en las pruebas de siembra
        VdaControl::query()->delete();

        // 🧠 Repositorio temporal para almacenar los IDs de los nodos padres
        $nodes = [];

        // ==========================================
        // 📊 CAPÍTULO 1: POLÍTICAS Y ORGANIZACIÓN
        // ==========================================
        $nodes['c1'] = VdaControl::create([
            'number' => '1',
            'name' => 'Políticas de Seguridad de la Información y Organización',
            'description' => 'Establecimiento de directrices maestras de seguridad y la estructura de gobernanza interna.',
            'solution_description' => 'Se define una directiva maestra firmada por la presidencia, alineada a los objetivos del negocio y vinculada a un reglamento interno para aplicar sanciones en caso de faltas.',
            'parent_id' => null,
            'sort_order' => 1,
        ])->id;

        $nodes['c1.1'] = VdaControl::create([
            'number' => '1.1',
            'name' => 'Políticas de Seguridad de la Información',
            'description' => 'Estructura general de las directrices de seguridad.',
            'solution_description' => 'Se establece la estructura formal de las directrices de seguridad informática de la organización.',
            'parent_id' => $nodes['c1'],
            'sort_order' => 2,
        ])->id;

        VdaControl::create([
            'number' => '1.1.1',
            'name' => '¿En qué medida están disponibles las políticas de seguridad de la información?',
            'description' => 'Disponibilidad y alcance de las políticas internas.',
            'solution_description' => 'Publicación de la política general en un repositorio centralizado de consulta interna y comunicación formal a socios comerciales y empleados.',
            'parent_id' => $nodes['c1.1'],
            'sort_order' => 3,
        ]);

        $nodes['c1.2'] = VdaControl::create([
            'number' => '1.2',
            'name' => 'Organización de la Seguridad de la Información',
            'description' => 'Estructura y gobernanza interna para la toma de decisiones y asignación de responsabilidades de TI.',
            'solution_description' => 'Se establece el organigrama oficial con roles específicos asignados al comité de crisis (ISMT), al administrador de seguridad (ISM) y al soporte operativo.',
            'parent_id' => $nodes['c1'],
            'sort_order' => 4,
        ])->id;

        VdaControl::create([
            'number' => '1.2.1',
            'name' => '¿En qué medida se gestiona la seguridad de la información dentro de la organización?',
            'description' => 'Dirección estratégica y mejora continua del SGSI.',
            'solution_description' => 'Reuniones periódicas y revisiones anuales documentadas del comité para analizar el desempeño y la mejora continua del sistema.',
            'parent_id' => $nodes['c1.2'],
            'sort_order' => 5,
        ]);

        VdaControl::create([
            'number' => '1.2.2',
            'name' => '¿En qué medida están organizadas las responsabilidades de seguridad de la información?',
            'description' => 'Asignación formal de obligaciones contractuales de TI.',
            'solution_description' => 'Inclusión de las obligaciones de seguridad informática dentro de las descripciones formales de puesto del personal de TI y mandos gerenciales.',
            'parent_id' => $nodes['c1.2'],
            'sort_order' => 6,
        ]);

        VdaControl::create([
            'number' => '1.2.3',
            'name' => '¿En qué medida se consideran los requisitos de seguridad de la información en los proyectos?',
            'description' => 'Seguridad informática desde la planeación de proyectos nuevos.',
            'solution_description' => 'Implementación obligatoria de análisis de riesgos tecnológicos en las etapas iniciales de planeación, utilizando cronogramas con criterios de aceptación.',
            'parent_id' => $nodes['c1.2'],
            'sort_order' => 7,
        ]);

        VdaControl::create([
            'number' => '1.2.4',
            'name' => '¿En qué medida están definidas las responsabilidades entre los proveedores externos de servicios de TI y la propia organización?',
            'description' => 'Delimitación de responsabilidades y soporte con proveedores de TI externos.',
            'solution_description' => 'Acuerdos de nivel de servicio (SLA) y contratos que delimitan qué actividades pertenecen al equipo interno y cuáles al soporte del fabricante.',
            'parent_id' => $nodes['c1.2'],
            'sort_order' => 8,
        ]);

        $nodes['c1.3'] = VdaControl::create([
            'number' => '1.3',
            'name' => 'Gestión de Activos',
            'description' => 'Control, inventariado y clasificación del ciclo de vida de los recursos tecnológicos.',
            'solution_description' => 'Regulación del ciclo de vida de los recursos de hardware, software y plataformas digitales utilizados en la empresa.',
            'parent_id' => $nodes['c1'],
            'sort_order' => 9,
        ])->id;

        VdaControl::create([
            'number' => '1.3.1',
            'name' => '¿En qué medida se identifican y registran los activos de información?',
            'description' => 'Mantenimiento del Inventario Maestro de Activos.',
            'solution_description' => 'Mantenimiento de una base de datos viva que registra números de serie, marcas, licencias y la asignación de un propietario responsable para cada recurso.',
            'parent_id' => $nodes['c1.3'],
            'sort_order' => 10,
        ]);

        VdaControl::create([
            'number' => '1.3.2',
            'name' => '¿En qué medida se clasifican y gestionan los activos de información en función de sus necesidades de protección?',
            'description' => 'Clasificación de la información por niveles de confidencialidad.',
            'solution_description' => 'Mapeo y etiquetado de los datos por niveles de confidencialidad, aplicando restricciones de manejo proporcionales a su criticidad.',
            'parent_id' => $nodes['c1.3'],
            'sort_order' => 11,
        ]);

        VdaControl::create([
            'number' => '1.3.3',
            'name' => '¿En qué medida se garantiza que solo se utilicen servicios de TI externos evaluados y aprobados para el procesamiento de los activos de información de la organización?',
            'description' => 'Evaluación de seguridad para la contratación de servicios externos.',
            'solution_description' => 'Proceso de debida diligencia técnica y legal para validar las capacidades de protección del proveedor antes de contratar servicios de infraestructura o nube.',
            'parent_id' => $nodes['c1.3'],
            'sort_order' => 12,
        ]);

        VdaControl::create([
            'number' => '1.3.4',
            'name' => '¿En qué medida se garantiza que solo se utilice software evaluado y aprobado para el procesamiento de los activos de información de la organización?',
            'description' => 'Restricción e instalación de programas informáticos autorizados.',
            'solution_description' => 'Restricción de permisos de usuario para impedir la instalación libre de programas sin previa validación de compatibilidad y seguridad por el área de TI.',
            'parent_id' => $nodes['c1.3'],
            'sort_order' => 13,
        ]);

        $nodes['c1.4'] = VdaControl::create([
            'number' => '1.4',
            'name' => 'Gestión de Riesgos de Seguridad de la Información',
            'description' => 'Framework metodológico para identificar vulnerabilidades y amenazas.',
            'solution_description' => 'Framework para identificar vulnerabilidades y amenazas en los entornos operativos de la empresa.',
            'parent_id' => $nodes['c1'],
            'sort_order' => 14,
        ])->id;

        VdaControl::create([
            'number' => '1.4.1',
            'name' => '¿En qué medida se gestionan los riesgos de seguridad de la información?',
            'description' => 'Evaluación matemática de riesgos e impactos operativos.',
            'solution_description' => 'Evaluación matemática del nivel de riesgo realizado al menos una vez al año para determinar planes de mitigación inmediatos.',
            'parent_id' => $nodes['c1.4'],
            'sort_order' => 15,
        ]);

        $nodes['c1.5'] = VdaControl::create([
            'number' => '1.5',
            'name' => 'Evaluaciones de Cumplimiento',
            'description' => 'Mecanismos de control e inspección para validar el funcionamiento del SGSI.',
            'solution_description' => 'Mecanismos de control para validar el correcto funcionamiento del SGSI.',
            'parent_id' => $nodes['c1'],
            'sort_order' => 16,
        ])->id;

        VdaControl::create([
            'number' => '1.5.1',
            'name' => '¿En qué medida se garantiza el cumplimiento de la seguridad de la información en los procedimientos y procesos?',
            'description' => 'Auditorías internas recurrentes integradas en bitácoras.',
            'solution_description' => 'Auditorías e inspecciones internas integradas dentro de las bitácoras de mantenimientos preventivos a los sistemas informáticos.',
            'parent_id' => $nodes['c1.5'],
            'sort_order' => 17,
        ]);

        VdaControl::create([
            'number' => '1.5.2',
            'name' => '¿En qué medida es revisado el SGSI por una autoridad independiente?',
            'description' => 'Auditorías externas con expertos certificados.',
            'solution_description' => 'Planificación y ejecución anual de auditorías externas e independientes contratadas con terceros expertos para certificar el cumplimiento del estándar.',
            'parent_id' => $nodes['c1.5'],
            'sort_order' => 18,
        ]);

        $nodes['c1.6'] = VdaControl::create([
            'number' => '1.6',
            'name' => 'Gestión de Incidentes y Crisis',
            'description' => 'Flujos de respuesta estructurados ante fallas críticas o brechas de seguridad.',
            'solution_description' => 'Respuestas ante fallas operativas o brechas de ciberseguridad.',
            'parent_id' => $nodes['c1'],
            'sort_order' => 19,
        ])->id;

        VdaControl::create([
            'number' => '1.6.1',
            'name' => '¿En qué medida se reportan los eventos u observaciones relevantes para la seguridad de la información?',
            'description' => 'Canales centralizados de Service Desk para reportes de usuarios.',
            'solution_description' => 'Mecanismos centralizados dentro del Service Desk para que los usuarios notifiquen comportamientos anómalos o intentos de fraude de manera oportuna.',
            'parent_id' => $nodes['c1.6'],
            'sort_order' => 20,
        ]);

        VdaControl::create([
            'number' => '1.6.2',
            'name' => '¿En qué medida se gestionan los eventos de seguridad reportados?',
            'description' => 'Clasificación, contención del daño y análisis de causa raíz.',
            'solution_description' => 'Flujo estricto de atención que clasifica los incidentes por severidad, asigna personal especializado, contiene el daño y documenta la causa raíz.',
            'parent_id' => $nodes['c1.6'],
            'sort_order' => 21,
        ]);

        VdaControl::create([
            'number' => '1.6.3',
            'name' => '¿En qué medida está preparada la organización para manejar situaciones de crisis?',
            'description' => 'Cadenas de llamadas, comités de emergencia y flujos globales.',
            'solution_description' => 'Estructuración de comités de emergencia, cadenas de llamadas críticas y flujos lógicos para coordinar las contingencias directamente con las sedes regionales globales.',
            'parent_id' => $nodes['c1.6'],
            'sort_order' => 22,
        ]);

        // ==========================================
        // 👥 CAPÍTULO 2: RECURSOS HUMANOS
        // ==========================================
        $nodes['c2'] = VdaControl::create([
            'number' => '2',
            'name' => 'Recursos Humanos',
            'description' => 'Gestión de la seguridad de la información vinculada al comportamiento del personal, contratistas y terceros.',
            'solution_description' => 'Marco regulatorio aplicable a colaboradores internos, contratistas y terceros con accesos a la información.',
            'parent_id' => null,
            'sort_order' => 23,
        ])->id;

        // 🚀 NUEVO ESLABÓN INTERMEDIO NIVEL 2
        $nodes['c2.1'] = VdaControl::create([
            'number' => '2.1',
            'name' => 'Gestión de Recursos Humanos',
            'description' => 'Procesos relacionados con personal y seguridad de la información.',
            'solution_description' => 'Gestión de requisitos de seguridad aplicables a empleados y colaboradores.',
            'parent_id' => $nodes['c2'],
            'sort_order' => 24,
        ])->id;

        VdaControl::create([
            'number' => '2.1.1',
            'name' => '¿En qué medida se garantiza la cualificación de los empleados para áreas de trabajo sensibles?',
            'description' => 'Validación de competencias y perfiles técnicos de puesto.',
            'solution_description' => 'Validación de perfiles, experiencia y competencias técnicas reflejadas en las descripciones de puesto antes de otorgar privilegios administrativos.',
            'parent_id' => $nodes['c2.1'], // 🚀 Enlazado al subtema
            'sort_order' => 25,
        ]);

        VdaControl::create([
            'number' => '2.1.2',
            'name' => '¿En qué medida está todo el personal obligado contractualmente a cumplir con las políticas de seguridad de la información?',
            'description' => 'Firma mandatoria de acuerdos de confidencialidad (NDA).',
            'solution_description' => 'Firma mandatoria de acuerdos de confidencialidad (NDA) y cartas responsivas individuales al momento de ingresar a la empresa o recibir activos.',
            'parent_id' => $nodes['c2.1'], // 🚀 Enlazado al subtema
            'sort_order' => 26,
        ]);

        VdaControl::create([
            'number' => '2.1.3',
            'name' => '¿En qué medida se concientiza y capacita al personal respecto a los riesgos derivados del manejo de la información?',
            'description' => 'Campañas periódicas sobre Phishing, Malware y Ciberseguridad.',
            'solution_description' => 'Campañas periódicas de sensibilización y capacitaciones obligatorias enfocadas en la detección de malware, phishing y navegación segura.',
            'parent_id' => $nodes['c2.1'], // 🚀 Enlazado al subtema
            'sort_order' => 27,
        ]);

        VdaControl::create([
            'number' => '2.1.4',
            'name' => '¿En qué medida está regulado el trabajo móvil / remoto?',
            'description' => 'Políticas para Home Office y resguardo de equipos portátiles.',
            'solution_description' => 'Regulación del uso de dispositivos portátiles y personales en el entorno laboral y fuera de él, limitando el almacenamiento local de información crítica.',
            'parent_id' => $nodes['c2.1'], // 🚀 Enlazado al subtema
            'sort_order' => 28,
        ]);

        // ==========================================
        // 🏢 CAPÍTULO 3: SEGURIDAD FÍSICA
        // ==========================================
        $nodes['c3'] = VdaControl::create([
            'number' => '3',
            'name' => 'Seguridad Física',
            'description' => 'Protección del entorno físico, site corporativo, andenes e instalaciones de soporte.',
            'solution_description' => 'Delimitación de barreras y perímetros para evitar accesos no autorizados a la infraestructura.',
            'parent_id' => null,
            'sort_order' => 29,
        ])->id;

        // 🚀 NUEVO ESLABÓN INTERMEDIO NIVEL 2
        $nodes['c3.1'] = VdaControl::create([
            'number' => '3.1',
            'name' => 'Seguridad Física y Ambiental',
            'description' => 'Protección de instalaciones y activos físicos.',
            'solution_description' => 'Gestión de controles físicos para proteger la información.',
            'parent_id' => $nodes['c3'],
            'sort_order' => 30,
        ])->id;

        VdaControl::create([
            'number' => '3.1.1',
            'name' => '¿En qué medida se gestionan las zonas de seguridad para proteger los activos de información?',
            'description' => 'Clasificación de áreas físicas mediante mapas de calor y colores.',
            'solution_description' => 'Clasificación de las áreas físicas de la empresa mediante mapas y códigos de colores, restringiendo el ingreso a zonas críticas según el perfil del empleado o visitante.',
            'parent_id' => $nodes['c3.1'], // 🚀 Enlazado al subtema
            'sort_order' => 31,
        ]);

        VdaControl::create([
            'number' => '3.1.2',
            'name' => 'Sustituido por los controles 1.6.3, 5.2.8 y 5.2.9',
            'description' => 'Reubicación de control.',
            'solution_description' => 'Punto sustituido por los controles de resiliencia y continuidad tecnológica en la versión 6.0.',
            'parent_id' => $nodes['c3.1'], // 🚀 Enlazado al subtema
            'sort_order' => 32,
        ]);

        VdaControl::create([
            'number' => '3.1.3',
            'name' => '¿En qué medida se gestiona el mantenimiento de los activos de soporte e instalaciones?',
            'description' => 'Mantenimiento preventivo a equipos HVAC, UPS y plantas secundarias.',
            'solution_description' => 'Mantenimiento anual de sistemas eléctricos, equipos HVAC, plantas secundarias de energía y sistemas de extinción de incendios en el Site.',
            'parent_id' => $nodes['c3.1'], // 🚀 Enlazado al subtema
            'sort_order' => 33,
        ]);

        VdaControl::create([
            'number' => '3.1.4',
            'name' => '¿En qué medida se gestiona el manejo de dispositivos portátiles de TI y dispositivos de almacenamiento de datos móviles?',
            'description' => 'Control y resguardo discreto de laptops y mochilas.',
            'solution_description' => 'Reglas estrictas de transportación, prohibición de dejar equipos desatendidos en espacios públicos y uso obligatorio de mochilas o estuches discretos.',
            'parent_id' => $nodes['c3.1'], // 🚀 Enlazado al subtema
            'sort_order' => 34,
        ]);

        // ==========================================
        // 🔐 CAPÍTULO 4: IDENTIDADES Y ACCESOS
        // ==========================================
        $nodes['c4'] = VdaControl::create([
            'number' => '4',
            'name' => 'Gestión de Identidades y Accesos',
            'description' => 'Gobernanza lógica sobre cuentas de usuario, credenciales criptográficas y privilegios.',
            'solution_description' => 'Administración y segregación de perfiles lógicos y medios físicos de identificación.',
            'parent_id' => null,
            'sort_order' => 35,
        ])->id;

        $nodes['c4.1'] = VdaControl::create([
            'number' => '4.1',
            'name' => 'Gestión de Identidades',
            'description' => 'Procesos de asignación y baja de medios de autenticación físicos y digitales.',
            'solution_description' => 'Gestión centralizada del ciclo de vida de las credenciales institucionales.',
            'parent_id' => $nodes['c4'],
            'sort_order' => 36,
        ])->id;

        VdaControl::create([
            'number' => '4.1.1',
            'name' => '¿En qué medida se gestiona el uso de los medios de identificación?',
            'description' => 'Ciclo de tarjetas de proximidad controladas por RH y Sistemas.',
            'solution_description' => 'Proceso de solicitud, asignación de perfiles y revocación inmediata de tarjetas físicas de proximidad controladas por Recursos Humanos y TI.',
            'parent_id' => $nodes['c4.1'],
            'sort_order' => 37,
        ]);

        VdaControl::create([
            'number' => '4.1.2',
            'name' => '¿En qué medida está asegurado el acceso de los usuarios a los servicios y sistemas de TI?',
            'description' => 'Autenticación bajo el principio de menor privilegio lógico.',
            'solution_description' => 'Autenticación forzosa a la red y servidores mediante el principio de menor privilegio, inhabilitando o borrando las cuentas genéricas o de prueba.',
            'parent_id' => $nodes['c4.1'],
            'sort_order' => 38,
        ]);

        VdaControl::create([
            'number' => '4.1.3',
            'name' => '¿En qué medida se gestionan y aplican de forma segura las cuentas de usuario y la información de inicio de sesión?',
            'description' => 'Bóvedas criptográficas centralizadas para contraseñas de TI.',
            'solution_description' => 'Resguardo de contraseñas mediante software de bóveda criptográfica centralizada (DELINEA), prohibiendo estrictamente guardar credenciales en texto plano.',
            'parent_id' => $nodes['c4.1'],
            'sort_order' => 39,
        ]);

        $nodes['c4.2'] = VdaControl::create([
            'number' => '4.2',
            'name' => 'Gestión de Accesos',
            'description' => 'Matrices de derechos y recertificaciones de accesos.',
            'solution_description' => 'Asignación basada en la matriz oficial de perfiles corporativos.',
            'parent_id' => $nodes['c4'],
            'sort_order' => 40,
        ])->id;

        VdaControl::create([
            'number' => '4.2.1',
            'name' => '¿En qué medida se asignan y gestionan los derechos de acceso?',
            'description' => 'Revisiones trimestrales de recertificación de privilegios.',
            'solution_description' => 'Asignación de permisos lógicos estructurados en una matriz oficial (Súper Administrador, Administrador, Privilegiado y Genérico) emparejados con revisiones trimestrales de recertificación.',
            'parent_id' => $nodes['c4.2'],
            'sort_order' => 41,
        ]);

        // ==========================================
        // 💻 CAPÍTULO 5: SEGURIDAD DE TI / CIBERSEGURIDAD
        // ==========================================
        $nodes['c5'] = VdaControl::create([
            'number' => '5',
            'name' => 'Seguridad de TI y Ciberseguridad',
            'description' => 'Cifrado robusto, protección operativa, aislamiento de entornos, EDR y DRP.',
            'solution_description' => 'Políticas tecnológicas complejas para blindar la infraestructura productiva.',
            'parent_id' => null,
            'sort_order' => 42,
        ])->id;

        $nodes['c5.1'] = VdaControl::create([
            'number' => '5.1',
            'name' => 'Criptografía',
            'description' => 'Salvaguardas criptográficas para datos en reposo y tránsito.',
            'solution_description' => 'Aplicación de algoritmos robustos controlados por sistemas.',
            'parent_id' => $nodes['c5'],
            'sort_order' => 43,
        ])->id;

        VdaControl::create([
            'number' => '5.1.1',
            'name' => '¿En qué medida se gestiona el uso de los procedimientos criptográficos?',
            'description' => 'Cifrado de disco completo (BitLocker) administrado de forma central.',
            'solution_description' => 'Cifrado mandatorio a nivel de disco completo en todas las estaciones de trabajo portátiles usando algoritmos robustos controlados por el área de sistemas.',
            'parent_id' => $nodes['c5.1'],
            'sort_order' => 44,
        ]);

        VdaControl::create([
            'number' => '5.1.2',
            'name' => '¿En qué medida se protege la información durante su transferencia?',
            'description' => 'Túneles VPN corporativos, TLS y firmas de correo.',
            'solution_description' => 'Uso obligatorio de conexiones cifradas (túneles VPN) para el trabajo remoto, protocolos TLS para correo electrónico y firmas con avisos de privacidad integrados.',
            'parent_id' => $nodes['c5.1'],
            'sort_order' => 45,
        ]);

        $nodes['c5.2'] = VdaControl::create([
            'number' => '5.2',
            'name' => 'Seguridad Operativa',
            'description' => 'Auditorías técnicas, parches de vulnerabilidades, respaldos y segmentación de redes.',
            'solution_description' => 'Rutinas de control operacional y mitigación de fallas técnicas críticas.',
            'parent_id' => $nodes['c5'],
            'sort_order' => 46,
        ])->id;

        VdaControl::create([
            'number' => '5.2.1',
            'name' => '¿En qué medida se gestionan los cambios?',
            'description' => 'Análisis de impacto y propósito mediante folios autorizados.',
            'solution_description' => 'Proceso formal foliado para analizar el impacto, propósito y riesgos antes de realizar cualquier modificación en la infraestructura de producción.',
            'parent_id' => $nodes['c5.2'],
            'sort_order' => 47,
        ]);

        VdaControl::create([
            'number' => '5.2.2',
            'name' => '¿En qué medida están separados los entornos de desarrollo y pruebas de los entornos operativos?',
            'description' => 'Aislamiento lógico para evitar corrupciones de bases de datos.',
            'solution_description' => 'Aislamiento estricto de las bases de datos y servidores de desarrollo/pruebas frente al entorno productivo real para evitar corrupciones de datos.',
            'parent_id' => $nodes['c5.2'],
            'sort_order' => 48,
        ]);

        VdaControl::create([
            'number' => '5.2.3',
            'name' => '¿En qué medida están protegidos los sistemas de TI contra el malware?',
            'description' => 'Sistemas EDR administrados en la nube con escaneo continuo.',
            'solution_description' => 'Despliegue centralizado e ininterrumpido de software de detección en puntos finales (EDR) con actualización y escaneo automático de amenazas.',
            'parent_id' => $nodes['c5.2'],
            'sort_order' => 49,
        ]);

        VdaControl::create([
            'number' => '5.2.4',
            'name' => '¿En qué medida se registran y analizan los registros de eventos (logs)?',
            'description' => 'Almacenamiento inmodificable de intentos de inicio fallidos.',
            'solution_description' => 'Almacenamiento inmodificable de eventos críticos (inicios de sesión, intentos fallidos) auditados trimestralmente para identificar anomalías.',
            'parent_id' => $nodes['c5.2'],
            'sort_order' => 50,
        ]);

        VdaControl::create([
            'number' => '5.2.5',
            'name' => '¿En qué medida se identifican y abordan las vulnerabilidades?',
            'description' => 'Escaneos automatizados de parches faltantes en infraestructura.',
            'solution_description' => 'Uso de herramientas automatizadas (ManageEngine / Nexpose) para escanear parches pendientes y ejecutar instalaciones prioritarias o mitigar riesgos de seguridad.',
            'parent_id' => $nodes['c5.2'],
            'sort_order' => 51,
        ]);

        VdaControl::create([
            'number' => '5.2.6',
            'name' => '¿En qué medida se comprueban técnicamente los sistemas y servicios de TI (auditoría de sistemas)?',
            'description' => 'Pruebas anuales de penetración (Pentesting) con firmas externas.',
            'solution_description' => 'Coordinación anual de revisiones independientes y pruebas de penetración (Pentesting) a través de proveedores expertos externos certificados.',
            'parent_id' => $nodes['c5.2'],
            'sort_order' => 52,
        ]);

        VdaControl::create([
            'number' => '5.2.7',
            'name' => '¿En qué medida se gestiona la red de la organización?',
            'description' => 'Segmentación de VLANs e inspección de direcciones MAC e IP.',
            'solution_description' => 'Segmentación física y lógica de la red (Visitantes, Operación, VIP) y controles de acceso basados en la autenticación de direcciones MAC/IP.',
            'parent_id' => $nodes['c5.2'],
            'sort_order' => 53,
        ]);

        VdaControl::create([
            'number' => '5.2.8',
            'name' => '¿En qué medida se cuenta con una planificación de la continuidad de los servicios de TI?',
            'description' => 'Métricas e indicadores de recuperación técnica (RTO/RPO).',
            'solution_description' => 'Desarrollo de planes específicos de recuperación (DRP) ante escenarios críticos de caída de servicios o ciberataques, midiendo métricas de tiempo de recuperación (RTO/RPO).',
            'parent_id' => $nodes['c5.2'],
            'sort_order' => 54,
        ]);

        VdaControl::create([
            'number' => '5.2.9',
            'name' => '¿En qué medida está garantizado el respaldo y la recuperación de datos y servicios de TI?',
            'description' => 'Copias encriptadas con cifrado robusto AES256 y montajes virtuales.',
            'solution_description' => 'Se ejecutan respaldos automatizados (totales, diferenciales o incrementales) bajo cifrado AES256, realizando montajes de prueba virtuales que simulan el entorno productivo para validar que la restauración no corrompa los datos.',
            'parent_id' => $nodes['c5.2'],
            'sort_order' => 55,
        ]);

        $nodes['c5.3'] = VdaControl::create([
            'number' => '5.3',
            'name' => 'Adquisición de Sistemas, Gestión de Requisitos y Desarrollo',
            'description' => 'Ciclo de vida seguro del desarrollo de software y contratación en la nube.',
            'solution_description' => 'Marco regulatorio para controlar el ciclo de vida seguro del software, la contratación de infraestructura en la nube y el desarrollo de nuevas herramientas operativas.',
            'parent_id' => $nodes['c5'],
            'sort_order' => 56,
        ])->id;

        VdaControl::create([
            'number' => '5.3.1',
            'name' => '¿En qué medida se considera la seguridad de la información en los sistemas de TI nuevos o en desarrollo?',
            'description' => 'Validación previa de cifrados y parchados antes del despliegue.',
            'solution_description' => 'Todo nuevo módulo o tecnología pasa por un análisis de viabilidad técnica que evalúa de forma obligatoria el cifrado de base de datos, métodos de autenticación y planes de parchado continuo.',
            'parent_id' => $nodes['c5.3'],
            'sort_order' => 57,
        ]);

        VdaControl::create([
            'number' => '5.3.2',
            'name' => '¿En qué medida están definidos los requisitos para los servicios de red?',
            'description' => 'Enrutamiento encriptado forzoso a servidores de bases de datos.',
            'solution_description' => 'Delimitación estricta de anchos de banda mínimos y la obligación de enrutar de forma encriptada el tráfico hacia plataformas críticas (ej. ERP) únicamente por medio de túneles VPN y puertos firewall validados.',
            'parent_id' => $nodes['c5.3'],
            'sort_order' => 58,
        ]);

        VdaControl::create([
            'number' => '5.3.3',
            'name' => '¿En qué medida está regulada la devolución y eliminación segura de los activos de información de los servicios externos de TI?',
            'description' => 'Cese definitivo de conexiones al expirar contratos.',
            'solution_description' => 'Al terminar contratos, se exige al proveedor un respaldo total y la posterior destrucción definitiva de los datos de la empresa de sus interfaces, auditando el cese de conexiones mediante bitácoras de logs.',
            'parent_id' => $nodes['c5.3'],
            'sort_order' => 59,
        ]);

        VdaControl::create([
            'number' => '5.3.4',
            'name' => '¿En qué medida se protege la información en los servicios de TI externos compartidos?',
            'description' => 'Aislamiento lógico de servidores multi-inquilino en la nube.',
            'solution_description' => 'Se previene la filtración de datos exigiendo a los proveedores lógicas de aislamiento físico/virtual de servidores, segmentación estricta en el almacenamiento de datos y control de accesos de mantenimiento.',
            'parent_id' => $nodes['c5.3'],
            'sort_order' => 60,
        ]);

        // ==========================================
        // 🤝 CAPÍTULO 6: RELACIONES CON PROVEEDORES
        // ==========================================
        $nodes['c6'] = VdaControl::create([
            'number' => '6',
            'name' => 'Relaciones con Proveedores',
            'description' => 'Supervisión contractual y técnica a consultores y contratistas comerciales.',
            'solution_description' => 'Directrices generales para regular la seguridad de la información con contratistas, consultores y prestadores de servicios comerciales.',
            'parent_id' => null,
            'sort_order' => 61,
        ])->id;

        // 🚀 NUEVO ESLABÓN INTERMEDIO NIVEL 2
        $nodes['c6.1'] = VdaControl::create([
            'number' => '6.1',
            'name' => 'Relaciones con Proveedores',
            'description' => 'Gestión de seguridad con terceros.',
            'solution_description' => 'Controles aplicados a proveedores y socios externos.',
            'parent_id' => $nodes['c6'],
            'sort_order' => 62,
        ])->id;

        VdaControl::create([
            'number' => '6.1.1',
            'name' => '¿En qué medida se garantiza la seguridad de la información entre los contratistas y los socios de cooperación?',
            'description' => 'Cuestionarios obligatorios de precalificación TISAX.',
            'solution_description' => 'Implementación de un cuestionario de precalificación que evalúa los esquemas de soporte 24/7/365, los planes de continuidad y el estatus de las certificaciones del tercero antes de entablar relaciones.',
            'parent_id' => $nodes['c6.1'], // 🚀 Enlazado al subtema
            'sort_order' => 63,
        ]);

        VdaControl::create([
            'number' => '6.1.2',
            'name' => '¿En qué medida se acuerda contractualmente la no divulgación respecto al intercambio de información?',
            'description' => 'Firma mandatoria de acuerdos NDA comerciales.',
            'solution_description' => 'Firma mandatoria de acuerdos de no divulgación (NDA) antes de liberar información general, restringiendo la entrega de activos críticos mediante cartas responsivas.',
            'parent_id' => $nodes['c6.1'], // 🚀 Enlazado al subtema
            'sort_order' => 64,
        ]);

        // ==========================================
        // ⚖️ CAPÍTULO 7: CUMPLIMIENTO LEGAL
        // ==========================================
        $nodes['c7'] = VdaControl::create([
            'number' => '7',
            'name' => 'Cumplimiento Legal y Normativo',
            'description' => 'Monitoreo de leyes federales, propiedad intelectual y avisos de privacidad.',
            'solution_description' => 'Marco global para garantizar la alineación con las leyes locales e internacionales aplicables a la operación del negocio.',
            'parent_id' => null,
            'sort_order' => 65,
        ])->id;

        // 🚀 NUEVO ESLABÓN INTERMEDIO NIVEL 2
        $nodes['c7.1'] = VdaControl::create([
            'number' => '7.1',
            'name' => 'Cumplimiento Legal',
            'description' => 'Requisitos legales y regulatorios.',
            'solution_description' => 'Control del cumplimiento normativo aplicable.',
            'parent_id' => $nodes['c7'],
            'sort_order' => 66,
        ])->id;

        VdaControl::create([
            'number' => '7.1.1',
            'name' => '¿En qué medida se garantiza el cumplimiento de las disposiciones normativas y contractuales?',
            'description' => 'Controles de cambios foliados ante reformas de ley industriales.',
            'solution_description' => 'Monitoreo continuo y control de cambios foliados ante actualizaciones en leyes ambientales, de seguridad social, tributarias, de propiedad intelectual o de ciberseguridad industrial.',
            'parent_id' => $nodes['c7.1'], // 🚀 Enlazado al subtema
            'sort_order' => 67,
        ]);

        VdaControl::create([
            'number' => '7.1.2',
            'name' => '¿En qué medida se considera la protección de los datos de identidad personal al implementar la seguridad de la información?',
            'description' => 'Clasificación restringida sobre expedientes de RH y Finanzas.',
            'solution_description' => 'Clasificación de los repositorios de Recursos Humanos y Finanzas como información restringida, limitando su visualización y requiriendo validaciones para su transferencia a terceros.',
            'parent_id' => $nodes['c7.1'], // 🚀 Enlazado al subtema
            'sort_order' => 68,
        ]);

        // ==========================================
        // 🚘 CAPÍTULO 8: PROTECCIÓN DE PROTOTIPOS
        // ==========================================
        $nodes['c8'] = VdaControl::create([
            'number' => '8',
            'name' => 'Protección de Prototipos',
            'description' => 'Medidas físicas y lógicas complejas para resguardar vehículos de prueba, diseños virtuales y componentes automotrices.',
            'solution_description' => 'Controles organizacionales y físicos para salvaguardar vehículos de prueba, componentes confidenciales o diseños de ingeniería de los fabricantes de automóviles.',
            'parent_id' => null,
            'sort_order' => 69,
        ])->id;

        $nodes['c8.1'] = VdaControl::create([
            'number' => '8.1',
            'name' => 'Seguridad Física y Ambiental de Prototipos',
            'description' => 'Barreras físicas, exclusas, esclusas de andén, CCTV y zonas con llave.',
            'solution_description' => 'Controles de infraestructura orientados a prevenir intrusiones en zonas donde se manipulan prototipos.',
            'parent_id' => $nodes['c8'],
            'sort_order' => 70,
        ])->id;

        VdaControl::create([
            'number' => '8.1.1',
            'name' => '¿En qué medida se dispone de un concepto de seguridad que describa los requisitos mínimos relativos a la seguridad física y ambiental para la protección de prototipos?',
            'description' => 'Delimitación del perímetro maestro de la planta.',
            'solution_description' => 'Delimitación clara del perímetro de la planta mediante barreras físicas que aíslan el inventario automotriz de amenazas del entorno y accesos accidentales.',
            'parent_id' => $nodes['c8.1'],
            'sort_order' => 71,
        ]);

        VdaControl::create([
            'number' => '8.1.2',
            'name' => '¿En qué medida existe seguridad perimetral que impida el acceso no autorizado a los objetos de propiedad protegidos?',
            'description' => 'Cercas perimetrales y casetas de vigilancia permanente 24/7.',
            'solution_description' => 'Mantenimiento de cercas y portones controlados por personal de vigilancia permanente que impide el ingreso de personas ajenas a la operación.',
            'parent_id' => $nodes['c8.1'],
            'sort_order' => 72,
        ]);

        VdaControl::create([
            'number' => '8.1.3',
            'name' => '¿En qué medida la fachada exterior de los edificios protegidos está construida de manera que impida la remoción o apertura de sus componentes mediante herramientas estándar?',
            'description' => 'Blindaje estructural de ventanas y cerrojos industriales.',
            'solution_description' => 'Ventanas y accesos de edificios construidos con materiales resistentes y cerrojos industriales para impedir la apertura forzada con herramientas estándar.',
            'parent_id' => $nodes['c8.1'],
            'sort_order' => 73,
        ]);

        VdaControl::create([
            'number' => '8.1.4',
            'name' => '¿En qué medida se garantiza la protección visual en las zonas de seguridad definidas?',
            'description' => 'Películas opacas y mamparas para evitar visibilidad de diseños desde el exterior.',
            'solution_description' => 'Uso de persianas, películas opacas o mamparas en oficinas y zonas de inspección técnica para prevenir que el diseño o piezas sean visibles desde el exterior o zonas comunes.',
            'parent_id' => $nodes['c8.1'],
            'sort_order' => 74,
        ]);

        VdaControl::create([
            'number' => '8.1.5',
            'name' => '¿En qué medida se regula la protección contra la entrada no autorizada en forma de control de accesos?',
            'description' => 'Lectores electromagnéticos con bitácoras digitales inmodificables.',
            'solution_description' => 'Se restringe el paso físico a través de exclusas o puertas con lectores de tarjetas electromagnéticas programadas de forma individual, las cuales registran en una bitácora digital inmodificable la identidad, fecha y hora de cada intento de acceso.',
            'parent_id' => $nodes['c8.1'],
            'sort_order' => 75,
        ]);

        VdaControl::create([
            'number' => '8.1.6',
            'name' => '¿En qué medida se gestionan los sistemas de cerrojos y llaves?',
            'description' => 'Revocación inmediata de combinaciones compartidas al haber bajas.',
            'solution_description' => 'Las llaves mecánicas, combinaciones digitales o PINs compartidos son administrados de forma estricta por el Supervisor de Administración; estos códigos se actualizan o revocan de inmediato cuando un empleado con conocimiento de la clave cambia de puesto o deja de pertenecer al proceso.',
            'parent_id' => $nodes['c8.1'],
            'sort_order' => 76,
        ]);

        VdaControl::create([
            'number' => '8.1.7',
            'name' => '¿En qué medida se dispone de un sistema de vigilancia electrónico dentro de las zonas de seguridad y edificios definidos para apoyar la protección de la propiedad?',
            'description' => 'Circuito cerrado de televisión de alta definición (CCTV).',
            'solution_description' => 'Despliegue de un circuito cerrado de televisión (CCTV) con cámaras de alta resolución colocadas de forma estratégica para monitorear las 24 horas del día los puntos de entrada, salida y pasillos perimetrales de las zonas restringidas.',
            'parent_id' => $nodes['c8.1'],
            'sort_order' => 77,
        ]);

        VdaControl::create([
            'number' => '8.1.8',
            'name' => '¿En qué medida están aseguradas contra el acceso no autorizado las áreas de almacenamiento para componentes de prototipos?',
            'description' => 'Custodia en racks y estantes etiquetados bajo color Rojo (Confidencial).',
            'solution_description' => 'Las piezas y componentes de prototipos se custodian dentro de espacios especiales (racks, estantes o cajones) etiquetados con el color rojo (Confidencial), los cuales permanecen cerrados bajo llave dentro de habitaciones cuyo acceso está limitado exclusivamente a personal autorizado.',
            'parent_id' => $nodes['c8.1'],
            'sort_order' => 78,
        ]);

        $nodes['c8.2'] = VdaControl::create([
            'number' => '8.2',
            'name' => 'Seguridad Operativa y Organizacional',
            'description' => 'Lógicas de comportamiento, manejo de datos CAD/3D virtuales y destrucción certificada.',
            'solution_description' => 'Regulación del comportamiento operativo y salvaguardas virtuales de piezas.',
            'parent_id' => $nodes['c8'],
            'sort_order' => 79,
        ])->id;

        VdaControl::create([
            'number' => '8.2.1',
            'name' => '¿En qué medida se gestionan las zonas para la protección de prototipos y se describe el comportamiento en those zonas?',
            'description' => 'Prohibición de grabación y limpieza forzada de pizarrones.',
            'solution_description' => 'Se definen e implementan códigos de conducta muy claros y obligatorios para el personal; en áreas sensibles se prohíbe el uso de dispositivos de grabación personales, se exige la limpieza inmediata de pizarrones al terminar juntas y los monitores deben contar con micas de privacidad visual.',
            'parent_id' => $nodes['c8.2'],
            'sort_order' => 80,
        ]);

        VdaControl::create([
            'number' => '8.2.2',
            'name' => '¿En qué medida está integrado el proceso de clasificación en los flujos de trabajo operativos de la organización?',
            'description' => 'Etiquetado del nivel de confidencialidad automotriz por el Project Manager.',
            'solution_description' => 'Al iniciar un proyecto automotriz, el Project Manager a cargo de la cuenta debe evaluar la confidencialidad de la información y los entregables del fabricante, asegurando que se etiqueten de forma correcta desde la etapa inicial, intermedia y final del proceso.',
            'parent_id' => $nodes['c8.2'],
            'sort_order' => 81,
        ]);

        VdaControl::create([
            'number' => '8.2.3',
            'name' => '¿En qué medida se implementa el requisito de prohibición de fotografía y filmación?',
            'description' => 'Advertencias explícitas en gafetes y contratos a visitantes.',
            'solution_description' => 'Al ingresar a las instalaciones, se prohíbe explícitamente la captura de imágenes a todo visitor o contratista por medio de advertencias en los gafetes y contratos, restringiendo el uso de cámaras lógicas en las zonas operativas de flujo continuo de datos.',
            'parent_id' => $nodes['c8.2'],
            'sort_order' => 82,
        ]);

        VdaControl::create([
            'number' => '8.2.4',
            'name' => '¿En qué medida se implementan las reglas y disposiciones para el almacenamiento de componentes de prototipos?',
            'description' => 'Obligación de guardar piezas en armarios al concluir turnos.',
            'solution_description' => 'Está prohibido dejar cualquier componente, diseño o pieza de prototipo desatendido sobre mesas de trabajo o escritorios si no está siendo utilizado activamente; al terminar la jornada, todo debe guardarse en los armarios cerrados bajo llave asignados.',
            'parent_id' => $nodes['c8.2'],
            'sort_order' => 83,
        ]);

        VdaControl::create([
            'number' => '8.2.5',
            'name' => '¿En qué medida se implementan las especificaciones y disposiciones para el procesamiento de datos digitales o modelos de prototipos virtuales?',
            'description' => 'Uso restringido de planos tridimensionales en equipos corporativos.',
            'solution_description' => 'Los diseños tridimensionales y datos de ingeniería digital se procesan únicamente en equipos de cómputo corporativos autorizados, restringiendo los privilegios de los usuarios para evitar descargas o la copia de archivos a dispositivos extraíbles sin cifrar.',
            'parent_id' => $nodes['c8.2'],
            'sort_order' => 84,
        ]);

        VdaControl::create([
            'number' => '8.2.6',
            'name' => '¿En qué medida se especifican y aplican las disposiciones para el transporte de objetos de propiedad de prototipos?',
            'description' => 'Empaques herméticos y ventanas de entrega estrictas monitoreadas.',
            'solution_description' => 'El traslado de piezas y componentes se realiza mediante transportistas calificados externos que garantizan empaques herméticos libres de suciedad, un traslado libre de golpes y ventanas de entrega estrictas monitoreadas a través de reportes de incidencias.',
            'parent_id' => $nodes['c8.2'],
            'sort_order' => 85,
        ]);

        VdaControl::create([
            'number' => '8.2.7',
            'name' => '¿En qué medida se especifican y aplican los procedimientos para la destrucción y eliminación de objetos de propiedad de prototipos?',
            'description' => 'Trituración irreversible con acta y soportes fotográficos.',
            'solution_description' => 'Todo componente inutilizable, muestra o desecho de ingeniería es destruido físicamente de forma irreversible por medio de trituración o disposición final controlada, conservando las evidencias fotográficas y actas firmadas de destrucción como soporte.',
            'parent_id' => $nodes['c8.2'],
            'sort_order' => 86,
        ]);

        $nodes['c8.3'] = VdaControl::create([
            'number' => '8.3',
            'name' => 'Manejo de Logística y Envíos',
            'description' => 'Control de andenes de carga y verificación física en almacén.',
            'solution_description' => 'Supervisión de embarques confidenciales en zonas restringidas.',
            'parent_id' => $nodes['c8'],
            'sort_order' => 87,
        ])->id;

        VdaControl::create([
            'number' => '8.3.1',
            'name' => '¿En qué medida se garantiza que las áreas de carga y descarga de propiedades de prototipos se gestionen adecuadamente?',
            'description' => 'Restricción de andenes únicamente a transportistas autorizados.',
            'solution_description' => 'El área de andenes y Almacén se define como una zona delimitada bajo control estricto de accesos, donde el ingreso de personal externo o transportistas está restringido y monitoreado continuamente.',
            'parent_id' => $nodes['c8.3'],
            'sort_order' => 88,
        ]);

        VdaControl::create([
            'number' => '8.3.2',
            'name' => '¿En qué medida se garantiza que los envíos entrantes y salientes de propiedades de prototipos se comprueben y rastreen?',
            'description' => 'Cotejo físico de números de parte contra órdenes de compra lógicas.',
            'solution_description' => 'Se realiza una validación rigurosa de cada entrada y salida de mercancía cotejando físicamente los números de parte, marcas y lotes contra las facturas u órdenes de compra autorizadas en el sistema antes de permitir el libre tránsito.',
            'parent_id' => $nodes['c8.3'],
            'sort_order' => 89,
        ]);

        $nodes['c8.4'] = VdaControl::create([
            'number' => '8.4',
            'name' => 'Eventos, Gestión de Crisis y Continuidad',
            'description' => 'Planes de respuesta ante huelgas, disturbios colectivos o cortes eléctricos.',
            'solution_description' => 'Matrices de escalación para enlazar incidentes con corporativos globales.',
            'parent_id' => $nodes['c8'],
            'sort_order' => 90,
        ])->id;

        VdaControl::create([
            'number' => '8.4.1',
            'name' => '¿En qué medida se dispone de una matriz de escalación para los reportes?',
            'description' => 'Cadenas de comunicación con bomberos, protección civil y C4.',
            'solution_description' => 'Se cuenta con flujos lógicos de emergencia y una matriz de comunicaciones que define con claridad a qué autoridades internas, servicios de emergencia (bomberos, C4) o contactos de filiales se debe reportar de inmediato cada anomalía detectada.',
            'parent_id' => $nodes['c8.4'],
            'sort_order' => 91,
        ]);

        VdaControl::create([
            'number' => '8.4.2',
            'name' => '¿En qué medida se describe el manejo de eventos y observaciones relacionados con la protección de prototipos?',
            'description' => 'Monitoreo de conexiones no reconocidas o intrusiones de red.',
            'solution_description' => 'El área de TI y el personal de vigilancia monitorean constantemente los paneles de control del firewall y las alertas del CCTV; cualquier conexión no reconocida o presencia no autorizada se registra en el service desk para su investigación y contención.',
            'parent_id' => $nodes['c8.4'],
            'sort_order' => 92,
        ]);

        VdaControl::create([
            'number' => '8.4.3',
            'name' => '¿En qué medida se dispone de planes de crisis y continuidad para prototipos?',
            'description' => 'Manuales operativos para salvaguardar el inventario físico automotriz.',
            'solution_description' => 'Se dispone de planes específicos de recuperación y manuales ante crisis operativas (como huelgas, disturbios colectivos o fallas de energía extendidas) enfocados en blindar físicamente los activos y reanudar las operaciones sin afectar los compromisos con clientes.',
            'parent_id' => $nodes['c8.4'],
            'sort_order' => 93,
        ]);

        $nodes['c8.5'] = VdaControl::create([
            'number' => '8.5',
            'name' => 'Auditoría y Gobernanza',
            'description' => 'Revisiones estructurales a los flujos de compras y listas de verificación.',
            'solution_description' => 'Validación regular del nivel de control sobre accesos de mantenimiento.',
            'parent_id' => $nodes['c8'],
            'sort_order' => 94,
        ])->id;

        VdaControl::create([
            'number' => '8.5.1',
            'name' => '¿En qué medida se evalúa la protección de prototipos de forma regular?',
            'description' => 'Inspecciones anuales sobre la vigencia de contraseñas de infraestructura.',
            'solution_description' => 'El Supervisor de Sistemas y el área de Administración coordinan revisiones físicas anuales y listas de verificación sobre el estado de la infraestructura, vigencia de contraseñas de las plataformas y el nivel de control de los accesos de mantenimiento.',
            'parent_id' => $nodes['c8.5'],
            'sort_order' => 95,
        ]);

        VdaControl::create([
            'number' => '8.5.2',
            'name' => '¿En qué medida se garantiza que los procesos y métodos operativos se comprueben de forma regular?',
            'description' => 'Pruebas de efectividad sobre el control de inventarios de TI.',
            'solution_description' => 'Auditorías internas y pruebas de efectividad aplicadas de forma programada a los flujos documentales de compras, control de inventario de TI y altas de usuarios para mantener la consistencia de los datos del SGSI.',
            'parent_id' => $nodes['c8.5'],
            'sort_order' => 96,
        ]);

        // ==========================================
        // 🔐 CAPÍTULO 9: PROTECCIÓN DE DATOS PERSONALES
        // ==========================================
        $nodes['c9'] = VdaControl::create([
            'number' => '9',
            'name' => 'Principios y Requisitos de Privacidad',
            'description' => 'Nombramiento de oficiales encargados de datos, inventarios de tratamiento y transferencias transfronterizas.',
            'solution_description' => 'Mecanismos institucionales para transparentar cómo, para qué y bajo qué términos se recaban y procesan los datos personales.',
            'parent_id' => null,
            'sort_order' => 97,
        ])->id;

        $nodes['c9.1'] = VdaControl::create([
            'number' => '9.1',
            'name' => 'Designación de un Oficial de Protección de Datos',
            'description' => 'Definición de responsabilidades compartidas de cumplimiento técnico legal.',
            'solution_description' => 'El Gerente de Administración en conjunto con el Gerente de Sistemas ejercen la función del punto de contacto principal interno para vigilar el cumplimiento legal y atender solicitudes de acceso o retiro de datos personales.',
            'parent_id' => $nodes['c9'],
            'sort_order' => 98,
        ])->id;

        VdaControl::create([
            'number' => '9.1.1',
            'name' => '¿En qué medida se nombra a un oficial de protección de datos?',
            'description' => 'Inclusión de canales de comunicación abiertos con corporativos globales.',
            'solution_description' => 'El organigrama institucional y la matriz de responsabilidades definen formalmente el alcance de este rol para asegurar canales abiertos de comunicación con clientes y el corporativo global.',
            'parent_id' => $nodes['c9.1'],
            'sort_order' => 99,
        ]);

        $nodes['c9.2'] = VdaControl::create([
            'number' => '9.2',
            'name' => 'Tratamiento de Datos Personales por Encargados de Datos',
            'description' => 'Regulación técnica aplicable a nubes e infraestructuras de terceros.',
            'solution_description' => 'Regulación contractual y técnica para asegurar que las plataformas de terceros y nubes compartidas traten los datos personales con el debido cuidado.',
            'parent_id' => $nodes['c9'],
            'sort_order' => 100,
        ])->id;

        VdaControl::create([
            'number' => '9.2.2',
            'name' => '¿En qué medida se garantiza el cumplimiento de los requisitos para el tratamiento de datos por encargo?',
            'description' => 'Validación de certificaciones ISO/IEC 27001 vigentes en proveedores.',
            'solution_description' => 'El proceso de compras exige que todo proveedor de software o servicios en la nube demuestre certificaciones vigentes de privacidad (como ISO/IEC 27001) y firme convenios de confidencialidad antes de procesar información de la empresa.',
            'parent_id' => $nodes['c9.2'],
            'sort_order' => 101,
        ]);

        $nodes['c9.3'] = VdaControl::create([
            'number' => '9.3',
            'name' => 'Información a los Titulares de los Datos',
            'description' => 'Políticas institucionales de transparencia corporativa.',
            'solution_description' => 'Mecanismos institucionales para transparentar cómo, para qué y bajo qué términos se recaban y procesan los datos personales.',
            'parent_id' => $nodes['c9'],
            'sort_order' => 102,
        ])->id;

        VdaControl::create([
            'number' => '9.3.1',
            'name' => '¿En qué medida se informa a los titulares de los datos sobre el tratamiento de sus datos personales?',
            'description' => 'Inclusión mandatoria del Aviso de Privacidad legal en firmas de correo.',
            'solution_description' => 'Inclusión mandatoria del Aviso de Privacidad de la empresa (conforme a la legislación nacional de protección de datos) en la firma de correos electrónicos corporativos y en la debida diligencia de alta de proveedores.',
            'parent_id' => $nodes['c9.3'],
            'sort_order' => 103,
        ]);

        $nodes['c9.4'] = VdaControl::create([
            'number' => '9.4',
            'name' => 'Derechos de los Titulares de los Datos',
            'description' => 'Procedimientos ágiles para el retiro o modificación en bases de datos.',
            'solution_description' => 'Procedimientos habilitados para que empleados, clientes o proveedores puedan ejercer el acceso, rectificación, cancelación u oposición de sus datos.',
            'parent_id' => $nodes['c9'],
            'sort_order' => 104,
        ])->id;

        VdaControl::create([
            'number' => '9.4.1',
            'name' => '¿En qué medida pueden los titulares de los datos hacer valer sus derechos?',
            'description' => 'Gestión documental de solicitudes ARCO a través de administración.',
            'solution_description' => 'Se establecen canales formales a través del área de sistemas y administración para tramitar de forma ágil y documentar cualquier solicitud de retiro o modificación de información de las bases de datos de la empresa.',
            'parent_id' => $nodes['c9.4'],
            'sort_order' => 105,
        ]);

        $nodes['c9.5'] = VdaControl::create([
            'number' => '9.5',
            'name' => 'Notificación de Brechas de Seguridad de Datos Personales',
            'description' => 'Protocolos de contención inmediata ante robos o divulgaciones incidentales.',
            'solution_description' => 'Protocolo de contingencia inmediata ante la fuga, pérdida o robo de información de carácter privado.',
            'parent_id' => $nodes['c9'],
            'sort_order' => 106,
        ])->id;

        VdaControl::create([
            'number' => '9.5.1',
            'name' => '¿En qué medida se dispone de normas internas para notificar las brechas de seguridad de datos personales?',
            'description' => 'Obligación del usuario de abrir folios de reporte inmediatos.',
            'solution_description' => 'Todo usuario que identifique un posible compromiso o divulgación no autorizada de datos personales está obligado a reportarlo inmediatamente como un incidente de seguridad dentro del Service Desk.',
            'parent_id' => $nodes['c9.5'],
            'sort_order' => 107,
        ]);

        VdaControl::create([
            'number' => '9.5.2',
            'name' => '¿En qué medida se reportan las brechas de seguridad de datos personales dentro de la organización?',
            'description' => 'Flujos de comunicación hacia el comité directivo (ISMT).',
            'solution_description' => 'Al confirmarse la brecha, el personal técnico de TI y el Supervisor de Sistemas notifican formalmente el alcance de la afectación al Gerente de Sistemas y al comité directivo (ISMT) para su intervención.',
            'parent_id' => $nodes['c9.5'],
            'sort_order' => 108,
        ]);

        VdaControl::create([
            'number' => '9.5.3',
            'name' => '¿En qué medida se documentan las brechas de seguridad de datos personales?',
            'description' => 'Registro detallado e histórico auditable de los sistemas involucrados.',
            'solution_description' => 'Registro detallado de la fecha, hora, sistemas involucrados, impacto potencial y acciones de contención implementadas dentro de la plataforma Service Desk para mantener un historial auditable.',
            'parent_id' => $nodes['c9.5'],
            'sort_order' => 109,
        ]);

        $nodes['c9.6'] = VdaControl::create([
            'number' => '9.6',
            'name' => 'Registro de Actividades de Tratamiento',
            'description' => 'Inventario mapeado por departamentos sobre el manejo de datos sensibles.',
            'solution_description' => 'Control de inventario sobre qué datos personales se manejan en cada departamento de la organización.',
            'parent_id' => $nodes['c9'],
            'sort_order' => 110,
        ])->id;

        VdaControl::create([
            'number' => '9.6.1',
            'name' => '¿En qué medida se dispone de un registro de actividades de tratamiento?',
            'description' => 'Mapeo de bases de datos sensibles en la matriz de riesgos.',
            'solution_description' => 'El Inventario Maestro de Activos de TI identifica los sistemas informáticos y bases de datos que procesan datos sensibles, mapeándolos según su nivel de confidencialidad en la matriz de riesgos.',
            'parent_id' => $nodes['c9.6'],
            'sort_order' => 111,
        ]);

        VdaControl::create([
            'number' => '9.6.2',
            'name' => '¿En qué medida se verifican regularmente los registros de datos?',
            'description' => 'Conciliaciones anuales del inventario para confirmar repositorios válidos.',
            'solution_description' => 'Revisiones trimestrales de recertificación de usuarios y conciliaciones anuales del inventario para confirmar que los datos personales se mantienen únicamente en los sistemas autorizados.',
            'parent_id' => $nodes['c9.6'],
            'sort_order' => 112,
        ]);

        $nodes['c9.7'] = VdaControl::create([
            'number' => '9.7',
            'name' => 'Transferencia de Datos Personales',
            'description' => 'Regulación en el intercambio de información con sedes y filiales internacionales.',
            'solution_description' => 'Controles para regular el envío de información privada fuera del país o a filiales internacionales.',
            'parent_id' => $nodes['c9'],
            'sort_order' => 113,
        ])->id;

        VdaControl::create([
            'number' => '9.7.1',
            'name' => '¿En qué medida se garantiza que los datos personales solo se transfieran de conformidad con los requisitos legales?',
            'description' => 'Acuerdos corporativos de confidencialidad con sedes regionales PAMA y GHQ.',
            'solution_description' => 'El intercambio de datos con filiales externas (como la sede regional PAMA o la matriz global GHQ) se realiza bajo acuerdos corporativos globales de confidencialidad y con el consentimiento explícito aceptado en los avisos de privacidad.',
            'parent_id' => $nodes['c9.7'],
            'sort_order' => 114,
        ]);

        VdaControl::create([
            'number' => '9.7.2',
            'name' => '¿En qué medida se comprueban los destinos de las transferencias de datos?',
            'description' => 'Inspección técnica de canales con cifrados de 128 o 256 bits.',
            'solution_description' => 'El área de TI e infraestructura verifica que los servidores de almacenamiento en la nube o bases de datos externas de destino cumplan con cifrados robustos de al menos 128 o 256 bits antes de habilitar los canales lógicos.',
            'parent_id' => $nodes['c9.7'],
            'sort_order' => 115,
        ]);

        $nodes['c9.8'] = VdaControl::create([
            'number' => '9.8',
            'name' => 'Protección de Datos desde el Diseño y por Defecto',
            'description' => 'Metodología técnica para blindar la privacidad desde la planeación estructural.',
            'solution_description' => 'Principio metodológico para integrar la protección de datos desde la creación de cualquier sistema o proceso operativo.',
            'parent_id' => $nodes['c9'],
            'sort_order' => 116,
        ])->id;

        VdaControl::create([
            'number' => '9.8.1',
            'name' => '¿En qué medida se considera la protección de datos durante el desarrollo e implementación de sistemas?',
            'description' => 'Enmascaramiento obligatorio de datos y segregación técnica de roles.',
            'solution_description' => 'Todo proceso de desarrollo de software, adición de nuevos módulos o migración tecnológica requiere de forma mandatoria definir el enmascaramiento de datos, segregación de roles y la encriptación nativa en tránsito y en reposo desde su etapa de planeación técnica.',
            'parent_id' => $nodes['c9.8'],
            'sort_order' => 117,
        ]);
    }
}