<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PensiunPegawai extends Model
{
    protected $table = 'tbl_pensiun_pegawai';
    protected $fillable = [ 
        "id_pegawai",
        "analisis_sdm",
        "surat_keterangan_pensiun",
        "status"
    ]; 
}
