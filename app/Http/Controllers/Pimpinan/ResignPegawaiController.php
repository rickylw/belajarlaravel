<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResignPegawai; 
use App\Models\DataPegawai; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResignPegawaiController extends Controller
{
    public function index() {
        $resignPegawai = DB::table('tbl_resign_pegawai')
                       ->join('tbl_datapegawai', 'tbl_resign_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_resign_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->where('tbl_resign_pegawai.status', 0)
                       ->whereNotNull('tbl_resign_pegawai.diketahui_sdm')
                       ->paginate(10);
        return view('pimpinan.resign-pegawai.index', compact('resignPegawai'));
    }

    public function detail($id){
        $resignPegawai = DB::table('tbl_resign_pegawai')
                       ->join('tbl_datapegawai', 'tbl_resign_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_resign_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->where('tbl_resign_pegawai.id', $id)
                       ->first();
        return view('pimpinan.resign-pegawai.detail', compact('resignPegawai'));
    }

    public function submit($id, $status) {
        $now = DB::select('select now() as date')[0]->date;
        $resignPegawai = ResignPegawai::where('id', $id)->first();
        $resignPegawai->diketahui_pimpinan = $now;
        $resignPegawai->status = $status;
        $resignPegawai->save();

        return redirect()->route("pimpinan.resign-pegawai.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }
}
