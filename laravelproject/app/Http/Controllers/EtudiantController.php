<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::where('valide', 1)->get();
        return view('etudiants.index', compact('etudiants'));
    }

    public function delete($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès.');
    }

    public function create(Request $request)
    {
        // Ajouter validation et logique de création ici
    }

    public function bulletin($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.bulletin', compact('etudiant'));
    }
}
