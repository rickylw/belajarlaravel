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
    Route::get('/admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/data_pengajuan/store', [App\Http\Controllers\DatapengajuanController::class, 'store'])->name('datapengajuan.store');;
    Route::post('/lembur/store', [App\Http\Controllers\LemburController::class, 'store'])->name('lembur.store');;
    Route::post('/training/store', [App\Http\Controllers\TrainingController::class, 'store'])->name('lembur.store');;
    Route::post('/daftarakun/store', [App\Http\Controllers\DaftarakunController::class, 'store'])->name('daftarakun.store');;

    Route::post('/data_pelamar/store', [App\Http\Controllers\DatapelamarController::class, 'store'])->name('datapelamar.store');;
    Route::put('/data_pelamar/update/{pelamar}', [App\Http\Controllers\DatapelamarController::class, 'update'])->name('datapelamar.update');;
    Route::get('/data_pelamar/input_sk/{pelamar}', [App\Http\Controllers\DatapelamarController::class, 'inputSK'])->name('datapelamar.input-sk');;
    Route::post('/data_pelamar/cetak_sk/{pelamar}', [App\Http\Controllers\DatapelamarController::class, 'cetakSK'])->name('datapelamar.cetak-sk');;
    Route::get('/data_pelamar/ubah_status/{pelamar}', [App\Http\Controllers\DatapelamarController::class, 'ubahStatus'])->name('datapelamar.ubah-status');;
    
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
    
    Route::get('/admin_dashboard/hasil_interview', [App\Http\Controllers\Admin\HasilInterviewController::class, 'index'])->name('admin.hasil-interview.index');
    Route::get('/admin_dashboard/hasil_interview/create', [App\Http\Controllers\Admin\HasilInterviewController::class, 'create'])->name('admin.hasil-interview.create');
    Route::post('/admin_dashboard/hasil_interview/store', [App\Http\Controllers\Admin\HasilInterviewController::class, 'store'])->name('admin.hasil-interview.store');
    Route::get('/admin_dashboard/hasil_interview/delete/{id}', [App\Http\Controllers\Admin\HasilInterviewController::class, 'delete'])->name('admin.hasil-interview.delete');
    Route::get('/admin_dashboard/hasil_interview/edit/{id}', [App\Http\Controllers\Admin\HasilInterviewController::class, 'edit'])->name('admin.hasil-interview.edit');
    Route::put('/admin_dashboard/hasil_interview/update/{id}', [App\Http\Controllers\Admin\HasilInterviewController::class, 'update'])->name('admin.hasil-interview.update');
    
    Route::get('/admin_dashboard/data_pegawai', [App\Http\Controllers\Admin\DataPegawaiController::class, 'index'])->name('admin.data-pegawai.index');
    Route::get('/admin_dashboard/data_pegawai/edit/{id}', [App\Http\Controllers\Admin\DataPegawaiController::class, 'edit'])->name('admin.data-pegawai.edit');
    Route::put('/admin_dashboard/data_pegawai/update/{id}', [App\Http\Controllers\Admin\DataPegawaiController::class, 'update'])->name('admin.data-pegawai.update');
    
    Route::get('/admin_dashboard/kontrak_pegawai', [App\Http\Controllers\Admin\KontrakPegawaiController::class, 'index'])->name('admin.kontrak-pegawai.index');
    
    Route::get('/admin_dashboard/kontrak_unitkerja', [App\Http\Controllers\Admin\KontrakUnitKerjaController::class, 'index'])->name('admin.kontrak-unitkerja.index');
    
    Route::get('/admin_dashboard/data_unitkerja', [App\Http\Controllers\Admin\DataUnitKerjaController::class, 'index'])->name('admin.data-unitkerja.index');
    Route::get('/admin_dashboard/data_unitkerja/edit/{id}', [App\Http\Controllers\Admin\DataUnitKerjaController::class, 'edit'])->name('admin.data-unitkerja.edit');
    Route::put('/admin_dashboard/data_unitkerja/update/{id}', [App\Http\Controllers\Admin\DataUnitKerjaController::class, 'update'])->name('admin.data-unitkerja.update');
    
    Route::get('/admin_dashboard/mutasi_pekerja', [App\Http\Controllers\Admin\DataUnitKerjaController::class, 'index'])->name('admin.data-unitkerja.index');
});

Route::middleware('role:unitkerja')->group(function () {
    Route::get('/unitkerja_dashboard', [App\Http\Controllers\Unitkerja\DashboardController::class, 'index'])->name('unitkerja.dashboard');

    Route::get('/unitkerja_dashboard/lowongan_kerja', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'index'])->name('unitkerja.lowongan-kerja.index');
    Route::get('/unitkerja_dashboard/lowongan_kerja/create', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'create'])->name('unitkerja.lowongan-kerja.create');
    Route::post('/unitkerja_dashboard/lowongan_kerja/store', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'store'])->name('unitkerja.lowongan-kerja.store');
    Route::get('/unitkerja_dashboard/lowongan_kerja/delete/{id}', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'delete'])->name('unitkerja.lowongan-kerja.delete');
    Route::get('/unitkerja_dashboard/lowongan_kerja/edit/{id}', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'edit'])->name('unitkerja.lowongan-kerja.edit');
    Route::put('/unitkerja_dashboard/lowongan_kerja/update/{id}', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'update'])->name('unitkerja.lowongan-kerja.update');
});

Route::middleware('role:pelamar')->group(function () {
    Route::get('/pelamar_dashboard/informasi_diri', [App\Http\Controllers\Pelamar\DashboardController::class, 'index'])->name('pelamar.informasi-diri');
    Route::get('/pelamar_dashboard/jadwal_tes', [App\Http\Controllers\Pelamar\DashboardController::class, 'jadwalTes'])->name('pelamar.jadwal-tes');
});

Route::middleware('role:pimpinan')->group(function () {
    Route::get('/pimpinan_dashboard', [App\Http\Controllers\Pimpinan\DashboardController::class, 'index'])->name('pimpinan.dashboard');
    Route::get('/pimpinan_dashboard/data_pelamar', [App\Http\Controllers\Pimpinan\DataPelamarController::class, 'index'])->name('pimpinan.data-pelamar.index');
    Route::get('/pimpinan_dashboard/data_pelamar/{id}', [App\Http\Controllers\Pimpinan\DataPelamarController::class, 'detail'])->name('pimpinan.data-pelamar.detail');
    
    Route::get('/pimpinan_dashboard/hasil_interview', [App\Http\Controllers\Pimpinan\HasilInterviewController::class, 'index'])->name('pimpinan.hasil-interview.index');
    Route::get('/pimpinan_dashboard/hasil_interview/{id}', [App\Http\Controllers\Pimpinan\HasilInterviewController::class, 'detail'])->name('pimpinan.hasil-interview.detail');
    Route::get('/pimpinan_dashboard/hasil_interview/submit/{id}/{status}', [App\Http\Controllers\Pimpinan\HasilInterviewController::class, 'submit'])->name('pimpinan.hasil-interview.submit');
});

Route::get('/pegawai_dashboard', [App\Http\Controllers\Pegawai\DashboardController::class, 'index'])->middleware('role:pegawai');;

Route::get('/hai', function () {
    return view('halo');
});

Route::get('/halo', function () {
    return view('halo');
});