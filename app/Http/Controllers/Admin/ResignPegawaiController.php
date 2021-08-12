<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResignPegawai; 
use App\Models\DataPegawai; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class ResignPegawaiController extends Controller
{
    public function index() {
        $resignPegawai = DB::table('tbl_resign_pegawai')
                       ->join('tbl_datapegawai', 'tbl_resign_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_resign_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->paginate(10);
        return view('admin.resign-pegawai.index', compact('resignPegawai'));
    }

    public function create() 
    { 
        return view("admin.resign-pegawai.create"); 
    } 

    public function detail($id){
        $resignPegawai = DB::table('tbl_resign_pegawai')
                       ->join('tbl_datapegawai', 'tbl_resign_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_resign_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->where('tbl_resign_pegawai.id', $id)->first();
        return view('admin.resign-pegawai.detail', compact('resignPegawai'));
    }

    public function submit(Request $request, $id){
        $this->validate($request, [ 
            'editor' => 'required'
        ]);

        $resignPegawai = ResignPegawai::where('id', $id)->first();
        $resignPegawai->diketahui_sdm = date('Y-m-d H:i:s');
        $resignPegawai->analisis_sdm = $request->editor;
        $resignPegawai->save();

        return redirect()->route("admin.resign-pegawai.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }

    public function cetakSK($id){
        $resignPegawai = DB::table('tbl_resign_pegawai')
                       ->join('tbl_datapegawai', 'tbl_resign_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_resign_pegawai.*, tbl_datapegawai.nama as nama_pegawai, tbl_datapegawai.created_at as awal_masuk, tbl_datapegawai.jabatan as jabatan'))
                       ->where('tbl_resign_pegawai.id', $id)->first();

        $pdf = PDF::loadView('pdf/surat-keterangan-resign-pegawai', compact('resignPegawai'));

        //make direktori
        $path = public_path().'/storage/resign';
        if(!File_exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $namefile = 'surat_keterangan_resign'. date("Y_m_d_H_i_s") .'.pdf';
        $inputs['surat_keterangan_resign'] = 'storage/resign/'.$namefile;
        $pdf->save($inputs['surat_keterangan_resign']);

        $tmp = ResignPegawai::where('id', $id)->first();

        $tmp->surat_keterangan_resign = $inputs['surat_keterangan_resign'];
        $tmp->save(); 
        return redirect()->route("admin.resign-pegawai.detail", $id)->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
