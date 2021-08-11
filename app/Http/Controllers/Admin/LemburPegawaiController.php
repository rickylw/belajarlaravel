<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\LemburPegawai; 
use PDF;

class LemburPegawaiController extends Controller
{
    public function index() {
        $lemburPegawai = DB::table('tbl_lembur_pegawai')
                       ->join('tbl_datapegawai', 'tbl_lembur_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_lembur_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->paginate(10);
        return view('admin.lembur-pegawai.index', compact('lemburPegawai'));
    }

    public function detail($id){
        $lemburPegawai = DB::table('tbl_lembur_pegawai')
                       ->join('tbl_datapegawai', 'tbl_lembur_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_lembur_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->where('tbl_lembur_pegawai.id', $id)->first();
        return view('admin.lembur-pegawai.detail', compact('lemburPegawai'));
    }

    public function submit($id, $status){
        $tmp = LemburPegawai::where('id', $id)->first();
        
        if($status == 1){
            $lemburPegawai = DB::table('tbl_lembur_pegawai')
                       ->join('tbl_datapegawai', 'tbl_lembur_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_lembur_pegawai.*, tbl_datapegawai.nama as nama_pegawai, tbl_datapegawai.jabatan as jabatan'))
                       ->where('tbl_lembur_pegawai.id', $id)->first();
    
            $pdf = PDF::loadView('pdf/surat-keterangan-lembur-pegawai', compact('lemburPegawai'));

            //make direktori
            $path = public_path().'/storage/lembur';
            if(!File_exists($path)){
                File::makeDirectory($path, $mode = 0777, true, true);
            }           

            $namefile = 'surat_keterangan_lembur'. date("Y_m_d_H_i_s") .'.pdf';
            $inputs['surat_keterangan_lembur'] = 'storage/lembur/'.$namefile;
            $pdf->save($inputs['surat_keterangan_lembur']);

            $tmp->surat_keterangan_lembur = $inputs['surat_keterangan_lembur'];
        }
        
        $tmp->status = $status;
        $tmp->diacc_oleh = Auth::id();
        $tmp->save();

        return redirect()->route("admin.lembur-pegawai.detail", $id)->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
