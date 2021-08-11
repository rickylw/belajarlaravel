<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\LemburUnitKerja; 
use PDF;

class LemburUnitKerjaController extends Controller
{
    public function index() {
        $lemburUnitKerja = DB::table('tbl_lembur_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_lembur_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_lembur_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->paginate(10);
        return view('admin.lembur-unitkerja.index', compact('lemburUnitKerja'));
    }

    public function detail($id){
        $lemburUnitKerja = DB::table('tbl_lembur_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_lembur_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_lembur_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('tbl_lembur_unitkerja.id', $id)->first();
        return view('admin.lembur-unitkerja.detail', compact('lemburUnitKerja'));
    }

    public function submit($id, $status){
        $tmp = LemburUnitKerja::where('id', $id)->first();
        
        if($status == 1){
            $lemburUnitKerja = DB::table('tbl_lembur_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_lembur_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_lembur_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, tbl_dataunitkerja.jabatan as jabatan'))
                       ->where('tbl_lembur_unitkerja.id', $id)->first();
    
            $pdf = PDF::loadView('pdf/surat-keterangan-lembur-unitkerja', compact('lemburUnitKerja'));

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

        return redirect()->route("admin.lembur-unitkerja.detail", $id)->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
