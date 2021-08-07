<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPegawai extends Model
{
    protected $table = 'tbl_training_pegawai';
    protected $fillable = [ 
        "id_pegawai",
        "jadwal_pelatihan_mulai",
        "jadwal_pelatihan_akhir",
        "nama_pelatihan",
        "deskripsi_pelatihan",
        "diketahui_sdm",
        "diketahui_pimpinan",
        "status",
        "diajukan_oleh",
        "surat_izin_pelatihan"
    ]; 
}
