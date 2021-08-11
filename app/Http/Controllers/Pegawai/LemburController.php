<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LemburPegawai; 
use App\Models\DataPegawai; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LemburController extends Controller
{
    public function index() {
        $pegawaiLogin = DataPegawai::where('id_user', Auth::id())->first();
        $lemburPegawai = DB::table('tbl_lembur_pegawai')
                       ->join('tbl_datapegawai', 'tbl_lembur_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_lembur_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->where('tbl_lembur_pegawai.id_pegawai', $pegawaiLogin->id)
                       ->paginate(10);
        return view('pegawai.lembur.index', compact('lemburPegawai'));
    }

    public function edit($id) {
        $lemburPegawai = DB::table('tbl_lembur_pegawai')
                       ->join('tbl_datapegawai', 'tbl_lembur_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_lembur_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->where('tbl_lembur_pegawai.id', $id)->first();
        return view('pegawai.lembur.edit', compact('lemburPegawai'));
    }
    
    public function create() 
    { 
        return view("pegawai.lembur.create"); 
    } 

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'tanggal_lembur' => 'required',
            'waktu_mulai_lembur' => 'required',
            'waktu_selesai_lembur' => 'required',
            'editor' => 'required',
        ]);

        $pegawaiLogin = DataPegawai::where('id_user', Auth::id())->first();

        $lemburPegawai = new LemburPegawai();
        $lemburPegawai->id_pegawai = $pegawaiLogin->id;
        $lemburPegawai->jadwal_mulai_lembur = $request->tanggal_lembur. ' ' . $request->waktu_mulai_lembur;
        $lemburPegawai->jadwal_selesai_lembur = $request->tanggal_lembur. ' ' . $request->waktu_selesai_lembur;
        $lemburPegawai->deskripsi = $request->editor;
        $lemburPegawai->status = 0;
        $lemburPegawai->save();

        return redirect()->route("pegawai.lembur.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function update(Request $request, $id) 
    { 
        $this->validate($request, [ 
            'tanggal_lembur' => 'required',
            'waktu_mulai_lembur' => 'required',
            'waktu_selesai_lembur' => 'required',
            'editor' => 'required',
        ]);

        $lemburPegawai = LemburPegawai::where('id', $id)->first();
        $lemburPegawai->jadwal_mulai_lembur = $request->tanggal_lembur. ' ' . $request->waktu_mulai_lembur;
        $lemburPegawai->jadwal_selesai_lembur = $request->tanggal_lembur. ' ' . $request->waktu_selesai_lembur;
        $lemburPegawai->deskripsi = $request->editor;
        $lemburPegawai->save();

        return redirect()->route("pegawai.lembur.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function delete($id){
        $lemburPegawai = LemburPegawai::where('id', $id)->delete();
        return redirect()->route("pegawai.lembur.index")->with( 
            "success", 
            "Data berhasil dihapus." 
        ); 
    }
}
