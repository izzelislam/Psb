<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DataPendaftarController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\TahunAjaranController;
use App\Http\Controllers\Admin\StatusPendaftarController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\Ujian\Biodata1Controller;
use App\Http\Controllers\Ujian\Biodata2Controller;
use App\Http\Controllers\Ujian\TesIqController;
use App\Http\Controllers\Ujian\VideoController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Admin\QnaController;
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

//halaman depan 
Route::group(['prefix' => ''],function () {
    Route::get('/',[FrontpageController::class,'index'])->name('front-page');
    Route::get('/question-and-answer',[FrontpageController::class,'qna'])->name('qna');
    Route::get('/jadwal',[FrontpageController::class,'jadwal'])->name('jadwal');
});

// dashboard user
Route::group(['prefix' => 'user'],function () {
    Route::get('/',[UserDashboardController::class,'index'])->name('dashboard-user');
    Route::get('/tes-proses',[UserDashboardController::class,'tes_proses'])->name('dashboard-tes-proses');
    Route::get('/pesan',[ChatController::class,'index'])->name('dashboard-pesan');
});

// proses seleksi
Route::group(['prefix' => 'tes'], function () {
    Route::get('/tahap-pertama',[Biodata1Controller::class,'index'])->name('tahap-pertama');
    Route::post('/tahap-pertama',[Biodata1Controller::class,'store'])->name('tahap-pertama-store');
    Route::get('/tahap-kedua',[Biodata2Controller::class,'index'])->name('tahap-kedua');
    Route::post('/tahap-kedua',[Biodata2Controller::class,'store'])->name('tahap-kedua-store');
    Route::get('/tahap-ketiga/tes-iq',[TesIqController::class,'iq'])->name('tahap-ketiga-iq');
    Route::get('/tahap-ketiga/tes-kepribadian',[TesIqController::class,'kepribadian'])->name('tahap-ketiga-kepribadian');
    Route::get('/tahap-keempat/link-video',[VideoController::class,'video'])->name('tahap-empat-video');
    Route::get('/tahap-kelima/wawancara',[VideoController::class,'wawancara'])->name('tahap-lima-wawancara');
});

// feedback
Route::get('/success',[FeedbackController::class,'sukses'])->name('sukses');

// auth
Route::group(['prefix' => ''], function () {
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login-proses',[AuthController::class,'loginProses'])->name('login-proses');
    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/register-proses',[AuthController::class,'registerProses'])->name('register-proses');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});

// dashboard admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/',[AdminDashboardController::class,'index'])->name('dashboard');
    Route::get('/data-pendaftar',[DataPendaftarController::class,'index'])->name('data-pendaftar');
    Route::get('/data-pendaftar/export',[DataPendaftarController::class,'export'])->name('pendaftar-export');
    Route::post('/data-pendaftar/delete/{id}',[DataPendaftarController::class,'destroy'])->name('pendaftar-hapus');
    Route::resource('/tahun-ajaran', TahunAjaranController::class);
    Route::post('/tahun-ajaran/aktif/{id}',[TahunAjaranController::class,'aktif'])->name('tahun-ajaran.aktif');
    Route::post('/tahun-ajaran/nonaktif/{id}',[TahunAjaranController::class,'nonaktif'])->name('tahun-ajaran.nonaktif');
    Route::resource('/qna', QnaController::class);
    Route::resource('/jadwal', JadwalController::class);
    Route::get('/status-pendaftar',[StatusPendaftarController::class,'index'])->name('status-pendaftar');
    Route::post('/status-pendaftarlolos/{id}',[StatusPendaftarController::class,'lolos'])->name('status-pendaftar.lolos');
    Route::post('/status-pendaftartidak/{id}',[StatusPendaftarController::class,'tidak'])->name('status-pendaftar.tidak');
    Route::post('/status-pendaftar/bulk-action',[StatusPendaftarController::class,'lolosall'])->name('bulk-action');
    Route::post('/status-tidaklolos',[StatusPendaftarController::class,'tidaklolos'])->name('tidak-lolos');
    Route::post('/status-hapusall',[StatusPendaftarController::class,'hapusall'])->name('hapusall');
    Route::get('/status-pendaftar/{id}',[StatusPendaftarController::class,'show'])->name('status-pendaftar.show');
});

