<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        $user = auth()->user();

        if ($user->role->titre === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role->titre === 'apprenant') {
            return redirect()->route('apprenant.dashboard');
        }

        return redirect('/');  
    }
}
