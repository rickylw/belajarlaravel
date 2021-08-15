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
    Route::resource('penugasan', App\Http\Controllers\PenugasanController::class);
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
    
    Route::get('/admin_dashboard/training_pegawai', [App\Http\Controllers\Admin\TrainingPegawaiController::class, 'index'])->name('admin.training-pegawai.index');
    Route::get('/admin_dashboard/training_pegawai/detail/{id}', [App\Http\Controllers\Admin\TrainingPegawaiController::class, 'detail'])->name('admin.training-pegawai.detail');
    Route::get('/admin_dashboard/training_pegawai/forward/{id}', [App\Http\Controllers\Admin\TrainingPegawaiController::class, 'forward'])->name('admin.training-pegawai.forward');
    Route::get('/admin_dashboard/training_pegawai/cetakSIP/{id}', [App\Http\Controllers\Admin\TrainingPegawaiController::class, 'cetakSIP'])->name('admin.training-pegawai.cetak-sip');
    
    Route::get('/admin_dashboard/training_unitkerja', [App\Http\Controllers\Admin\TrainingUnitKerjaController::class, 'index'])->name('admin.training-unitkerja.index');
    Route::get('/admin_dashboard/training_unitkerja/detail/{id}', [App\Http\Controllers\Admin\TrainingUnitKerjaController::class, 'detail'])->name('admin.training-unitkerja.detail');
    Route::get('/admin_dashboard/training_unitkerja/forward/{id}', [App\Http\Controllers\Admin\TrainingUnitKerjaController::class, 'forward'])->name('admin.training-unitkerja.forward');
    Route::get('/admin_dashboard/training_unitkerja/cetakSIP/{id}', [App\Http\Controllers\Admin\TrainingUnitKerjaController::class, 'cetakSIP'])->name('admin.training-unitkerja.cetak-sip');
    
    Route::get('/admin_dashboard/data_pegawai', [App\Http\Controllers\Admin\DataPegawaiController::class, 'index'])->name('admin.data-pegawai.index');
    Route::get('/admin_dashboard/data_pegawai/edit/{id}', [App\Http\Controllers\Admin\DataPegawaiController::class, 'edit'])->name('admin.data-pegawai.edit');
    Route::put('/admin_dashboard/data_pegawai/update/{id}', [App\Http\Controllers\Admin\DataPegawaiController::class, 'update'])->name('admin.data-pegawai.update');
    
    Route::get('/admin_dashboard/kontrak_pegawai', [App\Http\Controllers\Admin\KontrakPegawaiController::class, 'index'])->name('admin.kontrak-pegawai.index');
    Route::get('/admin_dashboard/kontrak_pegawai/detail/{id}', [App\Http\Controllers\Admin\KontrakPegawaiController::class, 'detail'])->name('admin.kontrak-pegawai.detail');
    Route::get('/admin_dashboard/re_kontrak_pegawai', [App\Http\Controllers\Admin\KontrakPegawaiController::class, 'reIndex'])->name('admin.re-kontrak-pegawai.index');
    Route::post('/admin_dashboard/re_kontrak_pegawai/forward/{id}', [App\Http\Controllers\Admin\KontrakPegawaiController::class, 'forward'])->name('admin.re-kontrak-pegawai.forward');
    Route::get('/admin_dashboard/pengajuan_kontrak_pegawai', [App\Http\Controllers\Admin\KontrakPegawaiController::class, 'pengajuanIndex'])->name('admin.pengajuan-kontrak-pegawai.index');
    Route::get('/admin_dashboard/pengajuan_kontrak_pegawai/detail/{id}', [App\Http\Controllers\Admin\KontrakPegawaiController::class, 'detailPengajuan'])->name('admin.pengajuan-kontrak-pegawai.detail');
    Route::post('/admin_dashboard/pengajuan_kontrak_pegawai/submit/{id}', [App\Http\Controllers\Admin\KontrakPegawaiController::class, 'submitPengajuan'])->name('admin.pengajuan-kontrak-pegawai.submit');

    Route::get('/admin_dashboard/kontrak_unitkerja', [App\Http\Controllers\Admin\KontrakUnitKerjaController::class, 'index'])->name('admin.kontrak-unitkerja.index');
    Route::get('/admin_dashboard/kontrak_unitkerja/detail/{id}', [App\Http\Controllers\Admin\KontrakUnitKerjaController::class, 'detail'])->name('admin.kontrak-unitkerja.detail');
    Route::get('/admin_dashboard/re_kontrak_unitkerja', [App\Http\Controllers\Admin\KontrakUnitKerjaController::class, 'reIndex'])->name('admin.re-kontrak-unitkerja.index');
    Route::post('/admin_dashboard/re_kontrak_unitkerja/forward/{id}', [App\Http\Controllers\Admin\KontrakUnitKerjaController::class, 'forward'])->name('admin.re-kontrak-unitkerja.forward');
    Route::get('/admin_dashboard/pengajuan_kontrak_unitkerja', [App\Http\Controllers\Admin\KontrakUnitKerjaController::class, 'pengajuanIndex'])->name('admin.pengajuan-kontrak-unitkerja.index');
    Route::get('/admin_dashboard/pengajuan_kontrak_unitkerja/detail/{id}', [App\Http\Controllers\Admin\KontrakUnitKerjaController::class, 'detailPengajuan'])->name('admin.pengajuan-kontrak-unitkerja.detail');
    Route::post('/admin_dashboard/pengajuan_kontrak_unitkerja/submit/{id}', [App\Http\Controllers\Admin\KontrakUnitKerjaController::class, 'submitPengajuan'])->name('admin.pengajuan-kontrak-unitkerja.submit');
    
    Route::get('/admin_dashboard/data_unitkerja', [App\Http\Controllers\Admin\DataUnitKerjaController::class, 'index'])->name('admin.data-unitkerja.index');
    Route::get('/admin_dashboard/data_unitkerja/edit/{id}', [App\Http\Controllers\Admin\DataUnitKerjaController::class, 'edit'])->name('admin.data-unitkerja.edit');
    Route::put('/admin_dashboard/data_unitkerja/update/{id}', [App\Http\Controllers\Admin\DataUnitKerjaController::class, 'update'])->name('admin.data-unitkerja.update');
    
    Route::get('/admin_dashboard/mutasi_pegawai', [App\Http\Controllers\Admin\MutasipegawaiController::class, 'index'])->name('admin.mutasi-pegawai.index');
    Route::get('/admin_dashboard/mutasi_pegawai/create', [App\Http\Controllers\Admin\MutasipegawaiController::class, 'create'])->name('admin.mutasi-pegawai.create');
    Route::post('/admin_dashboard/mutasi_pegawai/store', [App\Http\Controllers\Admin\MutasipegawaiController::class, 'store'])->name('admin.mutasi-pegawai.store');
    Route::get('/admin_dashboard/mutasi_pegawai/detail/{id}', [App\Http\Controllers\Admin\MutasipegawaiController::class, 'detail'])->name('admin.mutasi-pegawai.detail');
    
    Route::get('/admin_dashboard/mutasi_unitkerja', [App\Http\Controllers\Admin\MutasiUnitKerjaController::class, 'index'])->name('admin.mutasi-unitkerja.index');
    Route::get('/admin_dashboard/mutasi_unitkerja/create', [App\Http\Controllers\Admin\MutasiUnitKerjaController::class, 'create'])->name('admin.mutasi-unitkerja.create');
    Route::post('/admin_dashboard/mutasi_unitkerja/store', [App\Http\Controllers\Admin\MutasiUnitKerjaController::class, 'store'])->name('admin.mutasi-unitkerja.store');
    Route::get('/admin_dashboard/mutasi_unitkerja/detail/{id}', [App\Http\Controllers\Admin\MutasiUnitKerjaController::class, 'detail'])->name('admin.mutasi-unitkerja.detail');
    
    Route::get('/admin_dashboard/lembur_pegawai', [App\Http\Controllers\Admin\LemburPegawaiController::class, 'index'])->name('admin.lembur-pegawai.index');
    Route::get('/admin_dashboard/lembur_pegawai/detail/{id}', [App\Http\Controllers\Admin\LemburPegawaiController::class, 'detail'])->name('admin.lembur-pegawai.detail');
    Route::get('/admin_dashboard/lembur_pegawai/submit/{id}/{status}', [App\Http\Controllers\Admin\LemburPegawaiController::class, 'submit'])->name('admin.lembur-pegawai.submit');
    
    Route::get('/admin_dashboard/lembur_unitkerja', [App\Http\Controllers\Admin\LemburUnitKerjaController::class, 'index'])->name('admin.lembur-unitkerja.index');
    Route::get('/admin_dashboard/lembur_unitkerja/detail/{id}', [App\Http\Controllers\Admin\LemburUnitKerjaController::class, 'detail'])->name('admin.lembur-unitkerja.detail');
    Route::get('/admin_dashboard/lembur_unitkerja/submit/{id}/{status}', [App\Http\Controllers\Admin\LemburUnitKerjaController::class, 'submit'])->name('admin.lembur-unitkerja.submit');
    
    Route::get('/admin_dashboard/pesan/create', [App\Http\Controllers\Admin\PesanController::class, 'create'])->name('admin.pesan.create');
    Route::post('/admin_dashboard/pesan/store', [App\Http\Controllers\Admin\PesanController::class, 'store'])->name('admin.pesan.store');
    Route::get('/admin_dashboard/pesan_keluar', [App\Http\Controllers\Admin\PesanController::class, 'pesanKeluar'])->name('admin.pesan-keluar.index');
    Route::get('/admin_dashboard/pesan_keluar/detail/{id}', [App\Http\Controllers\Admin\PesanController::class, 'detailPesanKeluar'])->name('admin.pesan-keluar.detail');
    Route::get('/admin_dashboard/pesan_masuk', [App\Http\Controllers\Admin\PesanController::class, 'pesanMasuk'])->name('admin.pesan-masuk.index');
    Route::get('/admin_dashboard/pesan_masuk/detail/{id}', [App\Http\Controllers\Admin\PesanController::class, 'detailPesanMasuk'])->name('admin.pesan-masuk.detail');
    
    Route::get('/admin_dashboard/resign_pegawai', [App\Http\Controllers\Admin\ResignPegawaiController::class, 'index'])->name('admin.resign-pegawai.index');
    Route::get('/admin_dashboard/resign_pegawai/create', [App\Http\Controllers\Admin\ResignPegawaiController::class, 'create'])->name('admin.resign-pegawai.create');
    Route::get('/admin_dashboard/resign_pegawai/detail/{id}', [App\Http\Controllers\Admin\ResignPegawaiController::class, 'detail'])->name('admin.resign-pegawai.detail');
    Route::post('/admin_dashboard/resign_pegawai/submit/{id}', [App\Http\Controllers\Admin\ResignPegawaiController::class, 'submit'])->name('admin.resign-pegawai.submit');
    Route::get('/admin_dashboard/resign_pegawai/cetakSK/{id}', [App\Http\Controllers\Admin\ResignPegawaiController::class, 'cetakSK'])->name('admin.resign-pegawai.cetak-sk');
    
    Route::get('/admin_dashboard/resign_unitkerja', [App\Http\Controllers\Admin\ResignUnitKerjaController::class, 'index'])->name('admin.resign-unitkerja.index');
    Route::get('/admin_dashboard/resign_unitkerja/create', [App\Http\Controllers\Admin\ResignUnitKerjaController::class, 'create'])->name('admin.resign-unitkerja.create');
    Route::get('/admin_dashboard/resign_unitkerja/detail/{id}', [App\Http\Controllers\Admin\ResignUnitKerjaController::class, 'detail'])->name('admin.resign-unitkerja.detail');
    Route::post('/admin_dashboard/resign_unitkerja/submit/{id}', [App\Http\Controllers\Admin\ResignUnitKerjaController::class, 'submit'])->name('admin.resign-unitkerja.submit');
    Route::get('/admin_dashboard/resign_unitkerja/cetakSK/{id}', [App\Http\Controllers\Admin\ResignUnitKerjaController::class, 'cetakSK'])->name('admin.resign-unitkerja.cetak-sk');
    
    Route::get('/admin_dashboard/permohonan_penugasan_pegawai', [App\Http\Controllers\Admin\PermohonanPenugasanPegawaiController::class, 'index'])->name('admin.permohonan-penugasan-pegawai.index');
    Route::get('/admin_dashboard/permohonan_penugasan_pegawai/detail/{id}', [App\Http\Controllers\Admin\PermohonanPenugasanPegawaiController::class, 'detail'])->name('admin.permohonan-penugasan-pegawai.detail');
    
    Route::get('/admin_dashboard/permohonan_penugasan_unitkerja', [App\Http\Controllers\Admin\PermohonanPenugasanUnitKerjaController::class, 'index'])->name('admin.permohonan-penugasan-unitkerja.index');
    Route::get('/admin_dashboard/permohonan_penugasan_unitkerja/detail/{id}', [App\Http\Controllers\Admin\PermohonanPenugasanUnitKerjaController::class, 'detail'])->name('admin.permohonan-penugasan-unitkerja.detail');
});

Route::middleware('role:unitkerja')->group(function () {
    Route::get('/unitkerja_dashboard', [App\Http\Controllers\Unitkerja\DashboardController::class, 'index'])->name('unitkerja.dashboard');

    Route::get('/unitkerja_dashboard/lowongan_kerja', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'index'])->name('unitkerja.lowongan-kerja.index');
    Route::get('/unitkerja_dashboard/lowongan_kerja/create', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'create'])->name('unitkerja.lowongan-kerja.create');
    Route::post('/unitkerja_dashboard/lowongan_kerja/store', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'store'])->name('unitkerja.lowongan-kerja.store');
    Route::get('/unitkerja_dashboard/lowongan_kerja/delete/{id}', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'delete'])->name('unitkerja.lowongan-kerja.delete');
    Route::get('/unitkerja_dashboard/lowongan_kerja/edit/{id}', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'edit'])->name('unitkerja.lowongan-kerja.edit');
    Route::put('/unitkerja_dashboard/lowongan_kerja/update/{id}', [App\Http\Controllers\Unitkerja\LowonganKerjaController::class, 'update'])->name('unitkerja.lowongan-kerja.update');
    
    Route::get('/unitkerja_dashboard/lembur', [App\Http\Controllers\Unitkerja\LemburController::class, 'index'])->name('unitkerja.lembur.index');
    Route::get('/unitkerja_dashboard/lembur/create', [App\Http\Controllers\Unitkerja\LemburController::class, 'create'])->name('unitkerja.lembur.create');
    Route::post('/unitkerja_dashboard/lembur/store', [App\Http\Controllers\Unitkerja\LemburController::class, 'store'])->name('unitkerja.lembur.store');
    Route::get('/unitkerja_dashboard/lembur/delete/{id}', [App\Http\Controllers\Unitkerja\LemburController::class, 'delete'])->name('unitkerja.lembur.delete');
    Route::get('/unitkerja_dashboard/lembur/edit/{id}', [App\Http\Controllers\Unitkerja\LemburController::class, 'edit'])->name('unitkerja.lembur.edit');
    Route::put('/unitkerja_dashboard/lembur/update/{id}', [App\Http\Controllers\Unitkerja\LemburController::class, 'update'])->name('unitkerja.lembur.update');
    
    Route::get('/unitkerja_dashboard/training_pegawai', [App\Http\Controllers\Unitkerja\TrainingPegawaiController::class, 'index'])->name('unitkerja.training-pegawai.index');
    Route::get('/unitkerja_dashboard/training_pegawai/create', [App\Http\Controllers\Unitkerja\TrainingPegawaiController::class, 'create'])->name('unitkerja.training-pegawai.create');
    Route::post('/unitkerja_dashboard/training_pegawai/store', [App\Http\Controllers\Unitkerja\TrainingPegawaiController::class, 'store'])->name('unitkerja.training-pegawai.store');
    Route::get('/unitkerja_dashboard/training_pegawai/delete/{id}', [App\Http\Controllers\Unitkerja\TrainingPegawaiController::class, 'delete'])->name('unitkerja.training-pegawai.delete');
    Route::get('/unitkerja_dashboard/training_pegawai/edit/{id}', [App\Http\Controllers\Unitkerja\TrainingPegawaiController::class, 'edit'])->name('unitkerja.training-pegawai.edit');
    Route::put('/unitkerja_dashboard/training_pegawai/update/{id}', [App\Http\Controllers\Unitkerja\TrainingPegawaiController::class, 'update'])->name('unitkerja.training-pegawai.update');
    
    Route::get('/unitkerja_dashboard/training_unitkerja', [App\Http\Controllers\Unitkerja\TrainingUnitKerjaController::class, 'index'])->name('unitkerja.training-unitkerja.index');
    Route::get('/unitkerja_dashboard/training_unitkerja/create', [App\Http\Controllers\Unitkerja\TrainingUnitKerjaController::class, 'create'])->name('unitkerja.training-unitkerja.create');
    Route::post('/unitkerja_dashboard/training_unitkerja/store', [App\Http\Controllers\Unitkerja\TrainingUnitKerjaController::class, 'store'])->name('unitkerja.training-unitkerja.store');
    Route::get('/unitkerja_dashboard/training_unitkerja/delete/{id}', [App\Http\Controllers\Unitkerja\TrainingUnitKerjaController::class, 'delete'])->name('unitkerja.training-unitkerja.delete');
    Route::get('/unitkerja_dashboard/training_unitkerja/edit/{id}', [App\Http\Controllers\Unitkerja\TrainingUnitKerjaController::class, 'edit'])->name('unitkerja.training-unitkerja.edit');
    Route::put('/unitkerja_dashboard/training_unitkerja/update/{id}', [App\Http\Controllers\Unitkerja\TrainingUnitKerjaController::class, 'update'])->name('unitkerja.training-unitkerja.update');
    
    Route::get('/unitkerja_dashboard/resign', [App\Http\Controllers\Unitkerja\ResignController::class, 'index'])->name('unitkerja.resign.index');
    Route::get('/unitkerja_dashboard/resign/create', [App\Http\Controllers\Unitkerja\ResignController::class, 'create'])->name('unitkerja.resign.create');
    Route::post('/unitkerja_dashboard/resign/store', [App\Http\Controllers\Unitkerja\ResignController::class, 'store'])->name('unitkerja.resign.store');
    Route::get('/unitkerja_dashboard/resign/edit/{id}', [App\Http\Controllers\Unitkerja\ResignController::class, 'edit'])->name('unitkerja.resign.edit');
    Route::get('/unitkerja_dashboard/resign/delete/{id}', [App\Http\Controllers\Unitkerja\ResignController::class, 'delete'])->name('unitkerja.resign.delete');
    Route::put('/unitkerja_dashboard/resign/update/{id}', [App\Http\Controllers\Unitkerja\ResignController::class, 'update'])->name('unitkerja.resign.update');
    
    Route::get('/unitkerja_dashboard/permohonan_penugasan', [App\Http\Controllers\Unitkerja\PermohonanPenugasanController::class, 'index'])->name('unitkerja.permohonan-penugasan.index');
    Route::get('/unitkerja_dashboard/permohonan_penugasan/create', [App\Http\Controllers\Unitkerja\PermohonanPenugasanController::class, 'create'])->name('unitkerja.permohonan-penugasan.create');
    Route::post('/unitkerja_dashboard/permohonan_penugasan/store', [App\Http\Controllers\Unitkerja\PermohonanPenugasanController::class, 'store'])->name('unitkerja.permohonan-penugasan.store');
    Route::get('/unitkerja_dashboard/permohonan_penugasan/edit/{id}', [App\Http\Controllers\Unitkerja\PermohonanPenugasanController::class, 'edit'])->name('unitkerja.permohonan-penugasan.edit');
    Route::get('/unitkerja_dashboard/permohonan_penugasan/delete/{id}', [App\Http\Controllers\Unitkerja\PermohonanPenugasanController::class, 'delete'])->name('unitkerja.permohonan-penugasan.delete');
    Route::put('/unitkerja_dashboard/permohonan_penugasan/update/{id}', [App\Http\Controllers\Unitkerja\PermohonanPenugasanController::class, 'update'])->name('unitkerja.permohonan-penugasan.update');
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
    
    Route::get('/pimpinan_dashboard/training_pegawai', [App\Http\Controllers\Pimpinan\TrainingPegawaiController::class, 'index'])->name('pimpinan.training-pegawai.index');
    Route::get('/pimpinan_dashboard/training_pegawai/detail/{id}', [App\Http\Controllers\Pimpinan\TrainingPegawaiController::class, 'detail'])->name('pimpinan.training-pegawai.detail');
    Route::get('/pimpinan_dashboard/training_pegawai/submit/{id}/{status}', [App\Http\Controllers\Pimpinan\TrainingPegawaiController::class, 'submit'])->name('pimpinan.training-pegawai.submit');
    
    Route::get('/pimpinan_dashboard/training_unitkerja', [App\Http\Controllers\Pimpinan\TrainingUnitKerjaController::class, 'index'])->name('pimpinan.training-unitkerja.index');
    Route::get('/pimpinan_dashboard/training_unitkerja/detail/{id}', [App\Http\Controllers\Pimpinan\TrainingUnitKerjaController::class, 'detail'])->name('pimpinan.training-unitkerja.detail');
    Route::get('/pimpinan_dashboard/training_unitkerja/submit/{id}/{status}', [App\Http\Controllers\Pimpinan\TrainingUnitKerjaController::class, 'submit'])->name('pimpinan.training-unitkerja.submit');
    
    Route::get('/pimpinan_dashboard/pesan_keluar', [App\Http\Controllers\Pimpinan\PesanController::class, 'pesanKeluar'])->name('pimpinan.pesan-keluar.index');
    Route::get('/pimpinan_dashboard/pesan_keluar/detail/{id}', [App\Http\Controllers\Pimpinan\PesanController::class, 'detailPesanKeluar'])->name('pimpinan.pesan-keluar.detail');
    Route::get('/pimpinan_dashboard/pesan_masuk', [App\Http\Controllers\Pimpinan\PesanController::class, 'pesanMasuk'])->name('pimpinan.pesan-masuk.index');
    Route::get('/pimpinan_dashboard/pesan_masuk/detail/{id}', [App\Http\Controllers\Pimpinan\PesanController::class, 'detailPesanMasuk'])->name('pimpinan.pesan-masuk.detail');
    Route::get('/pimpinan_dashboard/pesan/create', [App\Http\Controllers\Pimpinan\PesanController::class, 'create'])->name('pimpinan.pesan.create');
    Route::post('/pimpinan_dashboard/pesan/store', [App\Http\Controllers\Pimpinan\PesanController::class, 'store'])->name('pimpinan.pesan.store');
    
    Route::get('/pimpinan_dashboard/resign_pegawai', [App\Http\Controllers\Pimpinan\ResignPegawaiController::class, 'index'])->name('pimpinan.resign-pegawai.index');
    Route::get('/pimpinan_dashboard/resign_pegawai/detail/{id}', [App\Http\Controllers\Pimpinan\ResignPegawaiController::class, 'detail'])->name('pimpinan.resign-pegawai.detail');
    Route::get('/pimpinan_dashboard/resign_pegawai/submit/{id}/{status}', [App\Http\Controllers\Pimpinan\ResignPegawaiController::class, 'submit'])->name('pimpinan.resign-pegawai.submit');
    
    Route::get('/pimpinan_dashboard/resign_unitkerja', [App\Http\Controllers\Pimpinan\ResignUnitKerjaController::class, 'index'])->name('pimpinan.resign-unitkerja.index');
    Route::get('/pimpinan_dashboard/resign_unitkerja/detail/{id}', [App\Http\Controllers\Pimpinan\ResignUnitKerjaController::class, 'detail'])->name('pimpinan.resign-unitkerja.detail');
    Route::get('/pimpinan_dashboard/resign_unitkerja/submit/{id}/{status}', [App\Http\Controllers\Pimpinan\ResignUnitKerjaController::class, 'submit'])->name('pimpinan.resign-unitkerja.submit');
    
    Route::get('/pimpinan_dashboard/re_kontrak_pegawai', [App\Http\Controllers\Pimpinan\KontrakPegawaiController::class, 'index'])->name('pimpinan.re-kontrak-pegawai.index');
    Route::get('/pimpinan_dashboard/re_kontrak_pegawai/detail/{id}', [App\Http\Controllers\Pimpinan\KontrakPegawaiController::class, 'detail'])->name('pimpinan.re-kontrak-pegawai.detail');
    Route::post('/pimpinan_dashboard/re_kontrak_pegawai/submit/{id}', [App\Http\Controllers\Pimpinan\KontrakPegawaiController::class, 'submit'])->name('pimpinan.re-kontrak-pegawai.submit');
    
    Route::get('/pimpinan_dashboard/re_kontrak_unitkerja', [App\Http\Controllers\Pimpinan\KontrakUnitKerjaController::class, 'index'])->name('pimpinan.re-kontrak-unitkerja.index');
    Route::get('/pimpinan_dashboard/re_kontrak_unitkerja/detail/{id}', [App\Http\Controllers\Pimpinan\KontrakUnitKerjaController::class, 'detail'])->name('pimpinan.re-kontrak-unitkerja.detail');
    Route::post('/pimpinan_dashboard/re_kontrak_unitkerja/submit/{id}', [App\Http\Controllers\Pimpinan\KontrakUnitKerjaController::class, 'submit'])->name('pimpinan.re-kontrak-unitkerja.submit');
});

Route::middleware('role:pegawai')->group(function () {
    Route::get('/pegawai_dashboard', [App\Http\Controllers\Pegawai\DashboardController::class, 'index'])->name('pegawai.dashboard');
    
    Route::get('/pegawai_dashboard/lembur', [App\Http\Controllers\Pegawai\LemburController::class, 'index'])->name('pegawai.lembur.index');
    Route::get('/pegawai_dashboard/lembur/create', [App\Http\Controllers\Pegawai\LemburController::class, 'create'])->name('pegawai.lembur.create');
    Route::post('/pegawai_dashboard/lembur/store', [App\Http\Controllers\Pegawai\LemburController::class, 'store'])->name('pegawai.lembur.store');
    Route::get('/pegawai_dashboard/lembur/delete/{id}', [App\Http\Controllers\Pegawai\LemburController::class, 'delete'])->name('pegawai.lembur.delete');
    Route::get('/pegawai_dashboard/lembur/edit/{id}', [App\Http\Controllers\Pegawai\LemburController::class, 'edit'])->name('pegawai.lembur.edit');
    Route::put('/pegawai_dashboard/lembur/update/{id}', [App\Http\Controllers\Pegawai\LemburController::class, 'update'])->name('pegawai.lembur.update');
    
    Route::get('/pegawai_dashboard/resign', [App\Http\Controllers\Pegawai\ResignController::class, 'index'])->name('pegawai.resign.index');
    Route::get('/pegawai_dashboard/resign/create', [App\Http\Controllers\Pegawai\ResignController::class, 'create'])->name('pegawai.resign.create');
    Route::post('/pegawai_dashboard/resign/store', [App\Http\Controllers\Pegawai\ResignController::class, 'store'])->name('pegawai.resign.store');
    Route::get('/pegawai_dashboard/resign/edit/{id}', [App\Http\Controllers\Pegawai\ResignController::class, 'edit'])->name('pegawai.resign.edit');
    Route::get('/pegawai_dashboard/resign/delete/{id}', [App\Http\Controllers\Pegawai\ResignController::class, 'delete'])->name('pegawai.resign.delete');
    Route::put('/pegawai_dashboard/resign/update/{id}', [App\Http\Controllers\Pegawai\ResignController::class, 'update'])->name('pegawai.resign.update');
    
    Route::get('/pegawai_dashboard/permohonan_penugasan', [App\Http\Controllers\Pegawai\PermohonanPenugasanController::class, 'index'])->name('pegawai.permohonan-penugasan.index');
    Route::get('/pegawai_dashboard/permohonan_penugasan/create', [App\Http\Controllers\Pegawai\PermohonanPenugasanController::class, 'create'])->name('pegawai.permohonan-penugasan.create');
    Route::post('/pegawai_dashboard/permohonan_penugasan/store', [App\Http\Controllers\Pegawai\PermohonanPenugasanController::class, 'store'])->name('pegawai.permohonan-penugasan.store');
    Route::get('/pegawai_dashboard/permohonan_penugasan/edit/{id}', [App\Http\Controllers\Pegawai\PermohonanPenugasanController::class, 'edit'])->name('pegawai.permohonan-penugasan.edit');
    Route::get('/pegawai_dashboard/permohonan_penugasan/delete/{id}', [App\Http\Controllers\Pegawai\PermohonanPenugasanController::class, 'delete'])->name('pegawai.permohonan-penugasan.delete');
    Route::put('/pegawai_dashboard/permohonan_penugasan/update/{id}', [App\Http\Controllers\Pegawai\PermohonanPenugasanController::class, 'update'])->name('pegawai.permohonan-penugasan.update');
});