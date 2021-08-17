<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\TrainingPegawai; 
use PDF;

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
        $now = DB::select('select now() as date')[0]->date;
        $trainingPegawai = TrainingPegawai::where('id', $id)->first();
        $trainingPegawai->diketahui_sdm = $now;
        $trainingPegawai->save();

        return redirect()->route("admin.training-pegawai.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }

    public function cetakSIP($id){
        $trainingPegawai = DB::table('tbl_training_pegawai')
                       ->join('tbl_datapegawai', 'tbl_training_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->join('tbl_dataunitkerja', 'tbl_training_pegawai.diajukan_oleh', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_training_pegawai.*, tbl_datapegawai.nama as nama_pegawai, tbl_dataunitkerja.nama as nama_diajukan_oleh, tbl_datapegawai.jabatan as jabatan'))
                       ->where('tbl_training_pegawai.id', $id)->first();

        $pdf = PDF::loadView('pdf/surat-izin-pelatihan-pegawai', compact('trainingPegawai'));

        //make direktori
        $path = public_path().'/storage/pelatihan';
        if(!File_exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $namefile = 'surat_izin_pelatihan'. date("Y_m_d_H_i_s") .'.pdf';
        $inputs['surat_izin_pelatihan'] = 'storage/pelatihan/'.$namefile;
        $pdf->save($inputs['surat_izin_pelatihan']);

        $tmp = TrainingPegawai::where('id', $id)->first();

        $tmp->surat_izin_pelatihan = $inputs['surat_izin_pelatihan'];
        $tmp->save(); 
        return redirect()->route("admin.training-pegawai.detail", $id)->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
