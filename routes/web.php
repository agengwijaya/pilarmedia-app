<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dropdown\DropdownController;
use App\Http\Controllers\OOP\OOPController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesPersonController;
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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'autenticate'])->name('login.auth')->middleware('guest');

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dropdown', [DropdownController::class, 'index'])->middleware('auth');
Route::get('/oop', [OOPController::class, 'index'])->middleware('auth');


Route::get('/product', [ProductController::class, 'index'])->middleware('auth');
Route::post('/product', [ProductController::class, 'simpan'])->middleware('auth');
Route::put('/product/{id}', [ProductController::class, 'update'])->middleware('auth');
Route::delete('/product/{id}', [ProductController::class, 'hapus'])->middleware('auth');

Route::get('/sales-person', [SalesPersonController::class, 'index'])->middleware('auth');
Route::post('/sales-person', [SalesPersonController::class, 'simpan'])->middleware('auth');
Route::put('/sales-person/{id}', [SalesPersonController::class, 'update'])->middleware('auth');
Route::delete('/sales-person/{id}', [SalesPersonController::class, 'hapus'])->middleware('auth');

Route::get('/sales', [SalesController::class, 'index'])->middleware('auth');
Route::post('/sales', [SalesController::class, 'simpan'])->middleware('auth');
Route::put('/sales/{id}', [SalesController::class, 'update'])->middleware('auth');
Route::delete('/sales/{id}', [SalesController::class, 'hapus'])->middleware('auth');