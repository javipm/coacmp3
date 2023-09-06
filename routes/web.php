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

Route::view('/', 'welcome');

Route::get(
    '/comparsas',
    [App\Http\Controllers\ModalityController::class, 'comparsas']
)->name('modality-comparsas');

Route::get(
    '/chirigotas',
    [App\Http\Controllers\ModalityController::class, 'chirigotas']
)->name('modality-chirigotas');

Route::get(
    '/coros',
    [App\Http\Controllers\ModalityController::class, 'coros']
)->name('modality-coros');

Route::get(
    '/cuartetos',
    [App\Http\Controllers\ModalityController::class, 'cuartetos']
)->name('modality-cuartetos');

Route::get(
    '/{group}/{phase}',
    [App\Http\Controllers\GroupActingController::class, 'view']
)->name('group-acting');

Route::get(
    '/{group}',
    [App\Http\Controllers\GroupActingController::class, 'view']
)->name('group');
