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
	//The function of the logout, invalidate session, regenerate token
	public function logout(Request $request)
	{
		Auth::logout();//logout
		$request->session()->invalidate();//invalid session
		$request->session()->regenerateToken();//regenerate token

		return redirect()->route('login');//Redirect to the login page
	}
	//The funciton of login
	public function login(Request $request)
	{
		$request->validate([
			//Check if the ID and pass are required and are a string type
			'ID' => 'required|string',
			'pass' => 'required|string',
		]);
		
		$user = Utilisateur::all();//Use all user
		foreach ($user as $ur) {//Boucle pour checks all user of table Utilisateur
			if (Hash::check($request->pass, $ur->password)) {
				Auth::login($ur);//Log the user in
				return redirect()->route('affichage');//If everthing is good redirect to the login page
			}
		}
		//Else in case an error on login redirect to the student display page
		return back()->withErrors(['login_error' => 'Identifiants invalides.']);
	}
	//Display the form for adding a student
	public function showFormallNouveau()
	{
		return view('nouveau');
	}
	//Display the form for editing a student
	public function showFormUpdate($id)
	{
		$etudiant = Etudiant::find($id);//Find the sudent by useing the ID
		return view('nouveau', compact('etudiant'));//Return the nouveau view with the student data
	}
	//Display the form for register
	public function showFormRegister()
	{
		return view('register');
	}
	//The function that handle the registration
	public function register(Request $request)
	{
		/*
			Check if the nom_utili, mot_utili, categorie_utili,
			email_utili are required and are a string , and also
			checks if code_utili are number of 5 digits
		*/
		$validatedData = $request->validate([
			'nom_utili' => 'required|string|max:255',
			'mot_utili' => 'required|string|max:255',
			'code_utili' => 'required|digits:5',
			'categorie_utili' => 'required|string|max:255',
			'email_utili' => 'required|string|max:255',
		]);
		$access = Access::all();//Use all user
		foreach ($access as $ac)//Boucle pour checks all user of table Utilisateur
		{
			//Checks if the data pass on register form is matches the data on table access
			if (($ac->login === $validatedData['nom_utili']) && ($ac->magic === $validatedData['code_utili'])
				&& ($ac->categorie === $validatedData['categorie_utili']))
			{
				//If the condition true add new user on table Utilisateur
				$utilis = new Utilisateur();
				$utilis->login = $validatedData['nom_utili'];
				$utilis->password = Hash::make($validatedData['mot_utili']);
				$utilis->email = $validatedData['email_utili'];
				$utilis->categorie = $validatedData['categorie_utili'];
				$utilis->save();
				return redirect()->route('affichage');//Redirect to the affichage page
			}
		}
		return redirect()->back()->withErrors('Invalid argument.')->withInput();//In case error you still on the same page
	}
	//The function's handles the case if user forget the password
	public function forget_password(Request $request)
	{
		/*
			Check if the mot_utili, mot_utili_reteype,
			email_utili are required and are a string , and also
			checks if code_utili are number of 5 digits
		*/
		$validatedData = $request->validate([
			'mot_utili' => 'required|string|max:255',
			'mot_utili_reteype' => 'required|string|max:255',
			'code_utili' => 'required|digits:5',
			'email_utili' => 'required|string|max:255',
		]);
		//Find the user of table acess base on the code magic
		$access = Access::where('magic', $validatedData['code_utili'])->first();
		if ($access)
		{
			//Find the user of table Utilisateur base on the email
			$utilis = Utilisateur::where(['email' => $validatedData['email_utili']])->first();
			if ($utilis)
			{
				//update the user's password and save the new ont
				$utilis->password = Hash::make($validatedData['mot_utili']);
				$utilis->save();
				return redirect()->route('login');//Redirect to the login page
			}
			else //Returns an error or email not exit in the table if the email is not find
				return redirect()->back()->withErrors(['email_utili' => 'Aucun utilisateur trouvé avec cet email.'])->withInput();
		}
		return redirect()->back()->withErrors(['code_utili' => 'Code de réinitialisation invalide.'])->withInput();//Returns an error or the code not exit on the table if the email is not find
	}
	//The function adds a new student
	public function addEtudiant(Request $request)
	{
		/*
			Check if the nom_etu is a string, and also
			checks if note_math and note_info are number betwene
			0 and 20
		*/
		$validatedData = $request->validate([
			'nom_etu' => 'required|string|max:255',
			'note_math' => 'required|numeric|min:0|max:20',
			'note_info' => 'required|numeric|min:0|max:20',
		]);     
		$etudiant = new Etudiant();//Create new student
		$etudiant->nom = $validatedData['nom_etu'];
		$etudiant->math = $validatedData['note_math'];
		$etudiant->info = $validatedData['note_info'];
		$etudiant->save();//Saves the data of the student
		return redirect()->route('affichage');//Redirect to the affichage page
	}
	//The function update a new student
	public function updateEtudiant(Request $request, $id)
	{
		/*
			Check if the nom_etu is a string, and also
			checks if note_math and note_info are number betwene
			0 and 20
		*/
		$validatedData = $request->validate([
			'nom_etu' => 'required|string|max:255',
			'note_math' => 'required|numeric|min:0|max:20',
			'note_info' => 'required|numeric|min:0|max:20',
		]);     
		$etudiant = Etudiant::find($id);//Find the student to update by the ID variable
		if ($etudiant)
		{
			$etudiant->nom = $validatedData['nom_etu'];
			$etudiant->math = $validatedData['note_math'];
			$etudiant->info = $validatedData['note_info'];
			$etudiant->save();//Saves the data of the student
		}
		else//If there is no student
			return redirect()->back()->withErrors(['error' => 'Étudiant non trouvé.']);//Returns on the page before
		return redirect()->route('affichage');//On case de success redirects to affichage page
	}
	//The function deletes a new student
	public function deleteEtudiant($id)
	{
		$etudiant = Etudiant::find($id);//Find the student to update by the ID variable
		if ($etudiant) {
			$etudiant->delete();//Delete the student select
		}else{
			return redirect()->back();//Returns on the page before
		}
		return redirect()->route('affichage');//On case de success redirects to affichage page
	}
	//The function who generates the bulletin
	public function generatePDF($bulletin_id)
	{
		$etudiant = Etudiant::findOrFail($bulletin_id);//Find the student to update by the ID variable
		$moyenne = ($etudiant->math + $etudiant->info) / 2;//Calculate the averge
		$mention = $moyenne >= 16 ? 'Très Bien' ://Determe the mention of the student
				($moyenne >= 14 ? 'Bien' :
				($moyenne >= 12 ? 'Assez Bien' :
				($moyenne >= 10 ? 'Passable' : 'Non Admis')));
		//Generate the pdf with some styles
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
		return response($pdf->Output('bulletin.pdf', 'S'))
			->header('Content-Type', 'application/pdf')
			->header('Content-Disposition', 'inline; filename="bulletin.pdf"');
	}	
	//Display the form for affichage
	public function showAffichage()
	{
		$etudiants = Etudiant::where('valide', 1)->get();
		return view('affichage', compact('etudiants'));
	}
	//Display the form for loging a user
	public function showFormLogin()
	{
		return view('login');
	}
	//Display the form for forget password
	public function showFormForgetPasswor()
	{
		return view('forget_password');
	}
}