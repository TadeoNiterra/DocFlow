<?php

namespace Database\Seeders;

use App\Models\User as Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
            'role' => 'Administrador',
            'default_raci_type' => 'R',
            'is_active' => true,
        ]);

        $liderSgsi = Users::create([
            'name' => 'Jorge Guzman',
            'email' => 'jorge.guzman@niterragroup.com',
            'password' => $password,
            'default_raci_type' => 'R',
            'role' => 'Administrador',
            'is_active' => true,
        ]);

        $auditorTI = Users::create([
            'name' => 'Jose Tadeo',
            'email' => 'jose.tadeo@niterragroup.com',
            'password' => $password,
            'default_raci_type' => 'C',
            'role' => 'Administrador',
            'is_active' => true,
        ]);

        $directorGeneral = Users::create([
            'name' => 'Takahiro Arakawa',
            'email' => 'takahiro.arakawa@niterragroup.com',
            'password' => $password,
            'default_raci_type' => 'A',
            'role' => 'Administrador',
            'is_active' => true,
        ]);
    }
}