<?php 
namespace App; 
use Illuminate\Database\Eloquent\Model; 
class Datapengajuan extends Model 
{ 
    protected $table = 'datapengajuan';
 protected $fillable = [ 
 "nama", 
 "posisi" 
 ]; 
} 
?>