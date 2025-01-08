<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Etudiant;
use App\Models\Utilisateur;
use FPDF;

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

    public function showFormall(Request $request)
    {
        $etudiant = null;

        if ($request->has('id_to_modify')) {
            $etudiant = Etudiant::find($request->id_to_modify);
        }

        return view('nouveau', compact('etudiant'));
    }

    public function showForm($id)
    {
        $etudiant = Etudiant::find($id);
        return view('nouveau', compact('etudiant'));
    }

    public function addEtudiant(Request $request)
    {
        $validatedData = $request->validate([
            'nom_etu' => 'required|string|max:255',
            'note_math' => 'required|numeric|min:0|max:20',
            'note_info' => 'required|numeric|min:0|max:20',
        ]);     
        $etudiant = new Etudiant();
        $etudiant->nom = $validatedData['nom_etu'];
        $etudiant->math = $validatedData['note_math'];
        $etudiant->info = $validatedData['note_info'];
        $etudiant->save();
        return redirect()->route('affichage');
    }

    public function updateEtudiant(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom_etu' => 'required|string|max:255',
            'note_math' => 'required|numeric|min:0|max:20',
            'note_info' => 'required|numeric|min:0|max:20',
        ]);     
        $etudiant = Etudiant::find($id);
        if ($etudiant)
        {
            $etudiant->nom = $validatedData['nom_etu'];
            $etudiant->math = $validatedData['note_math'];
            $etudiant->info = $validatedData['note_info'];
            $etudiant->save();
        } else {
            return redirect()->back()->withErrors(['error' => 'Étudiant non trouvé.']);
        }
        return redirect()->route('affichage');
    }

    public function deleteEtudiant($id)
    {
        $etudiant = Etudiant::find($id);
        if ($etudiant) {
            $etudiant->delete();
        }else{
            dd('Étudiant non trouvé');
        }
        return redirect()->route('affichage');
    }

    public function generatePDF($bulletin_id)
    {
        $etudiant = Etudiant::findOrFail($bulletin_id);
        $moyenne = ($etudiant->math + $etudiant->info) / 2;
        if ($moyenne >= 10 && $moyenne < 12) {
            $mention = "Passable";
        } elseif ($moyenne >= 12 && $moyenne < 14) {
            $mention = "Assez Bien";
        } elseif ($moyenne >= 14 && $moyenne < 16) {
            $mention = "Bien";
        } elseif ($moyenne >= 16 && $moyenne <= 20) {
            $mention = "Tres Bien";
        } else {
            $mention = "Non Admis";
        }
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Bulletin de Notes de l\'Etudiant', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Nom: ' . $etudiant->nom, 0, 1);
        $pdf->Cell(0, 10, 'Note en Mathematiques: ' . $etudiant->math, 0, 1);
        $pdf->Cell(0, 10, 'Note en Informatique: ' . $etudiant->info, 0, 1);
        $pdf->Cell(0, 10, 'Moyenne: ' . number_format($moyenne, 2), 0, 1);
        $pdf->Cell(0, 10, 'Mention: ' . $mention, 0, 1);
        return response($pdf->Output('natija.pdf', 'S'))
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'inline; filename="natija.pdf"');
    }

    public function showAffichage()
    {
        $etudiants = Etudiant::where('valide', 1)->get();
        return view('affichage', compact('etudiants'));
    }
}