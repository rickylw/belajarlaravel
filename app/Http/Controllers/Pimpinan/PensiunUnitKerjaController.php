<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataUnitKerja; 
use App\Models\PensiunUnitKerja; 
use Illuminate\Support\Facades\DB;

class PensiunUnitKerjaController extends Controller
{
    public function index(){
        $unitkerja = DB::table('tbl_dataunitkerja')
                    ->join('tbl_pensiun_unitkerja', 'tbl_pensiun_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_pensiun_unitkerja.analisis_sdm as analisis_sdm, tbl_pensiun_unitkerja.id as id_pensiun'))
                    ->where('tbl_pensiun_unitkerja.status', 0)
                    ->paginate(10);
        return view('pimpinan.pensiun-unitkerja.index', compact('unitkerja'));
    }
    
    public function detail($id){
        $unitkerja = DB::table('tbl_dataunitkerja')
                    ->join('tbl_pensiun_unitkerja', 'tbl_pensiun_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_pensiun_unitkerja.analisis_sdm as analisis_sdm, tbl_pensiun_unitkerja.status as status_pensiun, tbl_pensiun_unitkerja.id as id_pensiun'))
                    ->where('tbl_pensiun_unitkerja.id',$id)->first();
        return view('pimpinan.pensiun-unitkerja.detail', compact('unitkerja'));
    }

    public function submit($id) {
        $pensiunPegawawi = PensiunUnitKerja::where('id', $id)->first();
        $pensiunPegawawi->status = 1;
        $pensiunPegawawi->save();

        return redirect()->route("pimpinan.pensiun-unitkerja.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }
}