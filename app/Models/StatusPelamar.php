<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPelamar extends Model
{
    protected $table = 'tbl_status_ppelamar';
    protected $fillable = [ 
        "nama"
    ]; 
}
