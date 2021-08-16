<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenugasanUnitKerja extends Model
{
    protected $table = 'tbl_penugasan_unitkerja';
    protected $fillable = [ 
        "id_unitkerja",
        "jenis_penugasan",
        "deskripsi_penugasan",
        "jadwal_mulai_penugasan",
        "jadwal_akhir_penugasan",
        "surat_keterangan_penugasan",
        "status"
    ]; 
}
