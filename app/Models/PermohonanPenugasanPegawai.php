<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanPenugasanPegawai extends Model
{
    protected $table = 'tbl_permohonan_penugasan_pegawai';
    protected $fillable = [ 
        "id_pegawai",
        "judul",
        "deskripsi_penugasan"
    ]; 
}
