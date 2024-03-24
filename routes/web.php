<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredictionsController;

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




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //Auth User
    Route::get('/', [PredictionsController::class, 'predictions'])->name('dashboard');
    Route::get('/dashboard', [PredictionsController::class, 'predictions'])->name('dashboard');
    Route::post('/dashboard/search', [PredictionsController::class, 'search'])->name('search');
    Route::put('/dashboard/update/{id}', [PredictionsController::class, 'update']);

    //Auth Admin
    Route::get('/log', function () {return view('log');})->name('log');
    Route::get('/users', [AdminController::class, 'index'])->name('users');
    Route::post('/users/create', [UserController::class, 'store'])->name('create-user');
    Route::post('/users/delete/{id}', [UserController::class, 'destroy'])->name('create-user');

    //Não utilizada
    Route::get('/register', function () {return view('auth/register');})->name('register');

});
