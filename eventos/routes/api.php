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
    Route::get('/event', [EventoController::class, 'index'])->name('event.index');
    Route::post('/event', [EventoController::class, 'store'])->name('event.store');
    Route::post('/event/search', [EventoController::class, 'search'])->name('event.search');
    Route::get('/event/{cod}', [EventoController::class, 'show'])->name('event.show');
    Route::put('/event/{cod}', [EventoController::class, 'update'])->name('event.update');
    Route::delete('/event/{cod}', [EventoController::class, 'destroy'])->name('event.destroy');
});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
