<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // --- Listado de Documentos Estructurados ---
        $documents = [
           // Formatos
            ['code' => 'F-ADM-08', 'name' => 'Inventario de activo fijo', 'type' => 'Formato'],
            ['code' => 'F-ADM-09', 'name' => 'Programa de mantenimiento preventivo', 'type' => 'Formato'],
            ['code' => 'F-ADM-18', 'name' => 'Inventario de activos de IT', 'type' => 'Formato'],
            ['code' => 'F-IT-01', 'name' => 'Carta responsiva', 'type' => 'Formato'],
            ['code' => 'F-IT-02', 'name' => 'Matriz de Derechos y Privilegios', 'type' => 'Formato'],
            ['code' => 'F-IT-03', 'name' => 'Checklist de Equipo de cómputo', 'type' => 'Formato'],
            ['code' => 'F-IT-04', 'name' => 'Formato de desmantelamiento y eliminación', 'type' => 'Formato'],
            ['code' => 'F-IT-05', 'name' => 'Matriz de riesgos de seguridad de la información', 'type' => 'Formato'],
            ['code' => 'F-IT-06', 'name' => 'Evaluación de riesgos de proyectos', 'type' => 'Formato'],
            ['code' => 'F-IT-07', 'name' => 'Declaración de aplicabilidad (SoA)', 'type' => 'Formato'],
            ['code' => 'F-IT-08', 'name' => 'Matriz RASIC', 'type' => 'Formato'],
            ['code' => 'F-IT-09', 'name' => 'Análisis de riesgos en proyecto', 'type' => 'Formato'],
            ['code' => 'F-IT-10', 'name' => 'Flujo atención a incidentes', 'type' => 'Formato'],
            ['code' => 'F-IT-11', 'name' => 'Reporte de prueba de continuidad', 'type' => 'Formato'],
            ['code' => 'F-IT-12', 'name' => 'Plan de continuidad de negocio (BCP)', 'type' => 'Formato'],
            ['code' => 'F-IT-13', 'name' => 'Registro de restauración de base de datos', 'type' => 'Formato'],
            ['code' => 'F-IT-14', 'name' => 'Control de usuario de mantenimiento ', 'type' => 'Formato'],
            ['code' => 'F-IT-15', 'name' => 'Planificación y seguimiento de objetivos de seguridad y continuidad', 'type' => 'Formato'],
            ['code' => 'F-IT-16', 'name' => 'Plan de recuperación en caso de interrupción (DRP)', 'type' => 'Formato'],
            ['code' => 'F-IT-17', 'name' => 'Matriz RASIC BCP-DRP', 'type' => 'Formato'],
            ['code' => 'F-IT-18', 'name' => 'Plan especifico de recuperación en caso de interrupción', 'type' => 'Formato'],
            ['code' => 'F-IT-19', 'name' => 'Plan de manejo de crisis (CMP)', 'type' => 'Formato'],
            ['code' => 'F-IT-20', 'name' => 'Matriz de riesgos de continuidad de negocio', 'type' => 'Formato'],
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
            
            //Manuales
            ['code' => 'M-IT-01', 'name' => 'GUÍA DE REFERENCIA PARA EL PLAN DE CONTINUIDAD', 'type' => 'Manual'],
        ];

        // --- Inserción Automática en la Base de Datos ---
        foreach ($documents as $docData) {
            $doc = Document::create([
                'code' => $docData['code'],
                'name' => $docData['name'],
                'description' => 'Documentación inicial migrada del sistema de archivos.',
                'type' => $docData['type'],
            ]);
        }
    }
}