<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Middleware;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('role:admin')->group(function () {
    Route::resource('data_pengajuan', App\Http\Controllers\DatapengajuanController::class); 
    Route::resource('daftarakun', App\Http\Controllers\DaftarakunController::class); 
    Route::resource('data_pelamar', App\Http\Controllers\DatapelamarController::class); 
    Route::resource('lembur', App\Http\Controllers\LemburController::class);
    Route::resource('training', App\Http\Controllers\TrainingController::class);
    Route::resource('penugasan', App\Http\Controllers\PenugasanController::class);
    Route::resource('resign', App\Http\Controllers\ResignController::class);
    Route::resource('datapegawai', App\Http\Controllers\DatapegawaiController::class);
    Route::resource('mutasipegawai', App\Http\Controllers\MutasipegawaiController::class);
    Route::get('/admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::post('/data_pengajuan/store', [App\Http\Controllers\DatapengajuanController::class, 'store'])->name('datapengajuan.store');;
    Route::post('/lembur/store', [App\Http\Controllers\LemburController::class, 'store'])->name('lembur.store');;
    Route::post('/training/store', [App\Http\Controllers\TrainingController::class, 'store'])->name('lembur.store');;
    Route::post('/daftarakun/store', [App\Http\Controllers\DaftarakunController::class, 'store'])->name('daftarakun.store');;

    Route::post('/data_pelamar/store', [App\Http\Controllers\DatapelamarController::class, 'store'])->name('datapelamar.store');;
    Route::put('/data_pelamar/update/{pelamar}', [App\Http\Controllers\DatapelamarController::class, 'update'])->name('datapelamar.update');;
    
    Route::post('/penugasan/store', [App\Http\Controllers\PenugasanController::class, 'store'])->name('penugasan.store');; 
    Route::post('/resign/store', [App\Http\Controllers\ResignController::class, 'store'])->name('resign.store');; 
    Route::post('/datapegawai/store', [App\Http\Controllers\DatapegawaiController::class, 'store'])->name('datapegawai.store');;
    Route::post('/mutasipegawai/store', [App\Http\Controllers\MutasipegawaiController::class, 'store'])->name('mutasipegawai.store');; 

    Route::get('/admin_dashboard/lowongan_kerja', [App\Http\Controllers\Admin\LowonganKerjaController::class, 'index'])->name('admin.lowongan-kerja.index');
    Route::get('/admin_dashboard/lowongan_kerja/submit/{id}/{status}', [App\Http\Controllers\Admin\LowonganKerjaController::class, 'submit'])->name('admin.lowongan-kerja.submit');
    Route::get('/admin_dashboard/lowongan_kerja/detail/{id}', [App\Http\Controllers\Admin\LowonganKerjaController::class, 'detail'])->name('admin.lowongan-kerja.detail');
    
    Route::get('/admin_dashboard/jadwal_tes', [App\Http\Controllers\Admin\JadwalTesController::class, 'index'])->name('admin.jadwal-tes.index');
    Route::get('/admin_dashboard/jadwal_tes/create', [App\Http\Controllers\Admin\JadwalTesController::class, 'create'])->name('admin.jadwal-tes.create');
    Route::post('/admin_dashboard/jadwal_tes/store', [App\Http\Controllers\Admin\JadwalTesController::class, 'store'])->name('admin.jadwal-tes.store');
    Route::get('/admin_dashboard/jadwal_tes/delete/{id}', [App\Http\Controllers\Admin\JadwalTesController::class, 'delete'])->name('admin.jadwal-tes.delete');
    Route::get('/admin_dashboard/jadwal_tes/edit/{id}', [App\Http\Controllers\Admin\JadwalTesController::class, 'edit'])->name('admin.jadwal-tes.edit');
    Route::put('/admin_dashboard/jadwal_tes/update/{id}', [App\Http\Controllers\Admin\JadwalTesController::class, 'update'])->name('admin.jadwal-tes.update');
});

Route::middleware('role:unitkerja')->group(function () {
    Route::get('/unitkerja_dashboard', [App\Http\Controllers\Unitkerja\DashboardController::class, 'index']);

    Route::get('/unitkerja_dashboard/lowongan_kerja', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'index'])->name('unitkerja.lowongan-kerja.index');
    Route::get('/unitkerja_dashboard/lowongan_kerja/create', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'create'])->name('unitkerja.lowongan-kerja.create');
    Route::post('/unitkerja_dashboard/lowongan_kerja/store', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'store'])->name('unitkerja.lowongan-kerja.store');
    Route::get('/unitkerja_dashboard/lowongan_kerja/delete/{id}', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'delete'])->name('unitkerja.lowongan-kerja.delete');
    Route::get('/unitkerja_dashboard/lowongan_kerja/edit/{id}', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'edit'])->name('unitkerja.lowongan-kerja.edit');
    Route::put('/unitkerja_dashboard/lowongan_kerja/update/{id}', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'update'])->name('unitkerja.lowongan-kerja.update');
});

Route::middleware('role:pelamar')->group(function () {
    Route::get('/pelamar_dashboard', [App\Http\Controllers\Pelamar\DashboardController::class, 'index']);
});

Route::get('/pegawai_dashboard', [App\Http\Controllers\Pegawai\DashboardController::class, 'index'])->middleware('role:pegawai');;
Route::get('/pimpinan_dashboard', [App\Http\Controllers\Pimpinan\DashboardController::class, 'index'])->middleware('role:pimpinan');;

Route::get('/hai', function () {
    return view('halo');
});

Route::get('/halo', function () {
    return view('halo');
});