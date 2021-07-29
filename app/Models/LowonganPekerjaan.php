<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganPekerjaan extends Model
{
    //status
    //1 = aktif, 0 = tidak aktif
    protected $table = 'tbl_lowongan_pekerjaan';
    protected $fillable = [ 
        "judul",
        "deskripsi",
        "status"
    ]; 
}
