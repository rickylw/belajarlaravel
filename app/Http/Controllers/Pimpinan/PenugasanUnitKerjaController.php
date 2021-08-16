<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataUnitKerja; 
use App\Models\PenugasanUnitKerja; 
use Illuminate\Support\Facades\DB;

class PenugasanUnitKerjaController extends Controller
{
    public function index() {
        $penugasanUnitKerja = DB::table('tbl_penugasan_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_penugasan_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_penugasan_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, tbl_dataunitkerja.nip as nip'))
                       ->where('tbl_penugasan_unitkerja.status', 0)
                       ->paginate(10);
        return view('pimpinan.penugasan-unitkerja.index', compact('penugasanUnitKerja'));
    }

    public function detail($id){
        $penugasanUnitKerja = DB::table('tbl_penugasan_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_penugasan_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_penugasan_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, tbl_dataunitkerja.nip as nip'))
                       ->where('tbl_penugasan_unitkerja.status', 0)
                       ->where('tbl_penugasan_unitkerja.id', $id)->first();
        return view('pimpinan.penugasan-unitkerja.detail', compact('penugasanUnitKerja'));
    }

    public function submit($id, $status) {
        $penugasanUnitKerja = PenugasanUnitKerja::where('id', $id)->first();
        $penugasanUnitKerja->status = $status;
        $penugasanUnitKerja->save();

        return redirect()->route("pimpinan.penugasan-unitkerja.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }
}
