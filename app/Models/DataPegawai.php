<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Model; 
class Datapegawai extends Model 
{ 
    protected $table = 'tbl_datapegawai';
   protected $fillable = [ 
      'nip',
      'nama',
      'alamat', 
      'tempat_lahir',
      'tanggal_lahir',
      'no_ktp',
      'jenis_kelamin',
      'status',
      'jabatan',
      'agama',
      'no_hp',
      'email',
      'foto_diri',
      'tanggal_sk',
      'pendidikan',
      'program_studi',
      'tahun_kelulusan',
      'id_user',
      'id_pelamar',
      'sk_pegawai_tetap'
   ]; 
} 
?>