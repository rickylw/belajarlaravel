<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanPerpanjanganKontrakUnitKerja extends Model
{
    protected $table = 'tbl_perpanjangan_kontrak_unitkerja';
    protected $fillable = [ 
        "id_kontrak_unitkerja",
        "analisis_sdm",
        "keputusan_pimpinan",
        "status"
    ]; 
}
