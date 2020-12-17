<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\UserIncidenciaController;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::resource('incidencias', IncidenciaController::class);

Route::resource('uincidencias', UserIncidenciaController::class);

Route::get('/authorized/google', [LoginController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [LoginController::class, 'handleGoogleCallback']);