<?php 
namespace App; 
use Illuminate\Database\Eloquent\Model; 
class Resign extends Model 
{ 
    protected $table = 'tbl_resign';
    protected $fillable = [ 
        'nama' => 'required', 
        'nip' => 'required', 
        'jabatan' => 'required',
        'pekerjaan' => 'required',
        'hari' => 'required',
        'tanggal' => 'required',
        'alamat' => 'required'
  ]; 
} 
?>