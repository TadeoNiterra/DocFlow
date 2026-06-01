<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\DocumentVersion;
use App\Models\User as Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $password = Hash::make('PasswordSeguro123!');

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

        $doc = Document::create([
            'code' => 'PRO-CAL-001',
            'name' => 'Manual de Gestión de Calidad',
            'description' => 'Prueba',
            'type' => 'Manual',
        ]);

        DocumentVersion::create([
            'document_id' => $doc->id,
            'version_number' => 'v1.0',
            'change_description' => 'Creación del documento inicial.',
            'file_path' => '',
            'file_name' => '',
            'status' => 'draft',
            'user_id' => $directorGeneral->id,
        ]);
    }
}