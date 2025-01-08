<?php

use App\Http\Controllers\logicontroller;
use Illuminate\Support\Facades\Route;

Route::get('affichage', [logicontroller::class, 'showAffichage'])->name('affichage');
Route::delete('affichage/{id}', [logicontroller::class, 'deleteEtudiant'])->name('etudiant.delete');
Route::post('affichage', [logicontroller::class, 'login'])->name('login.post');
Route::get('/logout', [logicontroller::class, 'logout'])->name('logout');
Route::get('/nouveau', [logicontroller::class, 'showFormall'])->name('nouveau');
Route::post('/nouveau', [logicontroller::class, 'addEtudiant'])->name('etudiant.add');
Route::put('/nouveau', [logicontroller::class, 'addEtudiant'])->name('etudiant.add');
Route::put('/update/{id}', [logicontroller::class, 'updateEtudiant'])->name('etudiant.update');
Route::get('/update/{id}', [logicontroller::class, 'showForm'])->name('etudiant.show');
Route::get('/bulletin/{id}', [logicontroller::class, 'generatePDF'])->name('etudiant.bulletin');
Route::get('/login', function() {
    return view('login');
})->name('login');
