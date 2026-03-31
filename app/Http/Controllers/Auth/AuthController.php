<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
 use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    

    public function showAuthForm()
    {
        return view('auth.auth');  
    }

    public function register(RegisterRequest $request)
    {
        try {
            $role = User::count() === 0 ? 1 : 2;
            $userData = [
                'nom_complet' => $request->nom_complet,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $role,
                'ville' => $request->ville,
                'telephone' => $request->telephone,
            ];

            if ($request->hasFile('photo')) {
                $imagePath = $request->file('photo')->store('profile_photos', 'public');
                $userData['photo'] = $imagePath;
            }

            $user = User::create($userData);
            Auth::login($user);

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            \Log::error('Erreur lors de l\'inscription : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de votre compte : ' . $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'Identifiants incorrects.');
    }





    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.show')->with('success','Vous avez été déconnecté avec succès.');
    }

    public function showDashboard()
    {
        return view('dashboard'); 
    }
    
}
