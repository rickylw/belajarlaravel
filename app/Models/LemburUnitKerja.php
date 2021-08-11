<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LemburUnitKerja extends Model
{
    protected $table = 'tbl_lembur_unitkerja';
    protected $fillable = [ 
        "id_unitkerja",
        "jadwal_mulai_lembur",
        "jadwal_selesai_lembur",
        "surat_keterangan_lembur",
        "status",
        "diacc_oleh",
        "deskripsi"
    ]; 
}
