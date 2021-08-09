<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'tbl_pesan';
    protected $fillable = [ 
        "subjek",
        "isi_pesan",
        "dari_user",
        "ke_user",
        "isi_pesan",
        "dibaca"
    ]; 
}
