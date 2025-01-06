<?php

use App\Http\Controllers\logicontroller;
use Illuminate\Support\Facades\Route;

Route::get('index', [logicontroller::class, 'showLoginForm'])->name('index');
Route::post('index', [logicontroller::class, 'login'])->name('login');
Route::get('/logout', [logicontroller::class, 'logout'])->name('logout');
Route::get('/affichage', [Logicontroller::class, 'showAffichage'])->name('affichage');
Route::get('/login', function() {
    return view('login'); // Assurez-vous d'avoir une vue 'index.blade.php'
})->name('login');


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('index', 'app\Http\Controllers\Controller@fun');
    // return fun;