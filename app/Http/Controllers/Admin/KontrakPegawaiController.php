<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontrakPegawai; 
use App\Models\DataPegawai; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontrakPegawaiController extends Controller
{
    public function index() {
        $pegawai = DB::table('tbl_datapegawai')
                    ->join('tbl_kontrak_pegawai', 'tbl_kontrak_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_kontrak_pegawai.lama_kontrak as lama_kontrak, tbl_kontrak_pegawai.status as status_kontrak, tbl_kontrak_pegawai.created_at as tanggal_pembuatan_kontrak, tbl_kontrak_pegawai.tanggal_habis_kontrak as tanggal_habis_kontrak'))
                    ->paginate(10);
        return view('admin.kontrak-pegawai.index', compact('pegawai'));
    }

    public function reIndex(){
        $pegawai = DB::table('tbl_datapegawai')
                    ->join('tbl_kontrak_pegawai', 'tbl_kontrak_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_kontrak_pegawai.lama_kontrak as lama_kontrak, tbl_kontrak_pegawai.status as status_kontrak, tbl_kontrak_pegawai.created_at as tanggal_pembuatan_kontrak, tbl_kontrak_pegawai.tanggal_habis_kontrak as tanggal_habis_kontrak, DATEDIFF(tbl_kontrak_pegawai.tanggal_habis_kontrak, now()) as diff'))
                    ->where('tbl_kontrak_pegawai.status', 1)
                    ->having('diff','<=', 14)
                    ->paginate(10);
        return view('admin.re-kontrak-pegawai.index', compact('pegawai'));
    }
}
