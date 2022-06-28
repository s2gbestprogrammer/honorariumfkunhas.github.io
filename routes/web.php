<?php

use App\Http\Controllers\AdminFeedbackController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HonorController;
use App\Http\Controllers\ImportDataDosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Division;
use App\Models\Feedback;
use App\Models\Honor;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

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



if(auth()->user() == null)
{
    return view('login');

} else if(auth()->user()->role == 'dosen') {
    return redirect('/dashboard/dosen');
} else if(auth()->user()->role == 'admin') {
   return redirect('/dashboard/admin');
} else {
    return view('login');
}


});



Route::get('/name', function () {
    $nama_lengkap = "Dr. Surya Wana b,akti as, askodaskodkaso , alspdlasp";
    $nama_lengkap =  Str::lower($nama_lengkap); 
    $nama_lengkap = str_replace('dr.', '', $nama_lengkap);
    $nama_lengkap = str_replace(' ', '', $nama_lengkap);

    $nama_lengkap = substr($nama_lengkap, 0, strpos($nama_lengkap, ','));

    $numbers = rand(1 , 999);

    return $username = $nama_lengkap . $numbers;

});

Route::get('/dashboard/admin', function () {

    $user_count = User::where('role', 'dosen')->count();

    $honordb_date = Honor::all();
    $date_now = now()->format('M/Y');

    $array = array();
    foreach( $honordb_date as $honordb) {
     $bulantahun = $honordb->created_at->format('M/Y');

     if($bulantahun == $date_now)
     {
         $array[] = $honordb->created_at->format('M/Y');
     }

    }



    return view('dashboard.admin.index', [
        "title" => "Dashboard | Admin",
        "users" => User::all(),
        "honor_bulan" => count($array),
        "not_honor_bulan" => $user_count - count($array),
        "jumlah_dosen" => User::where('role', 'dosen')->count(),

        "jumlah_honor_keseluruhan" => Honor::all()->sum('jumlah_bersih')
    ]);
})->middleware('auth')->name('dashboard.admin');

Route::get('/dashboard/dosen', function () {

    return view('dashboard.dosen.index', [
        "title" => "Dashboard | Dosen",
        "users" => User::where('id', auth()->user()->id)->get(),
        "sum_honor" => Honor::where('user_id', auth()->user()->id)->sum('jumlah_bersih'),
        "feedback" => Feedback::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get(),
        "honor" => Honor::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->first(),
    ]);
})->middleware('auth')->name('dashboard.dosen');

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate')->middleware('guest');

// sesuatu salah krna pke get
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/changepassword', function (Request $request) {
    $validateData = $request->validate([
        'password' => 'required',
    ]);
    $validateData['password'] = Hash::make($validateData['password']);

    if($request->confirm_password == $request->password){

        User::where('id', auth()->user()->id)->update($validateData);
        return back()->with('success', 'berhasil mengganti password');
    } else {
        return back()->with('fail', 'gagal mengganti password');
    }

})->name('change.passwords');

// ADMIN //
Route::middleware('isAdmin')->group(function() {

    Route::resource('/dashboard/admin/users', UserController::class);

    Route::resource('/dashboard/admin/profile', ProfileController::class);

    Route::resource('/dashboard/admin/divisions', DivisionController::class);

    Route::resource('/dashboard/admin/adminfeedback', AdminFeedbackController::class);

    Route::resource('/dashboard/admin/categories', CategoryController::class);

    Route::resource('/dashboard/admin/honor', HonorController::class);

    Route::get('/getUserForHonor/{id}', [HonorController::class, 'showUserDetail']);

    Route::post('importdatadosen', [ImportDataDosenController::class, 'importdatadosen'])->name('importdatadosen');

    Route::get('exportdatadosen', [ImportDataDosenController::class, 'exportdatadosen'])->name('exportdatadosen');

    Route::post('getDetailHonor', [HonorController::class, 'show'])->name('get.detail.honor');

    Route::post('dashboard/admin/editdivision', function(Request $request){
        $validateData = $request->validate([
            'name' => 'required'
        ]);
        Division::where('id', $request->id)->update($validateData);
        return back()->with('success' , 'berhasil mengubah divisi');
    })->name('edit.division');

    Route::post('/dashboard/admin/editcategories', function(Request $request){

        $validateData = $request->validate([
            'name' => 'required'
        ]);
        Category::where('id', $request->id)->update($validateData);
        return back()->with('success', 'berhasil mengubah data category');
    })->name('edit.category');

    Route::get('/printhonor', function(){

        return view('dashboard.admin.print.index', [
            'honors' => Honor::all()
        ]);
    })->name('print.honor');

    Route::post('/searchByDate', function(Request $request){

        $search = Honor::where('created_at', '>=',$request->from)->where('date', '<=',$request->to)->get();
        return view('dashboard.admin.print.print', [
            'search' => $search
        ]);
    })->name('print.searchByDate')->middleware('isAdmin');

});


//DOSEN
Route::resource('/dashboard/dosen/profile', ProfileController::class)->middleware('auth');

Route::get('/dashboard/dosen/honor/{user}', function(User $user){
    return view('dashboard.dosen.honor.index', [
        'users' => $user,
        'honors' => Honor::where('user_id' , $user->id)->orderBy('created_at', 'DESC')->get()
    ]);
})->name('dosen.honor.get');

Route::resource('/dashboard/dosen/feedback', FeedbackController::class)->middleware('auth');


