<?php

namespace App\Http\Controllers\Unitkerja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResignUnitKerja; 
use App\Models\DataUnitKerja; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResignController extends Controller
{
    public function index() {
        $unitkerjaLogin = DataUnitKerja::where('id_user', Auth::id())->first();
        $resignUnitKerja = DB::table('tbl_resign_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_resign_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_resign_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('tbl_resign_unitkerja.id_unitkerja', $unitkerjaLogin->id)
                       ->paginate(10);
        return view('unitkerja.resign.index', compact('resignUnitKerja'));
    }

    public function create() 
    { 
        return view("unitkerja.resign.create"); 
    } 
    
    public function edit($id) {
        $resignUnitKerja = DB::table('tbl_resign_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_resign_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_resign_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('tbl_resign_unitkerja.id', $id)->first();
        return view('unitkerja.resign.edit', compact('resignUnitKerja'));
    }

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'waktu_berhenti' => 'required',
            'editor' => 'required'
        ]);

        $unitkerjaLogin = DataUnitKerja::where('id_user', Auth::id())->first();

        $resignUnitKerja = new ResignUnitKerja();
        $resignUnitKerja->id_unitkerja = $unitkerjaLogin->id;
        $resignUnitKerja->waktu_berhenti = $request->waktu_berhenti;
        $resignUnitKerja->alasan_pengunduran_diri = $request->editor;
        $resignUnitKerja->status = 0;
        $resignUnitKerja->save();

        return redirect()->route("unitkerja.resign.index")->with( 
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

        $resignUnitKerja = ResignUnitKerja::where('id', $id)->first();
        $resignUnitKerja->waktu_berhenti = $request->waktu_berhenti;
        $resignUnitKerja->alasan_pengunduran_diri = $request->editor;
        $resignUnitKerja->save();

        return redirect()->route("unitkerja.resign.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function delete($id){
        $resignUnitKerja = ResignUnitKerja::where('id', $id)->delete();
        return redirect()->route("unitkerja.resign.index")->with( 
            "success", 
            "Data berhasil dihapus." 
        ); 
    }
}
