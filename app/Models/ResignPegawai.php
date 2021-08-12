<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResignPegawai extends Model
{
    protected $table = 'tbl_resign_pegawai';
    protected $fillable = [ 
        "id_pegawai",
        "alasan_pengunduran_diri",
        "analisis_sdm",
        "diketahui_sdm",
        "diketahui_pimpinan",
        "status",
        "waktu_berhenti",
        "surat_keterangan_resign"
    ];
}
