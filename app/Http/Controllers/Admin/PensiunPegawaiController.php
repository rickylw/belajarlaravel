<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KontrakPegawai; 
use App\Models\DataPegawai; 
use App\Models\PensiunPegawai; 
use Illuminate\Support\Facades\DB;

class PensiunPegawaiController extends Controller
{
    public function index(){
        $pegawai = DB::table('tbl_datapegawai')
                    ->leftJoin('tbl_pensiun_pegawai', 'tbl_pensiun_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*'))
                    ->whereNull('tbl_pensiun_pegawai.id')
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
                    ->select(DB::raw('tbl_datapegawai.*, tbl_pensiun_pegawai.analisis_sdm as analisis_sdm, tbl_pensiun_pegawai.id as id_pensiun'))
                    ->paginate(10);
        return view('admin.pengajuan-pensiun-pegawai.index', compact('pegawai'));
    }

    public function pengajuanDetail($id){
        $pegawai = DB::table('tbl_datapegawai')
                    ->join('tbl_pensiun_pegawai', 'tbl_pensiun_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_pensiun_pegawai.analisis_sdm as analisis_sdm, tbl_pensiun_pegawai.status as status_pensiun'))
                    ->where('tbl_pensiun_pegawai.id',$id)->first();
        return view('admin.pengajuan-pensiun-pegawai.detail', compact('pegawai'));
    }
}
