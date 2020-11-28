<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FitnessPlanController;
use App\Http\Controllers\ExcerciseController;
use App\Http\Controllers\TagsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// fitplan --- NEED AUTH
Route::get('/fitnessplan', [FitnessPlanController::class, 'index'])->name('fitnessplan');
Route::get('/fitnessplan/create', [FitnessPlanController::class, 'create']);
Route::post('/fitnessplan/store', [FitnessPlanController::class, 'store']);
Route::get('/fitnessplan/{id}', [FitnessPlanController::class, 'show']);


// excercises --- NEED AUTH-ADMIN

Route::get('/excercise', [ExcerciseController::class, 'index'])->name('excercises');
Route::get('/excercise/create', [ExcerciseController::class, 'create']);
Route::post('/excercise/store', [ExcerciseController::class, 'store']);


// tags --- NEED AUTH-ADMIN
Route::get('/tag', [TagsController::class, 'index'])->name('tags');
Route::get('/tag/create', [TagsController::class, 'create']);
Route::post('/tag/store',  [TagsController::class, 'store']);