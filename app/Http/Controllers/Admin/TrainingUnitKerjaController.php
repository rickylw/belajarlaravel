<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\TrainingUnitKerja; 
use PDF;

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

    public function cetakSIP($id){
        $trainingUnitKerja = DB::table('tbl_training_unitkerja')
                       ->join('tbl_dataunitkerja as t1', 'tbl_training_unitkerja.id_unitkerja', '=', 't1.id')
                       ->join('tbl_dataunitkerja as t2', 'tbl_training_unitkerja.diajukan_oleh', '=', 't2.id')
                       ->select(DB::raw('tbl_training_unitkerja.*, t1.nama as nama_unitkerja, t2.nama as nama_diajukan_oleh, t1.jabatan as jabatan'))
                       ->where('tbl_training_unitkerja.id', $id)->first();

        $pdf = PDF::loadView('pdf/surat-izin-pelatihan-unitkerja', compact('trainingUnitKerja'));

        //make direktori
        $path = public_path().'/storage/pelatihan';
        if(!File_exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $namefile = 'surat_izin_pelatihan'. date("Y_m_d_H_i_s") .'.pdf';
        $inputs['surat_izin_pelatihan'] = 'storage/pelatihan/'.$namefile;
        $pdf->save($inputs['surat_izin_pelatihan']);

        $tmp = TrainingUnitKerja::where('id', $id)->first();

        $tmp->surat_izin_pelatihan = $inputs['surat_izin_pelatihan'];
        $tmp->save(); 
        return redirect()->route("admin.training-unitkerja.detail", $id)->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
