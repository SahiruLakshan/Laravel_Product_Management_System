<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::middleware(['auth'])->group(function(){
    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/insert', [ProductController::class, 'insert']);
    Route::get('/', [ProductController::class, 'view']);
    Route::get('/update/{id}', [ProductController::class, 'update']);
    Route::put('/edit/{id}', [ProductController::class, 'edit']);
    Route::get('/delete/{id}', [ProductController::class, 'delete']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
