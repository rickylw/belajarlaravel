<?php 
namespace App; 
use Illuminate\Database\Eloquent\Model; 
class Penugasan extends Model 
{ 
    protected $table = 'tbl_penugasan';
 protected $fillable = [ 
 "nama",  
 "jabatan",
 "pekerjaan",
 "jenispenugasan",
 "deskripsipenugasan",
 "email",
 "hp",
 "hari",
 "tanggal"
 ]; 
} 
?>