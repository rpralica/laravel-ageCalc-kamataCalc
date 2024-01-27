<?php

use App\Http\Controllers\CalculatorsController;
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

Route::get('/', [CalculatorsController::class,'home'])->name('calc.home');
Route::post('/age', [CalculatorsController::class,'calculateAge'])->name('calc.calculateAge');
Route::post('/kamata', [CalculatorsController::class,'kamata'])->name('calc.kamata');
