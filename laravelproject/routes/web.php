<?php

use App\Http\Controllers\logicontroller;
use Illuminate\Support\Facades\Route;
use App\Models\Etudiant;
use App\Models\Utilisateur;

Route::get('affichage', [logicontroller::class, 'showAffichage'])->name('affichage');
Route::post('affichage', [logicontroller::class, 'handleForm'])->name('affichage.handle');
Route::delete('affichage', [logicontroller::class, 'handleForm'])->name('affichage.handle');
Route::get('/logout', [logicontroller::class, 'logout'])->name('logout');
Route::get('/nouveau', [logicontroller::class, 'showForm'])->name('nouveau');
Route::post('/nouveau', [logicontroller::class, 'handleForm'])->name('etudiant.handle');
Route::get('/login', function() {
    return view('login');
})->name('login');
