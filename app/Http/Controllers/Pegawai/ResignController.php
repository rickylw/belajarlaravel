<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResignPegawai; 
use App\Models\DataPegawai; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResignController extends Controller
{
    public function index() {
        $pegawaiLogin = DataPegawai::where('id_user', Auth::id())->first();
        $resignPegawai = DB::table('tbl_resign_pegawai')
                       ->join('tbl_datapegawai', 'tbl_resign_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_resign_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->where('tbl_resign_pegawai.id_pegawai', $pegawaiLogin->id)
                       ->paginate(10);
        return view('pegawai.resign.index', compact('resignPegawai'));
    }
    
    public function create() 
    { 
        return view("pegawai.resign.create"); 
    } 
    
    public function edit($id) {
        $resignPegawai = DB::table('tbl_resign_pegawai')
                       ->join('tbl_datapegawai', 'tbl_resign_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_resign_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->where('tbl_resign_pegawai.id', $id)->first();
        return view('pegawai.resign.edit', compact('resignPegawai'));
    }

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'waktu_berhenti' => 'required',
            'editor' => 'required'
        ]);

        $pegawaiLogin = DataPegawai::where('id_user', Auth::id())->first();

        $resignPegawai = new ResignPegawai();
        $resignPegawai->id_pegawai = $pegawaiLogin->id;
        $resignPegawai->waktu_berhenti = $request->waktu_berhenti;
        $resignPegawai->alasan_pengunduran_diri = $request->editor;
        $resignPegawai->status = 0;
        $resignPegawai->save();

        return redirect()->route("pegawai.resign.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function update(Request $request, $id) 
    { 
        $this->validate($request, [ 
            'waktu_berhenti' => 'required',
            'editor' => 'required'
        ]);

        $resignPegawai = ResignPegawai::where('id', $id)->first();
        $resignPegawai->waktu_berhenti = $request->waktu_berhenti;
        $resignPegawai->alasan_pengunduran_diri = $request->editor;
        $resignPegawai->save();

        return redirect()->route("pegawai.resign.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function delete($id){
        $resignPegawai = ResignPegawai::where('id', $id)->delete();
        return redirect()->route("pegawai.resign.index")->with( 
            "success", 
            "Data berhasil dihapus." 
        ); 
    }
    
}
