<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\TipeKamarController;
use App\Http\Controllers\GuestBookingController;
use App\Http\Controllers\FasilitasUmumController;
use App\Http\Controllers\FasilitasKamarController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(WelcomeController::class)->group(function(){
// halaman utama
Route::get('/','welcome');
// login khusus admin
Route::get('admin.login','loginadmin')->middleware('guest');
// login khusus resepsionis
Route::get('resepsionis.login','loginresepsionis')->middleware('guest');
Route::get('tamu/detailroom/{id}','detailroom');
Route::post('/welcome/addorder','addorder');
Route::delete('/welcome/removeorder/{id}','removeorder');
Route::get('/tamu/buktibooking','buktibooking');
Route::post('/tamu/insertbooking','insertbooking');
Route::get('/tamu/laporanbooking/{id}','kamarpdf');
Route::get('/resepsionis.datatamu','datatamu');
Route::get('/resepsionis.cancel','cancel');
Route::put('/welcome/datatamu/update/{id}','tambahpembayaran');
Route::get('/resepsionis.pembayaran','pembayaran');
// mengubah pembayaran tamu
Route::put('resepsionis.payment/{id}','updatepayment');
// pdf data tamu yang order
Route::get('/resepsionis/pdfdatatamu','cetakpdfresepsionis');
// pdf data tamu yang batal
Route::get('/resepsionis/pdfcancel','cetakcancel');
// cancel payment
Route::delete('/resepsionis/cancelpayment/{id}','cancelpayment');
// data tamu tanpa akun 
Route::get('/resepsionis.guestorder','guestorder');
// halaman mengubah status kamar
Route::get('/resepsionis.changestatus','changestatus');
// melakukan proses mengubah status kamar
Route::patch('/resepsionis/changesroom/{id}','changesroom');
// ubah password 
Route::get('/auth.passwords.change-password','ubahpassword')->middleware('auth');
Route::post('/update/password','changepassword')->middleware('auth');
});

Auth::routes(['verify' => true]);
Route::controller(HomeController::class)->group(function(){
Route::get('admin.admin','index')->name('admin')->middleware('checkRole:admin');
Route::get('resepsionis.resepsionis','index')->name('resepsionis')->middleware('checkRole:resepsionis');
Route::get('tamu.home', 'index')->name('home')->middleware(['auth', 'verified', 'checkRole:tamu']);
});

// Tampilkan halaman notice
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

// Proses verifikasi dari link email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

// redirect setelah verifikasi berhasil
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Kirim ulang link verifikasi
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Link verifikasi telah dikirim ulang!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware('auth','checkRole:admin')->group(function(){
Route::controller(UserController::class)->group(function(){
    Route::get('/user','index');
    Route::get('/user.create','create');
    Route::post('/user.store','store');
    Route::get('/user.edit/edit/{id}','edit');
    Route::put('/user.update/update/{id}','update');
    Route::delete('/user.destroy/destroy/{id}','destroy');
});
});

Route::middleware('auth','checkRole:admin')->group(function(){
Route::controller(KamarController::class)->group(function(){
    Route::get('kamar.index','index');
    Route::get('kamar.create','create');
    Route::post('kamar.store','store');
    Route::get('kamar.edit/{id}','edit');
    Route::put('kamar.update/{id}','update');
    Route::delete('kamar.destroy/{id}','destroy');
});
});

Route::middleware('auth','checkRole:admin')->group(function(){
Route::resource('tipe_kamars',TipeKamarController::class);
});

Route::middleware('auth','checkRole:admin')->group(function(){
Route::controller(FasilitasUmumController::class)->group(function(){
Route::get('fasilitasumum','index');
Route::get('fasilitasumum/create','create');
Route::post('fasilitasumum/store','store');
Route::get('fasilitasumum/edit/{fasilitasUmum}','edit');
Route::put('fasilitasumum/update/{fasilitasUmum}','update');
Route::delete('fasilitasumum/destroy/{fasilitasUmum}','destroy');
});
});

Route::middleware('auth','checkRole:admin')->group(function(){
Route::controller(SaranController::class)->group(function(){
    Route::get('saran','index');
    // Route::post('saran/store','store');
    Route::delete('saran/delete/{id}','delete');
});
});
Route::post('saran/store',[SaranController::class,'store']);

Route::middleware('auth','checkRole:admin')->group(function(){
Route::controller(FasilitasController::class)->group(function(){
    Route::get('fasilitas','index');
    Route::get('fasilitas/create','create');
    Route::post('fasilitas/store','store');
    Route::get('fasilitas/edit/{id}','edit');
    Route::put('fasilitas/update/{id}','update');
    Route::delete('fasilitas/delete/{id}','destroy');
});
});

Route::middleware('auth','checkRole:admin')->group(function(){
Route::controller(FasilitasKamarController::class)->group(function(){
Route::get('fasilitas_kamars','index');
// Route::get('fasilitas_kamars/create','create');
// Route::post('fasilitas_kamars/store','store');
});
});

// controller khusus untuk guest / user yang tidak mempunyai akun
Route::controller(GuestBookingController::class)->group(function () {
    Route::get('/guestorder', 'index')->middleware('guest');
    Route::post('/guest/store','store')->middleware('guest');
    Route::get('/guest/pdf/{id}','cetak_pdf')->middleware('guest');
});

Route::controller(QRCodeController::class)->group(function(){
    Route::get('/qrcode','index');
});
Route::get('/laporanbooking/{id}', [BookingController::class, 'laporan'])->name('laporanbooking');