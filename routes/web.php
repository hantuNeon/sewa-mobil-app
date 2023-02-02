<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MobilController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PesanController;

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

// Berikut adalah route yang ada pada halaman web sewaanku
// Ini  adalah route halaman home
Route::get('/', [HomeController::class, 'index'])->name('homepage');
// Ini adalah Route ke halaman detail
Route::get('detail/{mobil:slug}', [HomeController::class, 'detail'])->name('detail');
// Ini adalah route ke halaman contact
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
// Ini adalah route yang mengatur pesan pada halaman contact
Route::post('contact', [HomeController::class, 'contactStore'])->name('contact.store');


//Berikut adalah route yang ada pada halaman admin sewaanku
Route::group(['middleware' => 'is_admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    //Ini adalah route halaman dashboard admin
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    //Ini adalah route dari kumpulan halaman kelola data mobil mulai dari index, create, store, show, edit, update, dan destroy yang berada pada MobilController
    Route::resource('mobil', MobilController::class);
    //Ini adalah route untuk memanggil fungsi edit gambar yang terletak pada MobilController
    Route::put('mobil/update-image/{id}', [MobilController::class, 'updateImage'])->name('mobil.updateImage');
    //Ini adalah route untuk memanggil controller function index pada PesanController 
    Route::get('pesan', [PesanController::class, 'index'])->name('pesan.index');
    //Ini adalah route untuk memanggil controller function destroy pada PesanController 
    Route::delete('pesan,{pesan}', [PesanController::class, 'destroy'])->name('pesan.destroy');
});

//Berikut adalah route yang mengatur login (login yang digunakan berupa login yang menggunakan laravel UI bootstrap sumber : https://www.ostife.com/cara-membuat-halaman-login-dan-register-pada-laravel-9/)
Auth::routes(['register' => false]);
