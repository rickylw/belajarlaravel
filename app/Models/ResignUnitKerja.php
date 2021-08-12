<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResignUnitKerja extends Model
{
    protected $table = 'tbl_resign_unitkerja';
    protected $fillable = [ 
        "id_unitkerja",
        "alasan_pengunduran_diri",
        "analisis_sdm",
        "diketahui_sdm",
        "diketahui_pimpinan",
        "status",
        "waktu_berhenti",
        "surat_keterangan_resign"
    ];
}
