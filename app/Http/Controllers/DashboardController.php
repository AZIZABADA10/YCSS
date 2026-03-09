<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Redirect the user to their role-specific dashboard.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role->titre === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role->titre === 'apprenant') {
            return redirect()->route('apprenant.dashboard');
        }

        return redirect('/'); // Default fallback
    }
}
