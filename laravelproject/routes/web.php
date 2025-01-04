<?php

use App\Http\Controllers\logicontroller;
use Illuminate\Support\Facades\Route;

Route::get('index', [logicontroller::class, 'showLoginForm'])->name('login');
Route::post('index', [logicontroller::class, 'login']);
Route::get('login', function() {
    return view('login'); // Assurez-vous d'avoir une vue 'index.blade.php'
})->name('login');


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('index', 'app\Http\Controllers\Controller@fun');
    // return fun;