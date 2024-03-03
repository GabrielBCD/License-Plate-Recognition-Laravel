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

use App\Http\Controllers\ViewsController;
use App\Http\Controllers\PredictionsController;
use App\Http\Controllers\LoginController;

Route::get('/', [ViewsController::class, 'index']);
Route::get('/login', [ViewsController::class, 'login']);
Route::get('/register', [ViewsController::class, 'register']);
Route::get('/predictions', [PredictionsController::class, 'predictions']);
Route::get('/predictions/search', [PredictionsController::class, 'search']);
Route::put('/predictions/{id}/update', [PredictionsController::class, 'update']);

