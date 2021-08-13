<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontrakUnitKerja extends Model
{
    protected $table = 'tbl_kontrak_unitkerja';
    protected $fillable = [ 
        "lama_kontrak",
        "id_unitkerja",
        "status",
        "tanggal_habis_kontrak"
    ]; 
}
