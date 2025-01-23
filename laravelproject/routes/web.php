<?php

use App\Http\Controllers\logicontroller;
use Illuminate\Support\Facades\Route;

/*
--------|-------------|-----------------------------|---------------------|
Method	|	Purpose	  | Action		  | Visibility	|	Use	Case          |
--------|-------------|---------------|-------------|---------------------|
  GET	|	Retrieve  | Read-only 	  | Query in 	|	Viewing a webpage |
		|	data	  | (No change)	  |	URL			|	or data           |
--------|-------------|---------------|-------------|---------------------|
  POST	|	Send data | Create or 	  | Hidden in 	|	Submitting a form |
			to server | process data  | the body    |                     |
--------|-------------|---------------|-------------|---------------------|
  DELETE|	Remove 	  | Delete a 	  | Usually in 	|	Deleting a user   |
		|	data	  | resource	  | URL			|	or record         |
--------|-------------|---------------|-------------|---------------------|
*/


//Route for displaying the "affichage" page, handled by the "showAffichage" method
Route::get('affichage', [logicontroller::class, 'showAffichage'])->name('affichage');
//Route for deleting a student by ID, handled by the "deleteEtudiant" method
Route::delete('affichage/{id}', [logicontroller::class, 'deleteEtudiant'])->name('etudiant.delete');
//Route for processing login requests via POST, handled by the "login" method
Route::post('affichage', [logicontroller::class, 'login'])->name('login.post');


//Route for logging out a user, handled by the "logout" method
Route::get('/logout', [logicontroller::class, 'logout'])->name('logout');


//Route for displaying the form to add a new student, handled by the "showFormallNouveau" method
Route::get('/nouveau', [logicontroller::class, 'showFormallNouveau'])->name('nouveau');
//Route for adding a new student via POST request, handled by the "addEtudiant" method
Route::post('/nouveau', [logicontroller::class, 'addEtudiant'])->name('etudiant.add');
//Route for adding a new student via PUT request (redundant with the POST route above)
Route::put('/nouveau', [logicontroller::class, 'addEtudiant'])->name('etudiant.add');


//Route for updating a student by ID, handled by the "updateEtudiant" method
Route::put('/update/{id}', [logicontroller::class, 'updateEtudiant'])->name('etudiant.update');
//Route for displaying the update form for a student by ID, handled by the "showFormUpdate" method
Route::get('/update/{id}', [logicontroller::class, 'showFormUpdate'])->name('etudiant.show');


//Route for generating a PDF report (bulletin) for a student by ID, handled by the "generatePDF" method
Route::get('/bulletin/{id}', [logicontroller::class, 'generatePDF'])->name('etudiant.bulletin');


//Route for displaying the registration form, handled by the "showFormRegister" method
Route::get('register', [logicontroller::class, 'showFormRegister'])->name('register');
//Route for processing registration data via POST, handled by the "register" method
Route::post('register', [logicontroller::class, 'register'])->name('register.data');


//Route for displaying the login form, handled by the "showFormLogin" method
Route::get('/login', [logicontroller::class, 'showFormLogin'])->name('login');


//Route for displaying the "forget password" form, handled by the "showFormForgetPasswor" method
Route::get('/forget password', [logicontroller::class, 'showFormForgetPasswor'])->name('forget_password');
//Route for processing "forget password" data via POST, handled by the "forget_password" method
Route::post('/forget password', [logicontroller::class, 'forget_password'])->name('forget_password.data');



//Route for displaying the home page ("acceuill"), returns a view named "acceuill"
Route::get('/acceuill', function() {
	return view('acceuill');
})->name('acceuill');
