<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\KerjaController;
use App\Http\Controllers\KontakController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/profil', ProfilController::class)->except(['create', 'edit']);
Route::resource('/pendidikan', PendidikanController::class)->except(['create', 'edit']);
Route::resource('/kerja', KerjaController::class)->except(['create', 'edit']);
Route::resource('/kontak', KontakController::class)->except(['create', 'edit']);
