<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updateOrCreate(['titre' => 'Administrateur']);
        Role::updateOrCreate(['titre' => 'Assistante de direction']);
        Role::updateOrCreate(['titre' => 'Formateur']);
        Role::updateOrCreate(['titre' => 'Apprenant']);
        Role::updateOrCreate(['titre' => 'Responsable Restauration']);
    }
}
