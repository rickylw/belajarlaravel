<?php 
namespace App; 
use Illuminate\Database\Eloquent\Model; 
class Mutasipegawai extends Model 
{ 
    protected $table = 'tbl_mutasipegawai';
 protected $fillable = [ 
 "nama",  
 "jabatan",
 "pekerjaan",
 "mutasitujuan",
 "deskripsimutasipegawai",
 "email",
 "hp",
 "hari",
 "tanggal"
 ]; 
} 
?>