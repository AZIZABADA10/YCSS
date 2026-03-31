<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->call(RoleSeeder::class);

        // Créer l'administrateur par défaut
        User::updateOrCreate(
            ['email' => 'admin@ycss.ma'],
            [
                'nom_complet' => 'Administrateur YCSS',
                'password' => bcrypt('admin123'),
                'role_id' => 1,
                'statut' => 1,
            ]
        );
    }
}
