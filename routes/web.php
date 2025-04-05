<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacjentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LekarzController;
use App\Http\Controllers\AptekaController;
use App\Http\Controllers\LekarstwoController;
use App\Http\Controllers\ChorobaController;
use App\Http\Controllers\WizytaController;
use App\Http\Controllers\HistoriaWizytWidokController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/main', function () {
    return view('main');
})->name('main');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/pacjenci', [PacjentController::class, 'index'])->name('pacjenci.index');
Route::get('/pacjenci/{id}/edit', [PacjentController::class, 'edit'])->name('pacjenci.edit');
Route::put('/pacjenci/{id}', [PacjentController::class, 'update'])->name('pacjenci.update');
Route::delete('/pacjenci/{id}', [PacjentController::class, 'destroy'])->name('pacjenci.destroy');
Route::get('/pacjenci/{id}', [PacjentController::class, 'show'])->name('pacjenci.show');


Route::get('/lekarze', [LekarzController::class, 'index'])->name('lekarze.index');
Route::get('/lekarze/create', [LekarzController::class, 'create'])->name('lekarze.create');
Route::post('/lekarze', [LekarzController::class, 'store'])->name('lekarze.store');
Route::get('/lekarze/{id}/edit', [LekarzController::class, 'edit'])->name('lekarze.edit');
Route::put('/lekarze/{id}', [LekarzController::class, 'update'])->name('lekarze.update');
Route::delete('/lekarze/{id}', [LekarzController::class, 'destroy'])->name('lekarze.destroy');

Route::get('/apteki', [AptekaController::class, 'index'])->name('apteki.index');
Route::get('/apteki/create', [AptekaController::class, 'create'])->name('apteki.create');
Route::post('/apteki', [AptekaController::class, 'store'])->name('apteki.store');
Route::get('/apteki/{id}/edit', [AptekaController::class, 'edit'])->name('apteki.edit');
Route::put('/apteki/{id}', [AptekaController::class, 'update'])->name('apteki.update');
Route::delete('/apteki/{id}', [AptekaController::class, 'destroy'])->name('apteki.destroy');

Route::get('/choroby', [ChorobaController::class, 'index'])->name('choroby.index');
Route::get('/choroby/create', [ChorobaController::class, 'create'])->name('choroby.create');
Route::post('/choroby', [ChorobaController::class, 'store'])->name('choroby.store');
Route::get('/choroby/{id}/edit', [ChorobaController::class, 'edit'])->name('choroby.edit');
Route::put('/choroby/{id}', [ChorobaController::class, 'update'])->name('choroby.update');
Route::delete('/choroby/{id}', [ChorobaController::class, 'destroy'])->name('choroby.destroy');


Route::get('/lekarstwa', [LekarstwoController::class, 'index'])->name('lekarstwa.index');
Route::get('/lekarstwa/create', [LekarstwoController::class, 'create'])->name('lekarstwa.create');
Route::post('/lekarstwa', [LekarstwoController::class, 'store'])->name('lekarstwa.store');
Route::get('/lekarstwa/{id}/edit', [LekarstwoController::class, 'edit'])->name('lekarstwa.edit');
Route::put('/lekarstwa/{id}', [LekarstwoController::class, 'update'])->name('lekarstwa.update');
Route::delete('/lekarstwa/{id}', [LekarstwoController::class, 'destroy'])->name('lekarstwa.destroy');


Route::get('/wizyty', [WizytaController::class, 'index'])->name('wizyty.index');
Route::get('/wizyty/create', [WizytaController::class, 'create'])->name('wizyty.create');
Route::post('/wizyty', [WizytaController::class, 'store'])->name('wizyty.store');
Route::get('/wizyty/{id}/edit', [WizytaController::class, 'edit'])->name('wizyty.edit');
Route::put('/wizyty/{id}', [WizytaController::class, 'update'])->name('wizyty.update');
Route::delete('/wizyty/{id}', [WizytaController::class, 'destroy'])->name('wizyty.destroy');

Route::get('/historia', [HistoriaWizytWidokController::class, 'index'])->name('historia.index');
Route::get('/lekarze/show/{id}', [LekarzController::class, 'showPatientCount'])->name('lekarze.show');
Route::get('/wizyty/{id}', [WizytaController::class, 'show'])->name('wizyty.show');
Route::get('/lekarze/{id}/visits', [LekarzController::class, 'getVisitsForDay'])->name('lekarze.visits_for_day');
