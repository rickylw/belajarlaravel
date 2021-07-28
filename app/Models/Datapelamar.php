<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Model; 
class Datapelamar extends Model 
{ 
    protected $table = 'datapelamar';
    protected $fillable = [ 
        "nama", 
        "tempat_lahir", 
        "tanggal_lahir", 
        "jenis_kelamin", 
        "email",
        "no_hp",
        "foto_kk",
        "foto_ktp",
        "foto_ijazah",
        "foto_diri",
        "foto_skck",
        "surat_keterangan_sehat",
        "surat_pengalaman_kerja",
        "status",
        "id_user"
    ]; 
} 
?>