<?php

namespace App\Http\Controllers\Pegawai;

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
                       ->where('tbl_penugasan_pegawai.status', 1)
                       ->paginate(10);
        return view('pegawai.penugasan.index', compact('penugasanPegawai'));
    }

    public function detail($id){
        $penugasanPegawai = DB::table('tbl_penugasan_pegawai')
                       ->join('tbl_datapegawai', 'tbl_penugasan_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_penugasan_pegawai.*, tbl_datapegawai.nama as nama_pegawai, tbl_datapegawai.nip as nip'))
                       ->where('tbl_penugasan_pegawai.status', 1)
                       ->where('tbl_penugasan_pegawai.id', $id)->first();
        return view('pegawai.penugasan.detail', compact('penugasanPegawai'));
    }
}
