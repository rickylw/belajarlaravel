<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PensiunUnitKerja extends Model
{
    protected $table = 'tbl_pensiun_unitkerja';
    protected $fillable = [ 
        "id_unitkerja",
        "analisis_sdm",
        "surat_keterangan_pensiun",
        "status"
    ]; 
}
