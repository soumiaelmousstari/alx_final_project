<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Etudiants;

class logicontroller extends Controller
{
    public function showLoginForm()
    {
        return view('index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'ID' => 'required|string',
            'pass' => 'required|string',
        ]);
        $user = Etudiants::where('user_id', $request->ID)->first();
    
        if ($user) {
            if (Hash::check($request->pass, $user->password)) {
                Auth::login($user);
                return redirect()->route('affichage');
            }
        }
    
        return back()->withErrors(['login_error' => 'Identifiants invalides.']);
    }
    public function showAffichage()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $etudiants = Etudiants::where('valide', 1)->get();

        return view('affichage', compact('etudiants'));
    }
}