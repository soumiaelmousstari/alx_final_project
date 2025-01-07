<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Etudiant;
use App\Models\Utilisateur;

class logicontroller extends Controller
{
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
        $user = Utilisateur::where('login', $request->ID)->first();
        if ($user) {
            if (Hash::check($request->pass, $user->password)) {
                Auth::login($user);
                return redirect()->route('affichage');
            }
        }
    
        return back()->withErrors(['login_error' => 'Identifiants invalides.']);
    }

    public function showForm(Request $request)
    {
        $etudiant = null;

        if ($request->has('id_to_modify')) {
            $etudiant = Etudiant::find($request->id_to_modify);
        }

        return view('nouveau', compact('etudiant'));
    }

    public function handleForm(Request $request)
    {
        $validatedData = $request->validate([
            'nom_etu' => 'required|string|max:255',
            'note_math' => 'required|numeric',
            'note_info' => 'required|numeric',
        ]);
        
        if ($request->has('id_to_modify')) {
            $etudiant = Etudiant::find($request->id_to_modify);
            $etudiant->nom = $validatedData['nom_etu'];
            $etudiant->math = $validatedData['note_math'];
            $etudiant->info = $validatedData['note_info'];
            $etudiant->save();
        } elseif ($request->has('id_to_sup'))
        {
            $etudiant = Etudiant::find($request->id_to_sup);
            if ($etudiant) {
                $etudiant->delete();
            }else{
                dd('Étudiant non trouvé');
            }
        } else {
            $etudiant = new Etudiant();
            $etudiant->nom = $validatedData['nom_etu'];
            $etudiant->math = $validatedData['note_math'];
            $etudiant->info = $validatedData['note_info'];
            $etudiant->save();
        }
    
        return redirect()->route('affichage');
    }

    public function showAffichage()
    {
        $etudiants = Etudiant::where('valide', 1)->get();
        return view('affichage', compact('etudiants'));
    }
}