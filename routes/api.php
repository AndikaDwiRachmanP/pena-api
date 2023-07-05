<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::get('/', [App\Http\Controllers\ClientsideController::class, 'show']);
// Route::get('about', [App\Http\Controllers\ClientsideController::class, 'about']);
// Route::get('clientside/detail/{data}', [App\Http\Controllers\ClientsideController::class, 'detail']);
// Route::get('clientside/list', [App\Http\Controllers\ClientsideController::class, 'index']);
// Route::get('clientside/list2', [App\Http\Controllers\ClientsideController::class, 'list2']);
// Route::get('/contact', [App\Http\Controllers\ClientsideController::class, 'contact']);
Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index']);
Route::post('/kategori', [App\Http\Controllers\KategoriController::class, 'store']);

Route::post('/user', [App\Http\Controllers\UserController::class, 'store']);


Route::get('/buku', [App\Http\Controllers\BukuController::class, 'index']);
Route::get('/admin', [App\Http\Controllers\BukuController::class, 'index']);
Route::post('/buku', [App\Http\Controllers\BukuController::class, 'store']);
Route::get('/buku/{id}', [App\Http\Controllers\BukuController::class, 'detail']);
Route::post('/buku/{id}', [App\Http\Controllers\BukuController::class, 'update']);
Route::delete('/buku/{id}', [App\Http\Controllers\BukuController::class, 'destroy']);

// Route::get('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
// Route::post('postlogin', [App\Http\Controllers\AuthController::class, 'postlogin']);
// Route::get('logout', [App\Http\Controllers\AuthController::class, 'logout']);


// Route::get('serverside/master', [App\Http\Controllers\BukuController::class, 'index']);
// Route::get('serverside/add', [App\Http\Controllers\BukuController::class, 'create']);
// Route::post('serverside/master', [App\Http\Controllers\BukuController::class, 'store']);
// Route::get('serverside/edit/{id_buku}', [App\Http\Controllers\BukuController::class, 'edit']);
// Route::put('serverside/edit/store/{id_buku}', [App\Http\Controllers\BukuController::class, 'update']);
// Route::delete('serverside/delete/{data}', [App\Http\Controllers\BukuController::class, 'delete']);

