<?php

use App\Http\Controllers\Admin\CidadeController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'admin/cidades', 302);

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::prefix('cidades')
            ->name('cidades.')
            ->group(function () {
                Route::get('/', [CidadeController::class, 'index'])->name(
                    'index'
                );
                Route::get('/adicionar', [
                    CidadeController::class,
                    'create',
                ])->name('create');
                Route::post('/adicionar', [
                    CidadeController::class,
                    'store',
                ])->name('store');
                Route::delete('/{id}', [
                    CidadeController::class,
                    'destroy',
                ])->name('destroy');
                Route::get('/{id}', [CidadeController::class, 'edit'])->name(
                    'edit'
                );
                Route::put('/{id}', [CidadeController::class, 'update'])->name(
                    'update'
                );
            });
    });
