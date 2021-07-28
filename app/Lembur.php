<?php 
namespace App; 
use Illuminate\Database\Eloquent\Model; 
class Lembur extends Model 
{ 
    protected $table = 'tbl_lembur';
 protected $fillable = [ 
 "nama",  
 "jabatan",
 "pekerjaan",
 "hari",
 "tanggal",
 "pukul"
 ]; 
} 
?>