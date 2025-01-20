<?php

namespace App\Http\Controllers;

use App\Models\Access;
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
		$user = Utilisateur::all();
		foreach ($user as $ur) {
			if (Hash::check($request->pass, $ur->password)) {
				Auth::login($ur);
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

	public function showFormRegister()
	{
		return view('register');
	}

	public function register(Request $request)
	{
		$validatedData = $request->validate([
			'nom_utili' => 'required|string|max:255',
			'mot_utili' => 'required|string|max:255',
			'code_utili' => 'required|string|max:5|min:5',
			'categorie_utili' => 'required|string|max:255',
			'email_utili' => 'required|string|max:255',
		]);
		$access = Access::all();
		foreach ($access as $ac)
		{
			if (($ac->login === $validatedData['nom_utili']) && ($ac->magic === $validatedData['code_utili'])
				&& ($ac->categorie === $validatedData['categorie_utili']))
			{
				$utilis = new Utilisateur();
				$utilis->login = $validatedData['nom_utili'];
				$utilis->password = Hash::make($validatedData['mot_utili']);
				$utilis->email = $validatedData['email_utili'];
				$utilis->categorie = $validatedData['categorie_utili'];
				$utilis->save();
				return redirect()->route('affichage');
			}
		}
		return view('register');
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
		$mention = $moyenne >= 16 ? 'Très Bien' :
				($moyenne >= 14 ? 'Bien' :
				($moyenne >= 12 ? 'Assez Bien' :
				($moyenne >= 10 ? 'Passable' : 'Non Admis')));
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 20);
		$pdf->SetTextColor(50, 50, 150);
		$pdf->Cell(0, 15, iconv('UTF-8', 'ISO-8859-1', 'Bschool'), 0, 1, 'C');
		$pdf->SetFont('Arial', '', 14);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Bulletin de Notes'), 0, 1, 'C');
		$pdf->Ln(10);
		$pdf->SetFont('Arial', '', 12);
		$pdf->SetFillColor(230, 230, 250);
		$pdf->SetDrawColor(100, 100, 100);
		$pdf->Cell(50, 10, 'Nom : ', 1, 0, 'L', true);
		$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', $etudiant->nom), 1, 1, 'L');
		$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-1', 'Mathématiques : '), 1, 0, 'L', true);
		$pdf->Cell(0, 10, $etudiant->math, 1, 1, 'L');
		$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-1', 'Informatique : '), 1, 0, 'L', true);
		$pdf->Cell(0, 10, $etudiant->info, 1, 1, 'L');
		$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-1', 'Moyenne : '), 1, 0, 'L', true);
		$pdf->Cell(0, 10, number_format($moyenne, 2), 1, 1, 'L');
		$pdf->Cell(50, 10, iconv('UTF-8', 'ISO-8859-1', 'Mention : '), 1, 0, 'L', true);
		$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', $mention), 1, 1, 'L');
		$pdf->Ln(10);
		$pdf->SetDrawColor(150, 150, 150);
		$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
		$pdf->Ln(10);
		$pdf->SetFont('Arial', 'I', 10);
		$pdf->SetTextColor(100, 100, 100);
		$pdf->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Document généré automatiquement le ' . date('d/m/Y')), 0, 0, 'C');
		return response($pdf->Output('natija.pdf', 'S'))
			->header('Content-Type', 'application/pdf')
			->header('Content-Disposition', 'inline; filename="natija.pdf"');
	}	

	public function showAffichage()
	{
		$etudiants = Etudiant::where('valide', 1)->get();
		return view('affichage', compact('etudiants'));
	}

	public function showAcceuil()
	{
		return view('affichage');
	}
}