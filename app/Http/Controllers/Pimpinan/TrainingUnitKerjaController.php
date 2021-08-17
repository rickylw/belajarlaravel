<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TrainingUnitKerja; 

class TrainingUnitKerjaController extends Controller
{
    public function index() {
        $trainingUnitKerja = DB::table('tbl_training_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_training_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_training_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('tbl_training_unitkerja.status', 0)
                       ->whereNotNull('tbl_training_unitkerja.diketahui_sdm')
                       ->paginate(10);
        return view('pimpinan.training-unitkerja.index', compact('trainingUnitKerja'));
    }

    public function detail($id){
        $trainingUnitKerja = DB::table('tbl_training_unitkerja')
                       ->join('tbl_dataunitkerja as t1', 'tbl_training_unitkerja.id_unitkerja', '=', 't1.id')
                       ->join('tbl_dataunitkerja as t2', 'tbl_training_unitkerja.diajukan_oleh', '=', 't2.id')
                       ->select(DB::raw('tbl_training_unitkerja.*, t1.nama as nama_unitkerja, t2.nama as nama_diajukan_oleh'))
                       ->where('tbl_training_unitkerja.id', $id)->first();
        return view('pimpinan.training-unitkerja.detail', compact('trainingUnitKerja'));
    }
    
    public function submit($id, $status) {
        $now = DB::select('select now() as date')[0]->date;
        $trainingUnitKerja = TrainingUnitKerja::where('id', $id)->first();
        $trainingUnitKerja->diketahui_pimpinan = $now;
        $trainingUnitKerja->status = $status;
        $trainingUnitKerja->save();

        return redirect()->route("pimpinan.training-unitkerja.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }
}
