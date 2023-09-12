<?php

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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'view'])->name('home');

Route::view('/busqueda',
    'search-page'
)->name('search');

Route::get(
    '/{modality}',
    [App\Http\Controllers\ModalityController::class, 'view']
)->name('modality');

Route::get(
    '/{year}/{modality}/{group}',
    [App\Http\Controllers\GroupActingController::class, 'view']
)->name('group');

Route::get(
    '/{year}/{modality}/{group}/{phase}',
    [App\Http\Controllers\GroupActingController::class, 'view']
)->name('group-acting');
