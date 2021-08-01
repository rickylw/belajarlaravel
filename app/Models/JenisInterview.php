<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisInterview extends Model
{
    public $timestamps = false;
    protected $table = 'tbl_jenis_interview';
    protected $fillable = [ 
        "nama",
    ]; 
}
