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

Route::prefix('admin')->group(function () {
    Route::prefix('cidades')->group(function () {
        Route::get('/', [CidadeController::class, 'index']);
        Route::get('/adicionar', [CidadeController::class, 'create']);
    });
});
