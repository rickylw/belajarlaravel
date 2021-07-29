<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalTes extends Model
{
    protected $table = 'tbl_jadwal_tes';
    protected $fillable = [ 
        "jadwal_tes",
        "deskripsi",
        "id_pelamar"
    ]; 
}
