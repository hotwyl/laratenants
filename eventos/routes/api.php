<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware'=>['auth:sanctum']], function (){

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('evento')->group(function() {
        Route::get('/', [EventoController::class, 'index'])->name('evento.index');
        Route::post('/', [EventoController::class, 'store'])->name('evento.store');
        Route::post('/search', [EventoController::class, 'search'])->name('evento.search');
        Route::get('/{cod}', [EventoController::class, 'show'])->name('evento.show');
        Route::put('/{cod}', [EventoController::class, 'update'])->name('evento.update');
        Route::delete('/{cod}', [EventoController::class, 'destroy'])->name('evento.destroy');
    });

});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
