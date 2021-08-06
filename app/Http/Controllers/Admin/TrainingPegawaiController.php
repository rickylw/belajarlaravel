<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TrainingPegawai; 

class TrainingPegawaiController extends Controller
{
    public function index() {
        $trainingPegawai = DB::table('tbl_training_pegawai')
                       ->join('tbl_datapegawai', 'tbl_training_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_training_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->paginate(10);
        return view('admin.training-pegawai.index', compact('trainingPegawai'));
    }

    public function detail($id){
        $trainingPegawai = DB::table('tbl_training_pegawai')
                       ->join('tbl_datapegawai', 'tbl_training_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->join('tbl_dataunitkerja', 'tbl_training_pegawai.diajukan_oleh', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_training_pegawai.*, tbl_datapegawai.nama as nama_pegawai, tbl_dataunitkerja.nama as nama_diajukan_oleh'))
                       ->where('tbl_training_pegawai.id', $id)->first();
        return view('admin.training-pegawai.detail', compact('trainingPegawai'));
    }

    public function forward($id){
        $trainingPegawai = TrainingPegawai::where('id', $id)->first();
        $trainingPegawai->diketahui_sdm = date('Y-m-d H:i:s');
        $trainingPegawai->save();

        return redirect()->route("admin.training-pegawai.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }
}
