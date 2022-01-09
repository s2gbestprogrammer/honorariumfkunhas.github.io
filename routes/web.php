<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HonorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Honor;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    if(isset(auth()->user()->role)){
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'super-admin') {

            return view('dashboard.admin.index');
        } else if(auth()->user()->role == 'dosen') {
            return view('dashboard.dosen.index');
        }
    }

return view('login');
// if(auth()->user()->role == "dosen")
// {
//     return view('dashboard.dosen.index');
// } else if(auth()->user()->role == "admin" || auth()->user()->role == "super-admin") {
//     return view('dashboard.admin.index');
// } else {
//     return view('login');
// }


});

Route::get('/dashboard/admin', function () {

    return view('dashboard.admin.index', [
        "title" => "Dashboard | Admin",
        "users" => User::all(),
    ]);
})->middleware('auth')->name('dashboard.admin');

Route::get('/dashboard/dosen', function () {

    return view('dashboard.dosen.index', [
        "title" => "Dashboard | Dosen",
        "users" => User::where('id', auth()->user()->id)->get(),
        "honor" => Honor::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->first(),
    ]);
})->middleware('auth')->name('dashboard.dosen');

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate')->middleware('guest');

// sesuatu salah krna pke get
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// ADMIN //
Route::post('getDetailHonor', [HonorController::class, 'show'])->name('get.detail.honor');


Route::put('/password/{user}', function (Request $request, User $user) {
    $validateData = $request->validate([
        'password' => 'required',
    ]);
    $validateData['password'] = Hash::make($validateData['password']);
    User::where('id', auth()->user()->id)->update($validateData);

    return back()->with('success', 'berhasil mengupdate profile');
})->name('change.password');
Route::resource('/dashboard/admin/users', UserController::class)->middleware('isAdmin');
Route::resource('/dashboard/admin/profile', ProfileController::class)->middleware('isAdmin');
Route::resource('/dashboard/admin/divisions', DivisionController::class)->middleware('isAdmin');
Route::resource('/dashboard/admin/categories', CategoryController::class)->middleware('isAdmin');
Route::resource('/dashboard/admin/honor', HonorController::class)->middleware('isAdmin');


//DOSEN
Route::resource('/dashboard/dosen/profile', ProfileController::class)->middleware('auth');

Route::resource('/dashboard/dosen/feedback', FeedbackController::class)->middleware('auth');
