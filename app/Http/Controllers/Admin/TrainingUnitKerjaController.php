<?php

namespace App\Http\Controllers\Admin;

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
                       ->paginate(10);
        return view('admin.training-unitkerja.index', compact('trainingUnitKerja'));
    }

    public function detail($id){
        $trainingUnitKerja = DB::table('tbl_training_unitkerja')
                       ->join('tbl_dataunitkerja as t1', 'tbl_training_unitkerja.id_unitkerja', '=', 't1.id')
                       ->join('tbl_dataunitkerja as t2', 'tbl_training_unitkerja.diajukan_oleh', '=', 't2.id')
                       ->select(DB::raw('tbl_training_unitkerja.*, t1.nama as nama_unitkerja, t2.nama as nama_diajukan_oleh'))
                       ->where('tbl_training_unitkerja.id', $id)->first();
        return view('admin.training-unitkerja.detail', compact('trainingUnitKerja'));
    }

    public function forward($id){
        $trainingUnitKerja = TrainingUnitKerja::where('id', $id)->first();
        $trainingUnitKerja->diketahui_sdm = date('Y-m-d H:i:s');
        $trainingUnitKerja->save();

        return redirect()->route("admin.training-unitkerja.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }
}
