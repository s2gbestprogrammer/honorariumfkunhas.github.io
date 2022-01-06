<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
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



Route::get('/', function () {
    return view('login');
})->middleware('guest');

Route::get('/dashboard/admin', function () {

    return view('dashboard.admin.index', [
        "title" => "Dashboard",
        "users" => User::all(),
    ]);
})->middleware('auth');

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ADMIN //
Route::resource('/dashboard/admin/users', UserController::class)->middleware('auth');
Route::resource('/dashboard/admin/profile', ProfileController::class)->middleware('auth');
Route::resource('/dashboard/admin/divisions', DivisionController::class)->middleware('auth');
