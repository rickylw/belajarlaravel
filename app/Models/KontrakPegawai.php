<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontrakPegawai extends Model
{
    protected $table = 'tbl_kontrak_pegawai';
    protected $fillable = [ 
        "lama_kontrak",
        "id_pegawai",
        "status",
        "tanggal_habis_kontrak"
    ]; 
}
