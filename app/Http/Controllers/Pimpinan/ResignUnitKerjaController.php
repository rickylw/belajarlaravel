<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResignUnitKerja; 
use App\Models\DataUnitKerja; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResignUnitKerjaController extends Controller
{
    public function index() {
        $resignUnitKerja = DB::table('tbl_resign_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_resign_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_resign_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('tbl_resign_unitkerja.status', 0)
                       ->whereNotNull('tbl_resign_unitkerja.diketahui_sdm')
                       ->paginate(10);
        return view('pimpinan.resign-unitkerja.index', compact('resignUnitKerja'));
    }

    public function detail($id){
        $resignUnitKerja = DB::table('tbl_resign_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_resign_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_resign_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('tbl_resign_unitkerja.id', $id)
                       ->first();
        return view('pimpinan.resign-unitkerja.detail', compact('resignUnitKerja'));
    }

    public function submit($id, $status) {
        $resignUnitKerja = ResignUnitKerja::where('id', $id)->first();
        $resignUnitKerja->diketahui_pimpinan = date('Y-m-d H:i:s');
        $resignUnitKerja->status = $status;
        $resignUnitKerja->save();

        return redirect()->route("pimpinan.resign-pegawai.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }
}
