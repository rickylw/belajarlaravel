<?php

namespace App\Http\Controllers\Unitkerja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LemburUnitKerja; 
use App\Models\DataUnitKerja; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LemburController extends Controller
{
    public function index() {
        $unitkerjaLogin = DataUnitKerja::where('id_user', Auth::id())->first();
        $lemburUnitKerja = DB::table('tbl_lembur_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_lembur_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_lembur_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('tbl_lembur_unitkerja.id_unitkerja', $unitkerjaLogin->id)
                       ->paginate(10);
        return view('unitkerja.lembur.index', compact('lemburUnitKerja'));
    }

    public function edit($id) {
        $lemburUnitKerja = DB::table('tbl_lembur_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_lembur_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_lembur_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('tbl_lembur_unitkerja.id', $id)->first();
        return view('unitkerja.lembur.edit', compact('lemburUnitKerja'));
    }

    public function create() 
    { 
        return view("unitkerja.lembur.create"); 
    } 

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'tanggal_lembur' => 'required',
            'waktu_mulai_lembur' => 'required',
            'waktu_selesai_lembur' => 'required',
            'editor' => 'required',
        ]);

        $unitkerjaLogin = DataUnitKerja::where('id_user', Auth::id())->first();

        $lemburUnitKerja = new LemburUnitKerja();
        $lemburUnitKerja->id_unitkerja = $unitkerjaLogin->id;
        $lemburUnitKerja->jadwal_mulai_lembur = $request->tanggal_lembur. ' ' . $request->waktu_mulai_lembur;
        $lemburUnitKerja->jadwal_selesai_lembur = $request->tanggal_lembur. ' ' . $request->waktu_selesai_lembur;
        $lemburUnitKerja->deskripsi = $request->editor;
        $lemburUnitKerja->status = 0;
        $lemburUnitKerja->save();

        return redirect()->route("unitkerja.lembur.index")->with( 
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

        $lemburUnitKerja = LemburUnitKerja::where('id', $id)->first();
        $lemburUnitKerja->jadwal_mulai_lembur = $request->tanggal_lembur. ' ' . $request->waktu_mulai_lembur;
        $lemburUnitKerja->jadwal_selesai_lembur = $request->tanggal_lembur. ' ' . $request->waktu_selesai_lembur;
        $lemburUnitKerja->deskripsi = $request->editor;
        $lemburUnitKerja->save();

        return redirect()->route("unitkerja.lembur.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function delete($id){
        $lemburUnitKerja = LemburUnitKerja::where('id', $id)->delete();
        return redirect()->route("unitkerja.lembur.index")->with( 
            "success", 
            "Data berhasil dihapus." 
        ); 
    }

}
