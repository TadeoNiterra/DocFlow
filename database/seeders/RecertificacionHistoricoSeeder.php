<?php

namespace Database\Seeders;

use App\Models\Colaborador;
use App\Models\Recertificacion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RecertificacionHistoricoSeeder extends Seeder
{
    public function run(): void
    {
        $usuarioAdmin = User::where('email', 'jesus.marron@niterragroup.com')->first()
            ?? User::first();

        // Definición de los 10 trimestres históricos de la matriz (Q1 2024 - Q2 2026)
        $trimestres = [
            0 => ['periodo' => 'Q1 2024', 'mes' => 'Marzo', 'folio' => 'RC-2024-T1-HIST', 'fecha' => '2024-03-29 12:00:00'],
            1 => ['periodo' => 'Q2 2024', 'mes' => 'Junio', 'folio' => 'RC-2024-T2-HIST', 'fecha' => '2024-06-28 12:00:00'],
            2 => ['periodo' => 'Q3 2024', 'mes' => 'Septiembre', 'folio' => 'RC-2024-T3-HIST', 'fecha' => '2024-09-30 12:00:00'],
            3 => ['periodo' => 'Q4 2024', 'mes' => 'Diciembre', 'folio' => 'RC-2024-T4-HIST', 'fecha' => '2024-12-20 12:00:00'],
            4 => ['periodo' => 'Q1 2025', 'mes' => 'Marzo', 'folio' => 'RC-2025-T1-HIST', 'fecha' => '2025-03-31 12:00:00'],
            5 => ['periodo' => 'Q2 2025', 'mes' => 'Junio', 'folio' => 'RC-2025-T2-HIST', 'fecha' => '2025-06-30 12:00:00'],
            6 => ['periodo' => 'Q3 2025', 'mes' => 'Septiembre', 'folio' => 'RC-2025-T3-HIST', 'fecha' => '2025-09-30 12:00:00'],
            7 => ['periodo' => 'Q4 2025', 'mes' => 'Diciembre', 'folio' => 'RC-2025-T4-HIST', 'fecha' => '2025-12-19 12:00:00'],
            8 => ['periodo' => 'Q1 2026', 'mes' => 'Marzo', 'folio' => 'RC-2026-T1-HIST', 'fecha' => '2026-03-31 12:00:00'],
            9 => ['periodo' => 'Q2 2026', 'mes' => 'Junio', 'folio' => 'RC-2026-T2-HIST', 'fecha' => '2026-06-26 12:00:00'],
        ];

        // Matriz histórica de usuarios AD
        // [Usuario, Nombre, Correo, Clasificacion, Departamento, TipoCuenta, FechaCreacion, FechaCambio, [10 estados]]
        // Estados: A = Activo, N = Nuevo, I = Inactivo, B = Borrado, X = NA
        $usuariosAd = [
            ['a_aguilar', 'Annery Viridiana Aguilar Herrera', 'a_aguilar@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-01-12', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['a_alanis', 'Alberto Alanis', 'a_alanis@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-01-13', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['a_alvarez', 'Antonio Álvarez Mejía', 'a_alvarez@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-01-14', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['a_cabrera', 'Abraham Cabrera', 'a_cabrera@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2020-01-15', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['a_carrera', 'Alejandra Carrera Filio', 'a_carrera@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-01-16', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['a_coronado', 'Ayleen Coronado', 'a_coronado@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-01-17', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['a_figueroa', 'Angelina Susana Figueroa Mondragón', 'a_figueroa@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2020-01-18', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['a_francisco', 'Alejandro Francisco Tovar', 'a_francisco@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-01-19', null, ['A', 'A', 'A', 'A', 'B', 'X', 'X', 'X', 'B', 'B']],
            ['a_garcia', 'Andrés Josué García Peña', 'a_garcia@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-01-20', null, ['A', 'A', 'A', 'A', 'A', 'B', 'B', 'X', 'B', 'B']],
            ['a_martinez', 'Agustín Martínez', 'a_martinez@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-01-21', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['a_ramirez', 'Ana Laura Ramirez Flores', 'a_ramirez@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2020-01-22', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'B', 'A', 'A']],
            ['a_rivera', 'Andres Rivera Laguna', 'a_rivera@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-01-23', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['a_velazquez', 'Alejandra Velázquez', 'a_velazquez@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-01-24', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['AdministradorMX', 'Administrador Mexico', 'administrador@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-01-25', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['almacen', 'Almacén', 'almacen@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-01-26', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['b_martinez', 'Brenda Isabel Martinez Montelongo', 'b_martinez@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-01-27', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['c_martinez', 'Claudia Olivia Martinez Cardenas', 'c_martinez@ngkntk.com.mx', 'Confidencial', 'Administración', 'usuario general', '2020-01-28', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['c_paniagua', 'César Paniagua Gutiérrez', 'c_paniagua@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-01-29', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['copiadora_ngk', 'Canon Digital', 'copiadora_ngk@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-01-30', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['d_rodriguez', 'Daniel Rodriguez', 'd_rodriguez@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2020-01-31', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['d_velazquez', 'David Velazquez Trejo', 'd_velazquez@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-02-01', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['e_hernandez', 'Erick Hernandez Gonzalez', 'e_hernandez@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2020-02-02', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['e_lopez', 'Eli Nacor Lopez Valencia', 'e_lopez@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-02-03', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['e_monroy', 'Efrain Monroy Ayala', 'e_monroy@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2020-02-04', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['e_patino', 'Ernesto Patino Cuapio', 'e_patino@ngkntk.com.mx', 'Confidencial', 'Administración', 'usuario general', '2020-02-05', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['facturacion', 'facturacion NGK', 'facturacion@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-02-06', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['facturaproveedores', 'Factura proveedores NGK', 'facturaproveedores@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-02-07', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['g_arriaga', 'Gabriel Arriaga Colín', 'g_arriaga@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-02-08', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['gims_reg_mx', 'gims_reg_mx', 'gims_reg_mx@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-02-09', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['h_masuda', 'Hirofumi Masuda', 'h_masuda@ngkntk.com.mx', 'Confidencial', 'Presidencia', 'usuario general', '2020-02-10', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['i_castro', 'Itzel Castro Lopez', 'i_castro@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2020-02-11', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'B', 'B']],
            ['i_gutierrez', 'Ileana Belén Gutiérrez Rosas', 'i_gutierrez@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-02-12', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['i_santos', 'Irving Santos Reyes', 'i_santos@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-02-13', null, ['A', 'A', 'A', 'A', 'A', 'A', 'B', 'B', 'B', 'B']],
            ['j_avila', 'Julio Edgar Avila Garcia', 'j_avila@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-02-14', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['j_calzada', 'Jessica Calzada Ayala', 'j_calzada@ngkntk.com.mx', 'Confidencial', 'Administración', 'usuario general', '2020-02-15', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'B', 'B']],
            ['j_fernandez', 'Jazmin Monserrat Fernandez Rojas', 'j_fernandez@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2020-02-16', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['j_guzman', 'Jorge Luis Guzman Mora', 'j_guzman@ngkntk.com.mx', 'Confidencial', 'Sistemas', 'admin', '2020-02-17', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['j_lopez', 'Jessica López Contreras', 'j_lopez@ngkntk.com.mx', 'Confidencial', 'Administración', 'usuario general', '2020-02-18', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['j_malagon', 'Jesús Malagón Sánchez', 'j_malagon@ngkntk.com.mx', 'Confidencial', 'OEM', 'usuario general', '2020-02-19', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['j_marron', 'Jesús Alejandro Marrón Legorreta', 'j_marron@ngkntk.com.mx', 'Confidencial', 'Sistemas', 'admin', '2020-02-20', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['j_mendoza', 'Julio Cesar Mendoza Rodriguez', 'j_mendoza@ngkntk.com.mx', 'Confidencial', 'OEM', 'usuario general', '2020-02-21', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['j_tadeo', 'José Martín Tadeo Catalán', 'j_tadeo@ngkntk.com.mx', 'Confidencial', 'Sistemas', 'admin', '2020-02-22', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['j_vazquez', 'Juan Carlos Vazquez Mera', 'j_vazquez@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2020-02-23', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['jf_garcia', 'Juan Francisco Garcia', 'jf_garcia@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-02-24', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'B', 'B']],
            ['l_juarez', 'Leslie Jatzibeth Juarez Segura', 'l_juarez@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-02-25', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['l_sanchez', 'Luz Amayrani Sánchez Hernández', 'l_sanchez@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2020-02-26', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['m_gonzalez', 'Maria Fernanda Gonzalez Garcia', 'm_gonzalez@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-02-27', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['m_sanchez', 'Montserrat Sánchez', 'm_sanchez@ngkntk.com.mx', 'Confidencial', 'Administración', 'usuario general', '2020-02-28', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['m_villanueva', 'Miguel Villanueva Oropeza', 'm_villanueva@ngkntk.com.mx', 'Confidencial', 'Sistemas', 'admin', '2020-02-29', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['n_esteva', 'Nelly Michelle Esteva solorio', 'n_esteva@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2020-03-01', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['n_moreno', 'Nancy Moreno Resendiz', 'n_moreno@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2020-03-02', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['n_ruiz', 'Noel Arif Ruiz Machucho', 'n_ruiz@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-03-03', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['o_trujillo', 'Oscar Trujillo', 'o_trujillo@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-03-04', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['p_ramirez', 'Patricia Ramírez Ocaña', 'p_ramirez@ngkntk.com.mx', 'Confidencial', 'OEM', 'usuario general', '2020-03-05', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['r_medina', 'Ricardo Edmundo Medina Colín', 'r_medina@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2020-03-06', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['r_melo', 'Ricardo Melo', 'r_melo@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-03-07', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['s_fragoso', 'Sonia Fragoso', 's_fragoso@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2020-03-08', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['s_luna', 'Selene Luna Villagrán', 's_luna@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2020-03-09', null, ['A', 'A', 'A', 'A', 'B', 'B', 'B', 'B', 'B', 'B']],
            ['s_payan', 'Sheyla Payán Rubio', 's_payan@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2020-03-10', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['s_sanchez', 'Salvador Sánchez Ruíz', 's_sanchez@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2020-03-11', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['u_mora', 'Ulises Alejandro Mora Marquez', 'u_mora@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2020-03-12', null, ['A', 'A', 'A', 'A', 'B', 'B', 'B', 'B', 'B', 'B']],
            ['r_terrez', 'Ramses Roberto Terrez', 'r_terrez@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2024-12-02', '2024-12-02', ['X', 'X', 'X', 'A', 'A', 'A', 'A', 'A', 'B', 'B']],
            ['h_shima', 'Hiroiku Shima', 'h_shima@ngkntk.com.mx', 'Confidencial', 'Presidencia', 'usuario general', '2024-10-31', '2024-10-31', ['I', 'I', 'B', 'B', 'B', 'B', 'B', 'B', 'B', 'B']],
            ['e_ramirez', 'Emilio Raul Ramirez Gonzalez', 'e_ramirez@ngkntk.com', 'Confidencial', 'Ventas', 'usuario general', '2024-10-03', '2024-10-03', ['X', 'N', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['n_vicencio', 'René Vicencio López', 'n_vicencio@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2024-09-20', '2024-09-20', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['g_velazquez', 'Guillermo Velázquez Salazar', 'g_velazquez@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2024-08-20', '2024-08-20', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['a_castrejon', 'Angel Uriel Castrejon Roman', 'a_castrejon@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2024-07-17', '2024-07-17', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['l_govea', 'Luis Govea', 'l_govea@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2024-07-15', '2024-07-15', ['X', 'N', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['i_cruz', 'Ismael Cruz Peña', 'i_cruz@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2024-07-09', '2024-07-09', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['m_themsel', 'Maria Luisa Themsel Montaño', 'm_themsel@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2024-07-09', '2024-07-09', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['d_vargas', 'Daniel Vargas', 'd_vargas@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2024-07-08', '2024-07-08', ['X', 'N', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['r_martinez', 'Ruben Martinez', 'r_martinez@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2024-07-08', '2024-07-08', ['X', 'N', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['r_delao', 'Rodrigo De la O', 'r_delao@ngkntk.com.mx', 'Confidencial', 'Administración', 'usuario general', '2024-06-28', '2024-06-28', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['Mercadotecnia', 'Mercadotecnia', 'mercadotecnia@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2020-03-25', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['MigTest', 'Migration Test', 'migtest@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-03-26', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['k_minai', 'Kazuki Minai', 'k_minai@ngkntk.com.mx', 'Confidencial', 'Presidencia', 'usuario general', '2024-06-13', '2024-06-13', ['X', 'N', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['c_cuenca', 'Cruz Cuenca Mayo', 'c_cuenca@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2024-06-07', '2024-06-07', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['d_garcia', 'Daniela Sputnik Garcia Camacho', 'd_garcia@ngkntk.com.mx', 'Confidencial', 'Administración', 'usuario general', '2024-06-07', '2024-06-07', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['j_palafox', 'Jorge Alberto Palafox Pineda', 'j_palafox@ngkntk.com.mx', 'Confidencial', 'Administración', 'usuario general', '2024-06-07', '2024-06-07', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['NGKAdminMX', 'NGKAdmin Mexico', 'NGKAdmin@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-03-31', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['ngkmxfilebox', 'ngkmxfilebox', 'ngkmxfilebox@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-04-01', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['NGKMXService', 'NGKMXService', 'NGKMXService@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-04-02', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['r_fujii', 'Ryo Fujii', 'r_fujii@ngkntk.com.mx', 'Confidencial', 'Presidencia', 'usuario general', '2024-06-07', '2024-06-07', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['c_garcia', 'Carlos Garcia Kersten', 'c_garcia@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2024-05-24', '2024-05-24', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['Plantasngk', 'Plantas Armadoras', 'plantasngk@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-04-05', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['postmasterMX', 'PostMaster Mexico', 'postmaster@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-04-06', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['c_ruiz', 'Juan Carlos Ruiz Lopez', 'c_ruiz@gnkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2024-05-24', '2024-05-24', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['bjacobsmx', 'Ben Jacobs MX', 'bjacobsmx@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2024-03-20', '2024-03-20', ['I', 'I', 'I', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['g_bautista', 'Guadalupe bautista Esparza', 'g_bautista@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2024-02-13', '2024-02-13', ['B', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['s_reyes', 'Selene de Jesus Reyes Cabral', 's_reyes@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2024-02-13', '2024-02-13', ['B', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['b_cerda', 'Beatriz Cerda', 'b_cerda@ngkntk.com.mx', 'Confidencial', 'Administración', 'usuario general', '2024-08-05', '2024-08-05', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'A', 'A']],
            ['b_chong', 'Brenda Chong', 'b_chong@ngkntk.com.mx', 'Confidencial', 'Administración', 'usuario general', '2024-08-05', '2024-08-05', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['rhngk', 'Recursos Humanos NITERRA MEXICO SA DE', 'rhngk@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-04-13', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['f_mendoza', 'Fabiola Mendoza', 'f_mendoza@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2024-09-02', '2024-09-02', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'A', 'A']],
            ['j_flores', 'Jose Miguel Flores Castillo', 'j_flores@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2024-08-05', '2024-08-05', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'A', 'A']],
            ['k_martinez', 'Karen Itzel Martinez', 'k_martinez@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2024-10-14', '2024-10-14', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'A', 'A']],
            ['l_sampedro', 'Luis Fernando Sampedro Cruz', 'l_sampedro@ngkntk.com.mx', 'Confidencial', 'Ventas', 'usuario general', '2024-08-19', '2024-08-19', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'A', 'A']],
            ['l_sanchezl', 'Lizeth Sanchez Luna', 'l_sanchezl@ngkntk.com.mx', 'Confidencial', 'SCM', 'usuario general', '2024-08-19', '2024-08-19', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'A', 'A']],
            ['m_mora', 'Miguel Angel Mora Cruz', 'm_mora@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2024-08-27', '2024-08-27', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'A', 'A']],
            ['scm_mex', 'scm_mex', 'scm_mex@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-04-20', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['sistemasweb', 'Soporte sistemas WEB', 'sistemasweb@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-04-21', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['s_jimenez', 'Sebastian Jimenez', 's_jimenez@ngkntk.com.mx', 'Confidencial', 'Mercadotecnia', 'usuario general', '2024-08-05', '2024-08-05', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['w_morales', 'Wendy Raquel Morales Jiménez', 'w_morales@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2024-06-07', '2024-06-07', ['A', 'A', 'B', 'X', 'X', 'X', 'X', 'X', 'B', 'B']],
            ['webmasterMX', 'webmaster', 'webmaster@ngkntk.com.mx', 'Confidencial', 'Servicios', 'usuario general', '2020-04-24', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['adm_ventas', 'Administracion Ventas', null, 'Confidencial', 'Servicios', 'usuario general', '2020-04-25', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['Bartendadmin', 'Bartendadmin', null, 'Confidencial', 'Servicios', 'usuario general', '2020-04-26', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['bujias_ngk', 'Bujias NGK de Mexico', null, 'Confidencial', 'Servicios', 'usuario general', '2020-04-27', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['EP1adm', 'EP1adm', null, 'Confidencial', 'Servicios', 'usuario general', '2020-04-28', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['intranet', 'Intranet NGK', null, 'Confidencial', 'Servicios', 'usuario general', '2020-04-29', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['itniterramx', 'IT Niterra IT. México', null, 'Confidencial', 'Servicios', 'usuario general', '2020-04-30', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['IUSR_SRVDATA', 'IUSR_SRVDATA', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-01', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['IUSR_SRVDATOS1', 'IUSR_SRVDATOS1', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-02', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['IWAM_SRVDATA', 'IWAM_SRVDATA', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-03', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['IWAM_SRVDATOS1', 'IWAM_SRVDATOS1', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-04', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['j_marron_A', 'Jesús AM. Legorreta ADM', null, 'Confidencial', 'Sistemas', 'usuario general', '2020-05-05', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['mantenimiento', 'Mantenimiento NGK', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-06', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['mxtrust', 'mx trust', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-07', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['NGKMXServiceDDI', 'Sensor DDI', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-08', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['ngkntk.com.mx$', 'ngkntk.com.mx$', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-09', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['NITERRANA$', 'NITERRANA$', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-10', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['NMexServiceMigratio', 'NMexServiceMigrationQODM', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-11', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['SAPServiceED1', 'SAPServiceED1', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-12', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['SAPServiceEP1', 'SAPServiceEP1', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-13', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['SAPServiceEQ1', 'SAPServiceEQ1', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-14', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['SQLDebugger', 'SQLDebugger', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-15', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['TsInternetUser', 'TsInternetUser', null, 'Confidencial', 'Servicios', 'usuario general', '2020-05-16', null, ['A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A']],
            ['l_barrera', 'Laura Barrera', 'l_barrera@ngkntk.com.mx', 'Confidencial', 'Finanzas', 'usuario general', '2025-01-04', '2025-01-06', ['X', 'X', 'A', 'A', 'A', 'A', 'A', 'A', 'B', 'B']],
            ['n_valencia', 'Noé Valencia Leyva', 'noe.valencia@niterragroup.com', 'Confidencial', 'Mercadotecnia', 'usuario general', '2025-03-11', '2025-03-11', ['X', 'X', 'X', 'X', 'A', 'A', 'A', 'A', 'B', 'B']],
            ['e_ibarra', 'Edith Ibarra Dionicio', 'edith.ibarra@niterragroup.com', 'Confidencial', 'Finanzas', 'usuario general', '2025-04-03', '2025-04-03', ['X', 'X', 'X', 'X', 'X', 'A', 'A', 'A', 'A', 'A']],
            ['e_rodriguez', 'Edwin Alejandro Rodríguez Leal', 'edwin.rodriguez@niterragroup.com', 'Confidencial', 'Ventas', 'usuario general', '2025-04-14', '2025-04-14', ['X', 'X', 'X', 'X', 'X', 'A', 'A', 'A', 'B', 'B']],
            ['k_rodriguez', 'Kevin Santiago Rodríguez Isidoro', 'kevin.rodriguez@niterragroup.com', 'Confidencial', 'BI', 'usuario general', '2025-04-30', '2025-04-30', ['X', 'X', 'X', 'X', 'X', 'A', 'A', 'A', 'A', 'A']],
            ['c_millan', 'Christian Javier Millán García', 'christian.millan@niterragroup.com', 'Confidencial', 'Mercadotecnia', 'usuario general', '2025-04-30', '2025-04-30', ['X', 'X', 'X', 'X', 'X', 'A', 'A', 'A', 'B', 'B']],
            ['b_guzman', 'Brenda Esmeralda Guzmán Tepectzin', 'brenda.guzman@niterragroup.com', 'Confidencial', 'Finanzas', 'usuario general', '2025-05-28', '2025-05-28', ['X', 'X', 'X', 'X', 'X', 'A', 'A', 'A', 'A', 'A']],
            ['e_romero', 'Edwin Alejandro Romero Reyes', 'edwin.romero@niterragroup.com', 'Confidencial', 'Finanzas', 'usuario general', '2025-05-28', '2025-05-28', ['X', 'X', 'X', 'X', 'X', 'A', 'A', 'A', 'A', 'A']],
            ['t_arakawa', 'Takahiro Arakawa', 'takahiro.arakawa@niterragroup.com', 'Clasificado', 'Presidencia', 'usuario general', '2025-05-19', '2025-05-19', ['X', 'X', 'X', 'X', 'X', 'A', 'A', 'A', 'A', 'A']],
            ['c_maldonado', 'Claudia Isabel Maldonado López', 'claudia.maldonado@niterragroup.com', 'Clasificado', 'Recursos Humanos', 'usuario general', '2025-06-10', '2025-06-10', ['X', 'X', 'X', 'X', 'X', 'A', 'A', 'A', 'A', 'A']],
            ['a_montes', 'Axel Alejandro Montes Soto', 'axel.montes@niterragroup.com', 'Confidencial', 'Mercadotecnia', 'usuario general', '2025-08-15', '2025-08-15', ['X', 'X', 'X', 'X', 'X', 'X', 'A', 'A', 'A', 'A']],
            ['l_martinez', 'Luis Guillermo Martinez Garduño', 'guillermo.martinez@niterragroup.com', 'Confidencial', 'Mercadotecnia', 'usuario general', '2025-08-15', '2025-12-17', ['X', 'X', 'X', 'X', 'X', 'X', 'A', 'B', 'B', 'B']],
            ['c_banda', 'Carlos Alberto Banda Villar', 'carlos.banda@niterragroup.com', 'Confidencial', 'Ventas Exportación', 'usuario general', '2025-10-20', '2025-10-20', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'A', 'A', 'A']],
            ['l_oregon', 'Luis Ángel Oregón Martínez', 'luis.oregon@niterragroup.com', 'Confidencial', 'Ventas', 'usuario general', '2025-10-20', '2025-10-20', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'A', 'A', 'A']],
            ['m_horcasitas', 'Mario Alberto Horcasitas Hernández', 'mario.horcasitas@niterragroup.com', 'Clasificado', 'Ventas', 'usuario general', '2025-12-19', '2025-12-19', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'A', 'A', 'A']],
            ['m_ugalde', 'Mauricio Ugalde Galindo', 'mauricio.ugalde@niterragroup.com', 'Clasificado', 'Mercadotecnia', 'usuario general', '2026-02-16', '2026-02-16', ['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'A', 'A']],
        ];

        // Mapear colaboradores existentes por id_AD (en minúsculas para evitar fallos de casing)
        $colaboradoresMap = [];
        if (Schema::hasTable('colaboradors') && Schema::hasColumn('colaboradors', 'id_AD')) {
            foreach (Colaborador::whereNotNull('id_AD')->get(['id', 'id_AD']) as $col) {
                $colaboradoresMap[strtolower(trim($col->id_AD))] = $col->id;
            }
        } elseif (Schema::hasTable('colaboradores') && Schema::hasColumn('colaboradores', 'id_AD')) {
            foreach (Colaborador::whereNotNull('id_AD')->get(['id', 'id_AD']) as $col) {
                $colaboradoresMap[strtolower(trim($col->id_AD))] = $col->id;
            }
        }

        foreach ($trimestres as $idx => $meta) {
            $totalVigentes = 0;
            $totalDesactivados = 0;
            $totalBorrados = 0;
            $totalNuevos = 0;
            $totalInhabilitados = 0;
            $totalReactivados = 0;
            $totalEliminados = 0;
            $detalles = [];

            foreach ($usuariosAd as $u) {
                [$samAccount, $nombre, $correo, $clasificacion, $depto, $tipoCuenta, $fechaCreacion, $fechaCambio, $estados] = $u;

                $estadoActual = $estados[$idx] ?? 'X';
                if ($estadoActual === 'X') {
                    continue; // NA: aún no existía o no aplica en este corte
                }

                $estadoPrevio = ($idx > 0) ? ($estados[$idx - 1] ?? 'X') : 'A';

                // Mapeo exacto al enum `estado_ad`
                $estadoAd = match ($estadoActual) {
                    'A', 'N' => 'VIGENTE',
                    'I' => 'DESACTIVADO_EN_AD',
                    'B' => 'NO_EXISTE_EN_AD',
                    default => 'VIGENTE',
                };

                // Mapeo exacto al enum `tipo_cambio` comparando contra el trimestre previo
                if ($estadoActual === 'N' || ($idx > 0 && $estadoPrevio === 'X' && in_array($estadoActual, ['A', 'N']))) {
                    $tipoCambio = 'NUEVO';
                } elseif ($estadoActual === 'B' && $estadoPrevio !== 'B') {
                    $tipoCambio = 'ELIMINADO';
                } elseif ($estadoActual === 'I' && $estadoPrevio !== 'I') {
                    $tipoCambio = 'INHABILITADO';
                } elseif ($estadoActual === 'A' && in_array($estadoPrevio, ['I', 'B'])) {
                    $tipoCambio = 'REACTIVADO';
                } else {
                    $tipoCambio = 'SIN_CAMBIOS';
                }

                // Acumuladores de cabecera
                if ($estadoAd === 'VIGENTE') {
                    $totalVigentes++;
                } elseif ($estadoAd === 'DESACTIVADO_EN_AD') {
                    $totalDesactivados++;
                } elseif ($estadoAd === 'NO_EXISTE_EN_AD') {
                    $totalBorrados++;
                }

                if ($tipoCambio === 'NUEVO')
                    $totalNuevos++;
                if ($tipoCambio === 'ELIMINADO')
                    $totalEliminados++;
                if ($tipoCambio === 'INHABILITADO')
                    $totalInhabilitados++;
                if ($tipoCambio === 'REACTIVADO')
                    $totalReactivados++;

                $existeEnAd = ($estadoAd !== 'NO_EXISTE_EN_AD');
                $activoEnAd = ($estadoAd === 'VIGENTE');

                $detalles[] = [
                    'colaborador_id' => $colaboradoresMap[strtolower(trim($samAccount))] ?? null,
                    'id_ad_registrado' => $samAccount,
                    'nombre_completo_ad' => $nombre,
                    'email_ad' => $correo,
                    'departamento_ad' => $depto,
                    'clasificacion' => $clasificacion,
                    'tipo_cuenta' => $tipoCuenta,
                    'mes_recertificacion' => $meta['mes'],
                    'fecha_creacion_ad' => $fechaCreacion . ' 00:00:00',
                    'fecha_recertificacion' => $meta['fecha'],
                    'fecha_cambio_ad' => $fechaCambio ? ($fechaCambio . ' 00:00:00') : null,
                    'existe_en_ad' => $existeEnAd ? 1 : 0,
                    'activo_en_ad' => $activoEnAd ? 1 : 0,
                    'estado_ad' => $estadoAd,
                    'tipo_cambio' => $tipoCambio,
                    'resuelto' => 1,
                    'observaciones' => "Importación histórica {$meta['periodo']}",
                    'created_at' => $meta['fecha'],
                    'updated_at' => $meta['fecha'],
                ];
            }

            $totalEvaluados = $totalVigentes + $totalDesactivados + $totalBorrados;

            // 1. Guardar cabecera en `recertificacions`
            $recertificacion = Recertificacion::updateOrCreate(
                ['folio' => $meta['folio']],
                [
                    'periodo' => $meta['periodo'],
                    'fecha_ejecucion' => $meta['fecha'],
                    'total_evaluados' => $totalEvaluados,
                    'total_vigentes' => $totalVigentes,
                    'total_desactivados_ad' => $totalDesactivados,
                    'total_no_encontrados_ad' => $totalBorrados,
                    'total_nuevos' => $totalNuevos,
                    'total_inhabilitados' => $totalInhabilitados,
                    'total_reactivados' => $totalReactivados,
                    'total_eliminados' => $totalEliminados,
                    'estatus' => 'APROBADO',
                    'notas' => "Recertificación histórica trimestral ({$meta['periodo']} - {$meta['mes']}) cargada desde matriz SGSI.",
                    'aprobado_por_user_id' => $usuarioAdmin?->id,
                ]
            );

            // 2. Guardar detalle en `recertificacion_detalles` (en lotes de 40 para no exceder límite de parámetros SQL Server)
            DB::table('recertificacion_detalles')
                ->where('recertificacion_id', $recertificacion->id)
                ->delete();

            foreach ($detalles as &$det) {
                $det['recertificacion_id'] = $recertificacion->id;
            }
            unset($det);

            foreach (array_chunk($detalles, 40) as $lote) {
                DB::table('recertificacion_detalles')->insert($lote);
            }

            $this->command->line(" ✓ {$meta['periodo']} ({$meta['folio']}): Evaluados={$totalEvaluados} | Vigentes={$totalVigentes} | Desactivados={$totalDesactivados} | Borrados={$totalBorrados}");
        }

        $this->command->info('¡Los 10 trimestres históricos de Recertificación AD (Q1 2024 - Q2 2026) se cargaron exitosamente!');
    }
}