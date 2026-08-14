<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    public function run(): void
    {
        $proveedores = [
            [
                'nombre' => 'ABBA NETWORKS',
                'razonSocial' => 'ABBA NETWORKS SAPI DE C.V.',
                'actividad' => 'Control de contraseñas (PAM)',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Erika Villafan',
                'numeroContacto' => '3310082431',
                'email' => 'erika.villafan@abbanetworks.com',
                'date' => 2023,
            ],
            [
                'nombre' => 'AT&T GLOBAL',
                'razonSocial' => 'AT&T GLOBAL NETWORK SERVICES MEXICO S DE CV',
                'actividad' => 'VPN USA',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Soporte Att mesa de ayuda',
                'numeroContacto' => null, // N/A convertido a null
                'email' => null, // N/A convertido a null
                'date' => 2022,
            ],
            [
                'nombre' => 'ATEB',
                'razonSocial' => 'ATEB SERVICIOS, S.A. DE C.V.',
                'actividad' => 'Facturación electrónica',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Soporte',
                'numeroContacto' => '5551180300',
                'email' => 'soporte@ateb.com',
                'date' => 2022,
            ],
            [
                'nombre' => 'BESTEL',
                'razonSocial' => 'MEXICO RED DE TELECOMUNICACIONES',
                'actividad' => 'Enlace dedicado de Internet',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Veronica Rocio Romero Paredes Gonzalez',
                'numeroContacto' => '5540002921',
                'email' => 'vrromerop@bestel.com.mx',
                'date' => 2024,
            ],
            [
                'nombre' => 'CSI LEASING',
                'razonSocial' => 'CSI LEASING MEXICO S. DE R.L. DE C.V.',
                'actividad' => 'Arrendamiento de equipo computo',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Christian Ramirez',
                'numeroContacto' => null, // N/A
                'email' => 'christianm.ramirez@csimexico.com',
                'date' => 2014,
            ],
            [
                'nombre' => 'DELL',
                'razonSocial' => 'DELL Leasing Mexico S de RL de CV',
                'actividad' => 'Arrendamiento de equipo computo',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Nancy Perez',
                'numeroContacto' => null, // N/A
                'email' => 'nancy_perez@dell.com',
                'date' => 2014,
            ],
            [
                'nombre' => 'I.T QUALITY SERVICES',
                'razonSocial' => 'I.T QUALITY SERVICES S.A DE C.V.',
                'actividad' => 'Página web',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Kim Tapía',
                'numeroContacto' => null, // N/A
                'email' => 'ktapia@tecgurus.net',
                'date' => 2022,
            ],
            [
                'nombre' => 'LENOVO',
                'razonSocial' => 'Lenovo México, S. de R.L. de C.V.',
                'actividad' => 'Arrendamiento de equipo computo',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Lenovo Soporte premium',
                'numeroContacto' => '800 253 0521',
                'email' => 'premier_las@lenovo.com',
                'date' => 2025,
            ],
            [
                'nombre' => 'MAYSOFT',
                'razonSocial' => 'MAYSOFT GLOBAL, SA DE RL DE CV',
                'actividad' => 'Servidores, VPN , Firewall, Nube',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Mesa de Servicio IMO',
                'numeroContacto' => '8002250002',
                'email' => 'imohelp@imoti.mx',
                'date' => 2010,
            ],
            [
                'nombre' => 'MOBILE SOLUTIONS',
                'razonSocial' => 'MOBILE SOLUTIONS TELECOMUNICACIONES S.A. DE C.V.',
                'actividad' => 'MDM',
                'status' => 'Baja',
                'departamentoResponsable' => 'IT',
                'personaContacto' => null, // N/A
                'numeroContacto' => null, // N/A
                'email' => null, // N/A
                'date' => 2022,
            ],
            [
                'nombre' => 'NEUBOX',
                'razonSocial' => 'NEUBOX INTERNET S.A DE C.V.',
                'actividad' => 'Certificado de seguridad SSL',
                'status' => 'Baja',
                'departamentoResponsable' => 'IT',
                'personaContacto' => null, // N/A
                'numeroContacto' => null, // N/A
                'email' => null, // N/A
                'date' => 2022,
            ],
            [
                'nombre' => 'RB TECNOLOGIAS',
                'razonSocial' => 'RB TECNOLOGIAS Y SISTEMAS DE INFORMACION S.A DE C.V.',
                'actividad' => 'Mantenimeinto a sistemas de información',
                'status' => 'Evento',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Nancy Pineda Perez',
                'numeroContacto' => '5548316504',
                'email' => 'npineda@rbtsi.com.mx',
                'date' => 2015,
            ],
            [
                'nombre' => 'SIRE',
                'razonSocial' => 'MEXICO RED DE TELECOMUNICACIONES',
                'actividad' => 'Enlace dedicado de Internet',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Paulina HErnandez',
                'numeroContacto' => '5525621523',
                'email' => 'paulina@respaldodeenergia.com.mx',
                'date' => 2018,
            ],
            [
                'nombre' => 'TELMEX',
                'razonSocial' => 'TELEFONOS DE MÉXICO S.A. DE C.V.',
                'actividad' => 'Enlace dedicado de Internet. Seguridad Perimetral',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'SCITUM',
                'numeroContacto' => '5591507400',
                'email' => 'lista_spa@scitum.com.mx',
                'date' => 2022,
            ],
            [
                'nombre' => 'BITAM',
                'razonSocial' => 'BITAM de mexico sa de cv',
                'actividad' => 'BFISKUR Conciliacion con SAT',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Gabriel Santiago',
                'numeroContacto' => '442 422 3099',
                'email' => 'soporte@bifiskur.com',
                'date' => 2024,
            ],
            [
                'nombre' => 'ICORP',
                'razonSocial' => 'Innovación y Administración de TI S de RL de CV',
                'actividad' => 'Endpoint central (Manage Engine y AD Audit)',
                'status' => 'Activo',
                'departamentoResponsable' => 'IT',
                'personaContacto' => 'Oliwia Chmarek',
                'numeroContacto' => '442 170 5358',
                'email' => 'oliwia.chmarek@icorp.com.mx',
                'date' => 2023,
            ],
        ];

        foreach ($proveedores as $data) {
            Proveedor::firstOrCreate(
                ['nombre' => $data['nombre']],
                $data
            );
        }
    }
}