<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!\
|
*/

use App\Http\Controllers\PredictionsController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [PredictionsController::class, 'predictions'])->name('dashboard');
    Route::get('/register', function () {return view('auth/register');})->name('register');
    Route::get('/dashboard', [PredictionsController::class, 'predictions'])->name('dashboard');
    Route::get('/log', function () {return view('log');})->name('log');
    Route::get('/dashboard/search', [PredictionsController::class, 'search'])->name('search');
    Route::put('/dashboard/update/{id}', [PredictionsController::class, 'update']);





});
