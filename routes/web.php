<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DataPendaftarController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\LolosController;
use App\Http\Controllers\Admin\NilaiController;
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
use App\Http\Controllers\Admin\SoalTesIqController;
use App\Http\Controllers\Admin\SoalTesKepribadianController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\Admin\WawancaraController;
use GuzzleHttp\Middleware;
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
Route::group(['prefix' => '','middleware'=>['guest']],function () {
    Route::get('/',[FrontpageController::class,'index'])->name('front-page');
    Route::get('/question-and-answer',[FrontpageController::class,'qna'])->name('qna');
    Route::get('/informasi',[FrontpageController::class,'informasi'])->name('informasi');
});

// dashboard user
Route::group(['prefix' => 'user','middleware'=>['auth','pendaftar']],function () {
    Route::get('/',[UserDashboardController::class,'index'])->name('dashboard-user');
    Route::get('/profile-user',[UserDashboardController::class,'profiluser'])->name('dashboard-profile-user');
    Route::get('/pesan',[ChatController::class,'index'])->name('dashboard-pesan');
    Route::post('/pesan',[ChatController::class,'chatstore'])->name('chat-user.store');
    Route::put('/update/no-wa/{id}',[Biodata1Controller::class,'updatenowa'])->name('no_wa.edit');
    Route::get('/question-and-answer',[UserDashboardController::class,'qna'])->name('qna-user');
    Route::get('/informasi',[UserDashboardController::class,'informasi'])->name('informasi-user');
});

// proses seleksi
Route::group(['prefix' => 'tes','middleware'=>['auth','pendaftar']], function () {
    Route::get('/tahap-pertama',[Biodata1Controller::class,'index'])->name('tahap-pertama');
    Route::post('/tahap-pertama',[Biodata1Controller::class,'store'])->name('tahap-pertama-store');
    Route::get('/tahap-kedua',[Biodata2Controller::class,'index'])->name('tahap-kedua');
    Route::post('/tahap-kedua',[Biodata2Controller::class,'store'])->name('tahap-kedua-store');
    Route::get('/tahap-ketiga/tes-iq',[TesIqController::class,'iq'])->name('tahap-ketiga-iq');
    Route::post('/tahap-ketiga/tes-iq',[TesIqController::class,'iqstore'])->name('iq-store');
    Route::get('/tahap-ketiga/tes-kepribadian',[TesIqController::class,'kepribadian'])->name('tahap-ketiga-kepribadian');
    Route::post('/tahap-ketiga/tes-kepribadian',[TesIqController::class,'kepribadianstore'])->name('kepribadian-store');
    Route::get('/tahap-keempat/link-video',[VideoController::class,'video'])->name('tahap-empat-video');
    Route::post('/tahap-keempat/link-video',[VideoController::class,'videostore'])->name('tahap-empat-video.store');
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

// halaman admin
Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    // dashboard
    Route::get('/',[AdminDashboardController::class,'index'])->name('dashboard');
    
    // data pendaftar
    Route::get('/data-pendaftar',[DataPendaftarController::class,'index'])->name('data-pendaftar');
    Route::get('/data-pendaftar/export',[DataPendaftarController::class,'export'])->name('pendaftar-export');
    Route::post('/data-pendaftar/delete/{id}',[DataPendaftarController::class,'destroy'])->name('pendaftar-hapus');
    Route::post('/data-pendaftar/deleteall',[DataPendaftarController::class,'deleteall'])->name('pendaftar-hapus.all');
    Route::get('/reset-filter-thap1',[DataPendaftarController::class,'resetfilter'])->name('reset-tahap1');
    
    // tahun ajaran
    Route::resource('/tahun-ajaran', TahunAjaranController::class);
    Route::post('/tahun-ajaran/aktif/{id}',[TahunAjaranController::class,'aktif'])->name('tahun-ajaran.aktif');
    Route::post('/tahun-ajaran/nonaktif/{id}',[TahunAjaranController::class,'nonaktif'])->name('tahun-ajaran.nonaktif');
    Route::post('/tahun-ajaran-hapus-all',[TahunAjaranController::class,'hapusall'])->name('tahun-ajaran.hapus-all');
    Route::post('tahun-ajaran-hapus/{id}',[TahunAjaranController::class,'destroy'])->name('tahun-ajaran.hapus');
    Route::post('tahun-ajaran-aktif-all',[TahunAjaranController::class,'aktifall'])->name('tahun-ajaran.aktif-all');
    Route::post('tahun-ajaran-nonaktif-all',[TahunAjaranController::class,'nonaktifall'])->name('tahun-ajaran.nonaktif-all');
    
    // qna
    Route::resource('/qna', QnaController::class);
    Route::post('/qna-hapus-all',[QnaController::class,'hapusall'])->name('qna-hapus-all');
    Route::post('/qna-hapus/{id}',[QnaController::class,'destroy'])->name('qna.delete');
    
    // jadwal
    Route::resource('/jadwal', JadwalController::class);
    Route::post('/jadwal-hapus-all',[JadwalController::class,'hapusall'])->name('jadwal-hapus.all');
    Route::post('/jadwal-hapus/{id}',[JadwalController::class,'destroy'])->name('jadwal.hapus');

    // status pendaftar
    Route::get('/status-pendaftar',[StatusPendaftarController::class,'index'])->name('status-pendaftar');
    Route::post('/status-pendaftarlolos/{id}',[StatusPendaftarController::class,'lolos'])->name('status-pendaftar.lolos');
    Route::PUT('/status-pendaftar/update/{id}',[StatusPendaftarController::class,'update'])->name('status-pendaftar.update');
    Route::post('/status-pendaftartidak/{id}',[StatusPendaftarController::class,'tidak'])->name('status-pendaftar.tidak');
    Route::post('/status-pendaftar/bulk-action',[StatusPendaftarController::class,'lolosall'])->name('bulk-action');
    Route::post('/status-tidaklolos',[StatusPendaftarController::class,'tidaklolos'])->name('tidak-lolos');
    Route::post('/status-hapusall',[StatusPendaftarController::class,'hapusall'])->name('hapusall');
    Route::get('/status-pendaftar/{id}',[StatusPendaftarController::class,'show'])->name('status-pendaftar.show');
    Route::get('/status-pendaftar/edit/{id}',[StatusPendaftarController::class,'edit'])->name('status-pendaftar.edit');
    Route::get('/filter-reset-tahatap-dua',[StatusPendaftarController::class,'filterreset'])->name('filter-reset-tahap2');
    Route::get('/biodata-export',[StatusPendaftarController::class,'biodataexport'])->name('biodata-export');
    
    // nilai
    Route::get('/nilai',[NilaiController::class,'index'])->name('nilai.index');
    Route::post('/nilai-lolos/{id}',[NilaiController::class,'nilailolos'])->name('nilai.lolos');
    Route::post('/nilai-tidak-lolos/{id}',[NilaiController::class,'nilaitidaklolos'])->name('nilai-tidak.lolos');
    Route::post('/nilai-hapus/{id}',[NilaiController::class,'nilaihapus'])->name('nilai.hapus');
    Route::post('/nilai-tidak-hapus-all',[NilaiController::class,'nilaihapusall'])->name('nilai-hapus.all');
    Route::post('/nilai-tidak-lolos-all',[NilaiController::class,'nilailolosall'])->name('nilai-lolos.all');
    Route::post('/nilai-tidak-tidak-lolos-all',[NilaiController::class,'nilaitidaklolosall'])->name('nilai-tidak-lolos.all');
    Route::get('/nilai-filter-reset',[NilaiController::class,'filterreset'])->name('nilai-filter.reset');

    // video
    Route::get('/video',[AdminVideoController::class,'index'])->name('video.index');
    Route::post('/video-hapus/{id}',[AdminVideoController::class,'hapus'])->name('video.hapus');
    Route::post('/video-lolos/{id}',[AdminVideoController::class,'lolos'])->name('video.lolos');
    Route::post('/video-tidak-lolos/{id}',[AdminVideoController::class,'tidaklolos'])->name('video-tidak.lolos');
    Route::post('/video-hapus-all',[AdminVideoController::class,'hapusall'])->name('video-hapus.all');
    Route::post('/video-lolos-all',[AdminVideoController::class,'lolosall'])->name('video-lolos.all');
    Route::post('/video-tidak-lolos-all',[AdminVideoController::class,'tidaklolosall'])->name('video-tidak-lolos.all');

    // tes iq
    Route::resource('/soal-tes-iq', SoalTesIqController::class);
    Route::post('/soal-tes-iq-hapus/{id}',[SoalTesIqController::class,'destroy'])->name('tes-iq.hapus');
    Route::post('/soal-tes-iq/hapus-all',[SoalTesIqController::class,'hapusall'])->name('tes-iq-hapus.all');
    Route::get('/import-soal-iq',[SoalTesIqController::class,'modalimport'])->name('modal-import.iq');
    Route::post('/import-soal-iq',[SoalTesIqController::class,'importsoaliq'])->name('import-soal.iq');

    // tes kepribadian
    Route::resource('/soal-tes-kepribadian', SoalTesKepribadianController::class);
    Route::post('/soal-tes-kepribadian-hapus-all',[SoalTesKepribadianController::class,'hapusall'])->name('kepribadian-hapus.all');
    Route::post('/soal-kepribadian/hapus/{id}',[SoalTesKepribadianController::class,'destroy'])->name('kepribadian.hapus');
    Route::get('/download-template',[SoalTesKepribadianController::class,'downloadtemplate'])->name('download-template');
    Route::get('/modal-import',[SoalTesKepribadianController::class,'modalimport'])->name('modal-import');
    Route::post('/import-soal',[SoalTesKepribadianController::class,'importsoal'])->name('import-soal');


    // wawancara
    Route::get('/wawancara',[WawancaraController::class,'index'])->name('wawancara.index');
    Route::post('/wawancara-hapus/{id}',[WawancaraController::class,'hapus'])->name('wawancara.hapus');
    Route::post('/wawancara-lolos/{id}',[WawancaraController::class,'lolos'])->name('wawancara.lolos');
    Route::post('/wawancara-tidak-lolos/{id}',[WawancaraController::class,'tidaklolos'])->name('wawancara-tidak.lolos');
    Route::post('/wawancara-hapus-all',[WawancaraController::class,'hapusall'])->name('wawancara-hapus.all');
    Route::post('/wawancara-lolos-all',[WawancaraController::class,'lolosall'])->name('wawancara-lolos.all');
    Route::post('/wawancara-tidak-lolos-all',[WawancaraController::class,'tidaklolosall'])->name('wawancara-tidak-lolos.all');

    // lolos
    Route::get('/calon-santri-baru',[LolosController::class,'index'])->name('lolos.index');
    Route::post('/calon-santri-baru/hapus-all',[LolosController::class,'hapusall'])->name('lolos-hapus.all');
    Route::get('/lolos-export',[LolosController::class,'exportlolos'])->name('lolos.export');

    // pesan
    Route::get('/chat-admin',[ChatController::class,'chatadmin'])->name('chat-admin.index');
    Route::get('/isi-chat/{id}',[ChatController::class,'isichat'])->name('isi-chat.index');
    Route::post('/store-chat',[ChatController::class,'storechatadmin'])->name('chat-admin.store');
    Route::post('/pesan-hapus/{id}',[ChatController::class,'pesanhapus'])->name('pesan.hapus');
    Route::post('/pesan-hapus-all',[ChatController::class,'pesanhapusall'])->name('pesan-hapus.all');    
    Route::get('/pesan-read-all',[ChatController::class,'readall'])->name('read-all');
});

