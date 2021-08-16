<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPegawai; 
use App\Models\PenugasanPegawai; 
use Illuminate\Support\Facades\DB;

class PenugasanPegawaiController extends Controller
{
    public function index() {
        $penugasanPegawai = DB::table('tbl_penugasan_pegawai')
                       ->join('tbl_datapegawai', 'tbl_penugasan_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_penugasan_pegawai.*, tbl_datapegawai.nama as nama_pegawai, tbl_datapegawai.nip as nip'))
                       ->where('tbl_penugasan_pegawai.status', 0)
                       ->paginate(10);
        return view('pimpinan.penugasan-pegawai.index', compact('penugasanPegawai'));
    }

    public function detail($id){
        $penugasanPegawai = DB::table('tbl_penugasan_pegawai')
                       ->join('tbl_datapegawai', 'tbl_penugasan_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_penugasan_pegawai.*, tbl_datapegawai.nama as nama_pegawai, tbl_datapegawai.nip as nip'))
                       ->where('tbl_penugasan_pegawai.status', 0)
                       ->where('tbl_penugasan_pegawai.id', $id)->first();
        return view('pimpinan.penugasan-pegawai.detail', compact('penugasanPegawai'));
    }

    public function submit($id, $status) {
        $penugasanPegawai = PenugasanPegawai::where('id', $id)->first();
        $penugasanPegawai->status = $status;
        $penugasanPegawai->save();

        return redirect()->route("pimpinan.penugasan-pegawai.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }
}
