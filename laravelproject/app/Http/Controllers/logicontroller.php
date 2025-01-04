<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class logicontroller extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('index');
    }

    // Gérer la connexion
    public function index(Request $request)
    {
        // Validation des données
        $request->validate([
            'ID' => 'required|string',
            'mot_de_passe' => 'required|string',
        ]);

        // Vérifier si l'utilisateur existe dans la base de données
        $user = DB::table('utilisateur')->where('login', $request->input('ID'))->first();

        if ($user && Hash::check($request->input('pass'), $user->mot_de_passe)) {
            // L'utilisateur existe et le mot de passe est correct
            Session::put('permission', $user->categorie);
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->login);

            return redirect()->route('index');
        } else {
            return back()->withErrors(['login_error' => 'Mot de passe ou identifiant incorrect']);
        }
    }
}

