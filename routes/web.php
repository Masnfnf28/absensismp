<?php

use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\DatasiswaController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\ProfileController;
use App\Models\Datasiswa;
use App\Models\MataPelajaran;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('datasiswa', DatasiswaController::class)->middleware('auth');
Route::resource('dataguru', DataGuruController::class)->middleware('auth');
Route::resource('matapelajaran', MataPelajaranController::class)->middleware('auth');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
