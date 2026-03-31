<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Données développées réelles
        $totalEtudiants = User::whereHas('role', function ($query) {
            $query->where('titre', 'Apprenant');
        })->count();

        $totalFormateurs = User::whereHas('role', function ($query) {
            $query->where('titre', 'Formateur');
        })->count();

        // Données non développées (initialisées à 0)
        $totalClasses = 0;
        $reservationsAujourdhui = 0;
        $absencesAujourdhui = 0;
        $demandesCertificats = 0;
        
        $demandesRecentes = []; // Tableau vide car non implémenté

        return view('admin.dashboard', compact(
            'totalEtudiants',
            'totalFormateurs',
            'totalClasses',
            'reservationsAujourdhui',
            'absencesAujourdhui',
            'demandesCertificats',
            'demandesRecentes'
        ));
    }
}
