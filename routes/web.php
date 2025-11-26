<?php 

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\ProjectMahasiswaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PengabdianMasyarakatController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\TracerAlumniController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\AdministratifController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\StorageFileController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// =====================
// LOGIN ROUTE TAMBAHAN
// =====================
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.action');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// =====================
// SERVE FILE STORAGE
// =====================
Route::get('/storage/pdf/{filepath}', [StorageFileController::class, 'serve'])
    ->where('filepath', '.*')
    ->name('storage.pdf.serve');

// =====================
// ROUTE YANG PERLU LOGIN
// =====================
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('matakuliah', MatakuliahController::class);
    Route::resource('projectmahasiswa', ProjectMahasiswaController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('informasi', InformasiController::class)->except(['show']);
    Route::get('pengumuman', [InformasiController::class, 'indexPengumuman'])->name('informasi.pengumuman');
    Route::get('agenda', [InformasiController::class, 'indexAgenda'])->name('informasi.agenda');
    Route::resource('pengabdianmasyarakat', PengabdianMasyarakatController::class);
    Route::resource('penelitian', PenelitianController::class);
    Route::resource('alumni', AlumniController::class)->parameters([
        'alumni' => 'alumni',
    ]);
    Route::resource('tracer-alumni', TracerAlumniController::class);
    Route::resource('akademik', AkademikController::class);
    Route::resource('kemahasiswaan', KemahasiswaanController::class);
    Route::resource('administratif', AdministratifController::class);
    Route::resource('keuangan', KeuanganController::class);
});