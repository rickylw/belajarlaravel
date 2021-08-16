<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPegawai; 
use App\Models\PensiunPegawai; 
use Illuminate\Support\Facades\DB;

class PensiunPegawaiController extends Controller
{
    public function index(){
        $pegawai = DB::table('tbl_datapegawai')
                    ->join('tbl_pensiun_pegawai', 'tbl_pensiun_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_pensiun_pegawai.analisis_sdm as analisis_sdm, tbl_pensiun_pegawai.id as id_pensiun'))
                    ->where('tbl_pensiun_pegawai.status', 0)
                    ->paginate(10);
        return view('pimpinan.pensiun-pegawai.index', compact('pegawai'));
    }
    
    public function detail($id){
        $pegawai = DB::table('tbl_datapegawai')
                    ->join('tbl_pensiun_pegawai', 'tbl_pensiun_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_pensiun_pegawai.analisis_sdm as analisis_sdm, tbl_pensiun_pegawai.status as status_pensiun, tbl_pensiun_pegawai.id as id_pensiun'))
                    ->where('tbl_pensiun_pegawai.id',$id)->first();
        return view('pimpinan.pensiun-pegawai.detail', compact('pegawai'));
    }

    public function submit($id) {
        $pensiunPegawawi = PensiunPegawai::where('id', $id)->first();
        $pensiunPegawawi->status = 1;
        $pensiunPegawawi->save();

        return redirect()->route("pimpinan.pensiun-pegawai.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }
}
