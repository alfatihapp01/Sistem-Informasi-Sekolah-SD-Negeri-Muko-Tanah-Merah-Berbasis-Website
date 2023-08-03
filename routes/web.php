<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MediaController;
use App\Http\Livewire\Berita;
use App\Http\Livewire\CekDataSiswa;
use App\Http\Livewire\Dashboard\Berita\Index as BeritaIndex;
use App\Http\Livewire\Dashboard\Galeri\Index as GaleriIndex;
use App\Http\Livewire\Dashboard\Guru\Index as GuruIndex;
use App\Http\Livewire\Dashboard\Home\Index;
use App\Http\Livewire\Dashboard\Informasi\Index as InformasiIndex;
use App\Http\Livewire\Dashboard\InformasiKegiatan\Index as InformasiKegiatanIndex;
use App\Http\Livewire\Dashboard\Jabatan\Index as JabatanIndex;
use App\Http\Livewire\Dashboard\Kelas\Index as KelasIndex;
use App\Http\Livewire\Dashboard\Profil\Index as ProfilIndex;
use App\Http\Livewire\Dashboard\ProfilInstansi\Index as ProfilInstansiIndex;
use App\Http\Livewire\Dashboard\Siswa\Index as SiswaIndex;
use App\Http\Livewire\Dashboard\User\Index as UserIndex;
use App\Http\Livewire\Dashboard\Video\Index as VideoIndex;
use App\Http\Livewire\DataGuru;
use App\Http\Livewire\Galeri;
use App\Http\Livewire\Home;
use App\Http\Livewire\Informasi;
use App\Http\Livewire\InformasiExtrakurikuler;
use App\Http\Livewire\Login;
use App\Http\Livewire\ProfilInstansi;
use App\Http\Livewire\Statistik;
use App\Http\Livewire\Video;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Home::class);

Route::get('/profil-sekolah', ProfilInstansi::class);

Route::get('/data-sekolah/statistik-sekolah', Statistik::class);

Route::get('/data-sekolah/tenaga-pendidik', DataGuru::class);

Route::get('/data-sekolah/cek-peserta-didik', CekDataSiswa::class);

Route::get('/media/berita', Berita::class);
Route::controller(MediaController::class)->group(function () {
    Route::get('/media/berita/{berita:slug}', 'show_berita');
    Route::get('/media/informasi/{informasi:slug}', 'show_informasi');
    Route::get('/media/video/{video:slug}', 'show_video');
});

Route::get('/media/pengumuman-sekolah', Informasi::class);

Route::get('/media/video-dokumentasi', Video::class);

Route::get('/media/galeri-sekolah', Galeri::class);


Route::get('/informasi-ekstrakurikuler', InformasiExtrakurikuler::class);

Route::get('/administrator', Login::class)->name('login')->middleware('guest');

Route::controller(LogoutController::class)->group(function () {
    Route::post('/logout', 'logout')->middleware('auth');
});

// administrator
Route::get('/dashboard', Index::class)->middleware('auth');

Route::get('/dashboard/profil-instansi', ProfilInstansiIndex::class)->middleware('admin');

// master admin
Route::get('/dashboard/master/user', UserIndex::class)->middleware('admin');

Route::get('/dashboard/user/profil', ProfilIndex::class)->middleware('admin');

// media
Route::get('/dashboard/media/galeri', GaleriIndex::class)->middleware('admin');

Route::get('/dashboard/media/berita', BeritaIndex::class)->middleware('admin');

Route::get('/dashboard/media/video', VideoIndex::class)->middleware('admin');

Route::get('/dashboard/media/pengumuman-sekolah', InformasiIndex::class)->middleware('admin');

Route::get('/dashboard/media/extrakurikuler', InformasiKegiatanIndex::class)->middleware('admin');


// Data Master
Route::get('/dashboard/master/jabatan', JabatanIndex::class)->middleware('admin');
Route::get('/dashboard/master/guru', GuruIndex::class)->middleware('admin');
Route::get('/dashboard/master/kelas', KelasIndex::class)->middleware('admin');
Route::get('/dashboard/master/siswa', SiswaIndex::class)->middleware('admin');

// imports
Route::controller(ImportController::class)->group(function () {
    Route::post('/dashboard/guru/import', 'importGuru')->middleware('admin');
    Route::post('/dashboard/siswa/import', 'importSiswa')->middleware('admin');
});

// export
Route::controller(ExportController::class)->group(function () {
    Route::get('/dashboard/guru/excel', 'export_guru')->middleware('admin');
    Route::get('/dashboard/siswa/excel', 'export_siswa')->middleware('admin');
});
