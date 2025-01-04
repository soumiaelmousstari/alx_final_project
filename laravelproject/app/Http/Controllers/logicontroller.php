<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Hash;

class logicontroller extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('index');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Déconnecte l'utilisateur
        $request->session()->invalidate(); // Invalide la session
        $request->session()->regenerateToken(); // Regénère le token CSRF

        return redirect()->route('login'); // Redirige vers la page de connexion
    }

    public function login(Request $request)
{
    $credentials = $request->only('ID', 'pass');

    // Exemple de validation des identifiants
    if ($credentials['ID'] === 'soumia' && $credentials['pass'] === 'soumia') {
        // Redirection vers la page index après un succès
        return redirect()->route('index');
    } else {
        // Retour à la page de login avec une erreur
        return back()->withErrors(['login_error' => 'Identifiants invalides.']);
    }
}
    // Gérer la connexion
    // public function login(Request $request)
    // {
    //     // Validation des données
    //     $request->validate([
    //         'ID' => 'required|string',
    //         'mot_de_passe' => 'required|string',
    //     ]);

    //     // Vérifier si l'utilisateur existe dans la base de données
    //     $user = DB::table('utilisateur')->where('login', $request->input('ID'))->first();

    //     if ($user && Hash::check($request->input('pass'), $user->mot_de_passe)) {
    //         // L'utilisateur existe et le mot de passe est correct
    //         Session::put('permission', $user->categorie);
    //         Session::put('user_id', $user->id);
    //         Session::put('user_name', $user->login);

    //         return redirect()->route('login');
    //     } else {
    //         return back()->withErrors(['login_error' => 'Mot de passe ou identifiant incorrect']);
    //     }
    // }
}

