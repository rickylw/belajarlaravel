<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LemburPegawai extends Model
{
    protected $table = 'tbl_lembur_pegawai';
    protected $fillable = [ 
        "id_pegawai",
        "jadwal_mulai_lembur",
        "jadwal_selesai_lembur",
        "surat_keterangan_lembur",
        "status",
        "diacc_oleh",
        "deskripsi"
    ]; 
}
