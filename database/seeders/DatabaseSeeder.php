<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\User as SeedersUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            SeedersUser::class,
        ]);
        $this->call([
        // ... Conserva tus seeders anteriores si tienes uno para Users, etc.
        VdaControlSeeder::class, 
    ]);
    }
}