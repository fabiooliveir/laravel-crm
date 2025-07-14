<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

/**
 * Rota para a página inicial.
 * * Esta rota exibe a página de boas-vindas que criamos, em vez de
 * redirecionar para a tela de login.
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

