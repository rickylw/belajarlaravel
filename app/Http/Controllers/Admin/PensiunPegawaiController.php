<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KontrakPegawai; 
use App\Models\DataPegawai; 
use App\Models\PensiunPegawai; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class PensiunPegawaiController extends Controller
{
    public function index(){
        $pegawai = DB::table('tbl_datapegawai')
                    ->leftJoin('tbl_pensiun_pegawai', 'tbl_pensiun_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*, (year(now()) - year(tbl_datapegawai.tanggal_lahir)) as selisih_tahun'))
                    ->whereNull('tbl_pensiun_pegawai.id')
                    ->where('tbl_datapegawai.status', 1)
                    ->having('selisih_tahun', '>=', 65)
                    ->paginate(10);                    
        return view('admin.pensiun-pegawai.index', compact('pegawai'));
    }

    public function detail($id){
        $pegawai = DataPegawai::where('id',$id)->first();
        return view('admin.pensiun-pegawai.detail', compact('pegawai'));
    }

    public function forward(Request $request, $id){
        $this->validate($request, [ 
            'editor' => 'required'
        ]);

        $pensiunPegawai = new PensiunPegawai();
        $pensiunPegawai->id_pegawai = $id;
        $pensiunPegawai->analisis_sdm = $request->editor;
        $pensiunPegawai->status = 0;
        $pensiunPegawai->save();
        
        return redirect()->route("admin.pensiun-pegawai.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }

    public function pengajuanIndex(){
        $pegawai = DB::table('tbl_datapegawai')
                    ->join('tbl_pensiun_pegawai', 'tbl_pensiun_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_pensiun_pegawai.analisis_sdm as analisis_sdm, tbl_pensiun_pegawai.id as id_pensiun, (year(now()) - year(tbl_datapegawai.tanggal_lahir)) as selisih_tahun'))
                    ->paginate(10);
        return view('admin.pengajuan-pensiun-pegawai.index', compact('pegawai'));
    }

    public function pengajuanDetail($id){
        $pegawai = DB::table('tbl_datapegawai')
                    ->join('tbl_pensiun_pegawai', 'tbl_pensiun_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_pensiun_pegawai.analisis_sdm as analisis_sdm, tbl_pensiun_pegawai.status as status_pensiun, tbl_pensiun_pegawai.id as id_pensiun, tbl_pensiun_pegawai.surat_keterangan_pensiun as surat_keterangan_pensiun'))
                    ->where('tbl_pensiun_pegawai.id',$id)->first();
        return view('admin.pengajuan-pensiun-pegawai.detail', compact('pegawai'));
    }

    public function cetakSK($id){
        $pensiunPegawai = DB::table('tbl_datapegawai')
                    ->join('tbl_pensiun_pegawai', 'tbl_pensiun_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_pensiun_pegawai.analisis_sdm as analisis_sdm, tbl_pensiun_pegawai.status as status_pensiun, tbl_pensiun_pegawai.id as id_pensiun'))
                    ->where('tbl_pensiun_pegawai.id',$id)->first();

        $pdf = PDF::loadView('pdf/surat-keterangan-pensiun-pegawai', compact('pensiunPegawai'));
        
        //make direktori
        $path = public_path().'/storage/pensiun';
        if(!File_exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $namefile = 'surat_keterangan_pensiun'. date("Y_m_d_H_i_s") .'.pdf';
        $inputs['surat_keterangan_pensiun'] = 'storage/pensiun/'.$namefile;
        $pdf->save($inputs['surat_keterangan_pensiun']);

        $tmp = PensiunPegawai::where('id', $id)->first();

        $tmp->surat_keterangan_pensiun = $inputs['surat_keterangan_pensiun'];
        $tmp->save(); 
        return redirect()->route("admin.pengajuan-pensiun-pegawai.detail", $id)->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
