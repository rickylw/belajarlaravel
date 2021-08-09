<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPegawai; 
use App\Models\DataUnitKerja; 
use App\Models\MutasiPegawai; 
use App\Models\User; 
use Illuminate\Support\Facades\Auth;

class MutasiPegawaiController extends Controller
{
    public function index() {
        return view('admin.mutasi-pegawai.index');
    }

    public function create(){
        $pegawai = DataPegawai::where('status', 1)->get();
        return view('admin.mutasi-pegawai.create', compact('pegawai'));
    }
    
    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'pegawai' => 'required', 
            'editor' => 'required',
        ]);

        $pegawai = DataPegawai::where('id', $request->pegawai)->first();

        //Jika tidak memilih jenis mutasi
        if($request->cb_pekerjaan == null && $request->cb_jabatan == null){
            return redirect()->route("admin.mutasi-pegawai.create")->with( 
            "failed", 
            "Data gagal disimpan." 
            ); 
        }
        else if($request->cb_pekerjaan == null && $request->cb_jabatan == "on"){
            $this->validate($request, [ 
                'jabatan_tujuan' => 'required', 
            ]);

            $mutasiPegawai = new MutasiPegawai();
            $mutasiPegawai->id_pegawai = $pegawai->id;
            $mutasiPegawai->pekerjaan_awal = "pegawai";
            $mutasiPegawai->jabatan_awal = $pegawai->jabatan;
            $mutasiPegawai->pekerjaan_tujuan = "pegawai";
            $mutasiPegawai->jabatan_tujuan = $request->jabatan_tujuan;
            $mutasiPegawai->deskripsi = $request->editor;
            $mutasiPegawai->dimutasi_oleh = Auth::id();
            $mutasiPegawai->save();

            $pegawai->jabatan = $request->jabatan_tujuan;
            $pegawai->save();
        }
        else if($request->cb_pekerjaan == "on" && $request->cb_jabatan == null){
            $mutasiPegawai = new MutasiPegawai();
            $mutasiPegawai->id_pegawai = $pegawai->id;
            $mutasiPegawai->pekerjaan_awal = "pegawai";
            $mutasiPegawai->jabatan_awal = $pegawai->jabatan;
            $mutasiPegawai->pekerjaan_tujuan = "unit kerja";
            $mutasiPegawai->jabatan_tujuan = $pegawai->jabatan;
            $mutasiPegawai->deskripsi = $request->editor;
            $mutasiPegawai->dimutasi_oleh = Auth::id();
            $mutasiPegawai->save();

            $user = User::where('id', $pegawai->id_user)->first();
            $user->role = "unitkerja";
            $user->save();

            $pegawai->status = 0;
            $pegawai->save();

            //cek apakah pernah menjadi unit kerja
            $tmp = DataUnitKerja::where('id_user', $pegawai->id_user)->first();
            if($tmp == null){
                $unitkerja = new DataUnitKerja();
            }
            else{
                $unitkerja = DataUnitKerja::where('id_user', $pegawai->id_user)->first();
            }

            $unitkerja->nip = $pegawai->nip;
            $unitkerja->nama = $pegawai->nama;
            $unitkerja->alamat = $pegawai->alamat;
            $unitkerja->tempat_lahir = $pegawai->tempat_lahir;
            $unitkerja->tanggal_lahir = $pegawai->tanggal_lahir;
            $unitkerja->no_ktp = $pegawai->no_ktp;
            $unitkerja->jenis_kelamin = $pegawai->jenis_kelamin;
            $unitkerja->status = 1;
            $unitkerja->jabatan = $pegawai->jabatan;
            $unitkerja->agama = $pegawai->agama;
            $unitkerja->no_hp = $pegawai->no_hp;
            $unitkerja->email = $pegawai->email;
            $unitkerja->foto_diri = $pegawai->foto_diri;
            $unitkerja->tanggal_sk = $pegawai->tanggal_sk;
            $unitkerja->pendidikan = $pegawai->pendidikan;
            $unitkerja->program_studi = $pegawai->program_studi;
            $unitkerja->tahun_kelulusan = $pegawai->tahun_kelulusan;
            $unitkerja->id_user = $pegawai->id_user;
            $unitkerja->id_pelamar = $pegawai->id_pelamar;
            $unitkerja->save();
        }
        else if($request->cb_pekerjaan == "on" && $request->cb_jabatan == "on"){
            dd("kena");
        }

        return redirect()->route("admin.mutasi-pegawai.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 
}
