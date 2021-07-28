<?php 
namespace App; 
use Illuminate\Database\Eloquent\Model; 
class Training extends Model 
{ 
    protected $table = 'tbl_training';
 protected $fillable = [ 
 "nama",  
 "jabatan",
 "pekerjaan",
 "email",
 "hp",
 "hari",
 "tanggal",
 "namapelatihan"
 ]; 
} 
?>