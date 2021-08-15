<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermohonanPenugasanPegawai; 
use App\Models\DataPegawai; 
use Illuminate\Support\Facades\Auth;

class PermohonanPenugasanController extends Controller
{
    public function index() {
        $pegawaiLogin = DataPegawai::where('id_user', Auth::id())->first();
        $permohonanPegawai = PermohonanPenugasanPegawai::where('id_pegawai', $pegawaiLogin->id)->paginate(10);
        return view('pegawai.permohonan-penugasan.index', compact('permohonanPegawai'));
    }
    
    public function edit($id) {
        $permohonanPegawai = PermohonanPenugasanPegawai::where('id', $id)->first();
        return view('pegawai.permohonan-penugasan.edit', compact('permohonanPegawai'));
    }

    public function create() 
    { 
        return view("pegawai.permohonan-penugasan.create"); 
    } 

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'judul' => 'required',
            'editor' => 'required'
        ]);

        $pegawaiLogin = DataPegawai::where('id_user', Auth::id())->first();

        $permohonanPegawai = new PermohonanPenugasanPegawai();
        $permohonanPegawai->id_pegawai = $pegawaiLogin->id;
        $permohonanPegawai->judul = $request->judul;
        $permohonanPegawai->deskripsi_penugasan = $request->editor;
        $permohonanPegawai->save();

        return redirect()->route("pegawai.permohonan-penugasan.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function delete($id){
        $permohonanPegawai = PermohonanPenugasanPegawai::where('id', $id)->delete();
        return redirect()->route("pegawai.permohonan-penugasan.index")->with( 
            "success", 
            "Data berhasil dihapus." 
        ); 
    }

    public function update(Request $request, $id) 
    { 
        $this->validate($request, [ 
            'judul' => 'required',
            'editor' => 'required'
        ]);

        $permohonanPegawai = PermohonanPenugasanPegawai::where('id', $id)->first();
        $permohonanPegawai->judul = $request->judul;
        $permohonanPegawai->deskripsi_penugasan = $request->editor;
        $permohonanPegawai->save();

        return redirect()->route("pegawai.permohonan-penugasan.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 
}
