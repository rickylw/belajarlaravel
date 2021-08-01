<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilInterview extends Model
{
    protected $table = 'tbl_hasil_interview';
    protected $fillable = [ 
        "hasil_interview", 
        "lampiran", 
        "jenis_interview", 
        "status", 
        "id_pelamar",
        "id_jenis_interview"
    ];
}
