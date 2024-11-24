<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReviewController;

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

Route::get('/', [DashboardController::class, 'home']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/welcome', [AuthController::class, 'welcome']);
Route::get('/table', [DashboardController::class, 'table']);
Route::get('/data-tables', [DashboardController::class, 'dataTable']);

Route::middleware('auth')->group(function () {
    Route::resource('genres', GenreController::class);
    Route::post('/review/{films_id}', [ReviewController::class, 'store']);
});

// CRUD
// C => Create Data
Route::get('/cast/create', [CastController::class, 'create']);
// Input ke DB
Route::post('/cast', [CastController::class, 'store']);

// R => Read Data
Route::get('/cast', [CastController::class, 'index']);
Route::get('/cast/{cast_id}', [CastController::class, 'show']);

// U => Update Data
Route::get('/cast/{cast_id}/edit', [CastController::class, 'edit']);
Route::put('/cast/{cast_id}', [CastController::class, 'update']);

// D => Delete Data
Route::delete('/cast/{cast_id}', [CastController::class, 'destroy']);

//CRUD
Route::resource('films', FilmController::class);

Auth::routes();
