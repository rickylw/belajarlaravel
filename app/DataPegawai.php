<?php 
namespace App; 
use Illuminate\Database\Eloquent\Model; 
class Datapegawai extends Model 
{ 
    protected $table = 'tbl_datapegawai';
 protected $fillable = [ 
    'name',
    'alamat',
    'tempatlahir', 
    'tanggal_lahir',
    'pendidikan',
    'programstudi',
    'tahunkelulusan',
    'jabatan',
    'tanggalsk',
    'foto',
    'email',
    'hp'
 ]; 
} 
?>