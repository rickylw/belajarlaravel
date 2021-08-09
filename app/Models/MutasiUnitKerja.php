<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiUnitKerja extends Model
{
    protected $table = 'tbl_mutasi_unitkerja';
    protected $fillable = [ 
        "id_unitkerja",
        "pekerjaan_awal",
        "jabatan_awal",
        "pekerjaan_tujuan",
        "jabatan_tujuan",
        "deskripsi",
        "dimutasi_oleh"
    ]; 
}
