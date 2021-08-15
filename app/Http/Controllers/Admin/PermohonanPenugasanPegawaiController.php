<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermohonanPenugasanPegawai; 
use App\Models\DataPegawai; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermohonanPenugasanPegawaiController extends Controller
{
    public function index() {
        $permohonanPegawai = DB::table('tbl_permohonan_penugasan_pegawai')
                       ->join('tbl_datapegawai', 'tbl_permohonan_penugasan_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_permohonan_penugasan_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->paginate(10);
        return view('admin.permohonan-penugasan-pegawai.index', compact('permohonanPegawai'));
    }

    public function detail($id){
        $permohonanPegawai = DB::table('tbl_permohonan_penugasan_pegawai')
                       ->join('tbl_datapegawai', 'tbl_permohonan_penugasan_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_permohonan_penugasan_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->where('tbl_permohonan_penugasan_pegawai.id', $id)->first();
        return view('admin.permohonan-penugasan-pegawai.detail', compact('permohonanPegawai'));
    }
}
