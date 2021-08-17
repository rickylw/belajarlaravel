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
                    ->select(DB::raw('tbl_datapegawai.*, tbl_pensiun_pegawai.analisis_sdm as analisis_sdm, tbl_pensiun_pegawai.id as id_pensiun, (year(now()) - year(tbl_datapegawai.tanggal_lahir)) as selisih_tahun'))
                    ->where('tbl_pensiun_pegawai.status', 0)
                    ->having('selisih_tahun', '>=', 65)
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
        $pensiunPegawai = PensiunPegawai::where('id', $id)->first();
        $pensiunPegawai->status = 1;
        $pensiunPegawai->save();

        $pegawai = DataPegawai::where('id', $pensiunPegawai->id_pegawai)->first();
        $pegawai->status = 0;
        $pegawai->save();

        return redirect()->route("pimpinan.pensiun-pegawai.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }
}
