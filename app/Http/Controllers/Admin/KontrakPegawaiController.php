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
                    ->select(DB::raw('tbl_datapegawai.*, tbl_kontrak_pegawai.lama_kontrak as lama_kontrak, tbl_kontrak_pegawai.status as status_kontrak, tbl_kontrak_pegawai.created_at as tanggal_pembuatan_kontrak'))
                    ->paginate(10);
        return view('admin.kontrak-pegawai.index', compact('pegawai'));
    }
}
