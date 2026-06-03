<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\DocumentVersion;
use App\Models\User as Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('PasswordSeguro123!');

        // --- Usuarios ---
        $ciso = Users::create([
            'name' => 'Jesus Marron',
            'email' => 'jesus.marron@niterragroup.com',
            'password' => $password,
            'role' => 'admin',
            'is_active' => true,
        ]);

        $liderSgsi = Users::create([
            'name' => 'Jorge Guzman',
            'email' => 'jorge.guzman@niterragroup.com',
            'password' => $password,
            'is_active' => true,
        ]);

        $auditorTI = Users::create([
            'name' => 'Jose Tadeo',
            'email' => 'jose.tadeo@niterragroup.com',
            'password' => $password,
            'role' => 'admin',
            'is_active' => true,
        ]);

        $directorGeneral = Users::create([
            'name' => 'Takahiro Arakawa',
            'email' => 'takahiro.arakawa@niterragroup.com',
            'password' => $password,
            'is_active' => true,
        ]);

        // --- Listado de Documentos Estructurados ---
        $documents = [
            // Raíz
            ['code' => 'F-IT-11', 'name' => 'Reporte de prueba de continuidad', 'type' => 'Formato'],
            ['code' => 'F-IT-12', 'name' => 'Plan de continuidad de negocio (BCP)', 'type' => 'Formato'],
            ['code' => 'F-IT-17', 'name' => 'RASIC BCP-DRP', 'type' => 'Formato'],
            ['code' => 'F-IT-18', 'name' => 'Plan específico de recuperación', 'type' => 'Formato'],
            ['code' => 'F-IT-19', 'name' => 'Plan de manejo de crisis (CMP)', 'type' => 'Formato'],
            ['code' => 'F-IT-20', 'name' => 'Matriz de riesgos de continuidad de negocio', 'type' => 'Formato'],
            ['code' => 'M-IT-01', 'name' => 'Guía de referencia para el plan de continuidad', 'type' => 'Manual'],

            // Formatos
            ['code' => 'F-ADM-18', 'name' => 'Inventario de activos de IT', 'type' => 'Formato'],
            ['code' => 'F-IT-02', 'name' => 'Matriz de derechos y privilegios', 'type' => 'Formato'],
            ['code' => 'F-IT-04', 'name' => 'Formato de desmantelamiento y eliminación', 'type' => 'Formato'],
            ['code' => 'F-IT-05', 'name' => 'Matriz de Riesgos', 'type' => 'Formato'],
            ['code' => 'F-IT-07', 'name' => 'Declaración de aplicabilidad (SoA)', 'type' => 'Formato'],
            ['code' => 'F-IT-09', 'name' => 'Análisis de riesgos de proyecto', 'type' => 'Formato'],
            ['code' => 'F-IT-10', 'name' => 'Flujo de atencion a incidentes', 'type' => 'Formato'],
            ['code' => 'F-IT-12-DRP', 'name' => 'Plan de recuperación de desastres y continuidad de negocio', 'type' => 'Formato'],
            ['code' => 'F-IT-13', 'name' => 'Formato de registro de restauración de base de datos', 'type' => 'Formato'],
            ['code' => 'F-IT-14', 'name' => 'Control de usuarios de mantenimiento', 'type' => 'Formato'],
            ['code' => 'F-IT-21', 'name' => 'Control de eliminación de usuarios', 'type' => 'Formato'],
            ['code' => 'F-IT-22', 'name' => 'Evaluación de seguridad con proveedores', 'type' => 'Formato'],
            ['code' => 'F-LOG-(T)-01', 'name' => 'Seleccion, evaluacion del proveedor', 'type' => 'Formato'],
            ['code' => 'F-SGI-22', 'name' => 'Plan de Gestión de Cambios', 'type' => 'Formato'],

            // Instructivos
            ['code' => 'IT-IT-01', 'name' => 'Instructivo de gestión de vulnerabilidad técnica', 'type' => 'Instructivo'],
            ['code' => 'IT-IT-02', 'name' => 'Instructivo de auditoria a sistemas de información', 'type' => 'Instructivo'],

            // Politicas
            ['code' => 'POL-IT-01', 'name' => 'Política general de seguridad de la información', 'type' => 'Politica'],
            ['code' => 'POL-IT-02', 'name' => 'Política de clasificación y manejo de información', 'type' => 'Politica'],
            ['code' => 'POL-IT-03', 'name' => 'Política de Gestión de Activos', 'type' => 'Politica'],
            ['code' => 'POL-IT-04', 'name' => 'Política de Dispositivos Móviles', 'type' => 'Politica'],
            ['code' => 'POL-IT-05', 'name' => 'Control de accesos', 'type' => 'Politica'],
            ['code' => 'POL-IT-06', 'name' => 'Política de cifrado', 'type' => 'Politica'],
            ['code' => 'POL-IT-07', 'name' => 'Política de seguridad en redes', 'type' => 'Politica'],
            ['code' => 'POL-IT-08', 'name' => 'Política de Gestión de Incidentes', 'type' => 'Politica'],
            ['code' => 'POL-IT-09', 'name' => 'Política de Gestión de medios de identidad', 'type' => 'Politica'],
            ['code' => 'POL-IT-10', 'name' => 'Política de gestión de activos relacionados con terceros', 'type' => 'Politica'],
            ['code' => 'POL-IT-11', 'name' => 'Política de uso aceptable de activos', 'type' => 'Politica'],
            ['code' => 'POL-IT-12', 'name' => 'Política de Seguridad física y ambiental', 'type' => 'Politica'],
            ['code' => 'POL-IT-13', 'name' => 'Política de gestión de riesgos en proyectos', 'type' => 'Politica'],
            ['code' => 'POL-IT-14', 'name' => 'Política de trabajo remoto', 'type' => 'Politica'],
            ['code' => 'POL-IT-15', 'name' => 'Política de zonas y comportamientos de seguridad', 'type' => 'Politica'],
            ['code' => 'POL-IT-16', 'name' => 'Política de desmantelamiento y eliminación de activos', 'type' => 'Politica'],
            ['code' => 'POL-IT-17', 'name' => 'Política de monitoreo de eventos', 'type' => 'Politica'],
            ['code' => 'POL-IT-18', 'name' => 'Politica de Respaldos y Copias de Seguridad', 'type' => 'Politica'],
            ['code' => 'POL-IT-19', 'name' => 'Política antimalware', 'type' => 'Politica'],
            ['code' => 'POL-IT-20', 'name' => 'Política de Uso de Dispositivos de Almacenamiento Extraíble', 'type' => 'Politica'],
            ['code' => 'POL-IT-21', 'name' => 'Política de seguridad para el uso de redes sociales corporativas', 'type' => 'Politica'],
            ['code' => 'POL-IT-22', 'name' => 'Política de administración de software', 'type' => 'Politica'],
            ['code' => 'POL-SCM-01', 'name' => 'Política de gestión de proveedores', 'type' => 'Politica'],

            // Procedimientos
            ['code' => 'P-SGI-13', 'name' => 'Gestión de cambios', 'type' => 'Procedimiento'], // Nota: Mapeado como Procedimiento por su inicial P
            ['code' => 'PO-IT-01', 'name' => 'Gestión de activos', 'type' => 'Procedimiento'],
            ['code' => 'PO-IT-02', 'name' => 'Soporte de IT', 'type' => 'Procedimiento'],
            ['code' => 'PO-IT-03', 'name' => 'Creación, modificación y eliminación de usuarios', 'type' => 'Procedimiento'],
            ['code' => 'PO-IT-04', 'name' => 'Gestión de Riesgos de Seguridad de la Información', 'type' => 'Procedimiento'],
            ['code' => 'PO-IT-05', 'name' => 'Desarrollo de funciones y aplicaciones', 'type' => 'Procedimiento'],
            ['code' => 'PO-IT-06', 'name' => 'Procedimiento de Respaldos y Copias de Seguridad', 'type' => 'Procedimiento'],
            ['code' => 'PO-IT-07', 'name' => 'Procedimiento de Gestion de Dispositivos de Almacenamiento Extraibles', 'type' => 'Procedimiento'],

            // Registros que cumplen el criterio
            ['code' => 'F-IT-11-DB', 'name' => 'Reporte de prueba de continuidad DB', 'type' => 'Formato'],
            ['code' => 'F-IT-11-IE', 'name' => 'Reporte de prueba de continuidad IE', 'type' => 'Formato'],
            ['code' => 'F-SGI-05', 'name' => 'Plan de auditoría interna', 'type' => 'Formato'],
            ['code' => 'F-SGI-07', 'name' => 'Informe de auditoría (auditoria interna TISAX)', 'type' => 'Formato'],
            ['code' => 'F-SGI-13', 'name' => 'Solicitud de Accion para Tratar Riesgos', 'type' => 'Formato'],
        ];

        // --- Inserción Automática en la Base de Datos ---
        foreach ($documents as $docData) {
            $doc = Document::create([
                'code' => $docData['code'],
                'name' => $docData['name'],
                'description' => 'Documentación inicial migrada del sistema de archivos.',
                'type' => $docData['type'],
            ]);

            DocumentVersion::create([
                'document_id' => $doc->id,
                'version_number' => 'Rev.0', // Forzado a Rev. 0 / v0 como solicitaste
                'change_description' => 'Carga inicial del documento.',
                'file_path' => '',
                'file_name' => '',
                'status' => 'draft',
                'user_id' => $auditorTI->id, // Asignado por defecto al Director General
            ]);
        }
    }
}