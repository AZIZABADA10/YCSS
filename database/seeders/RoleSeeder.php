<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'titre' => 'admin'
        ]);
        Role::create([
            'titre' => 'apprenant'
        ]);
        Role::create([
            'titre' => 'Formateur'
        ]);
        Role::create([
            'titre' => 'Assistante de direction'
        ]);
        Role::create([
            'titre' => 'Responsable Restauration'
        ]);
    }
}
