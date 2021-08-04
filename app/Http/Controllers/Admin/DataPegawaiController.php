<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPegawai; 
use Illuminate\Support\Facades\DB;

class DataPegawaiController extends Controller
{
    public function index() {
        $pegawai = DataPegawai::paginate(10);
        return view('admin.data-pegawai.index', compact('pegawai'));
    }

    public function edit($id) {
        $hasilInterview = DB::table('tbl_datapegawai')
                    ->join('tbl_kontrak_pegawai', 'tbl_kontrak_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_datapegawai.nama as jenis_interview'))
                    ->paginate(10);
        $pegawai = DataPegawai::where('id', $id)->first();
        return view('admin.data-pegawai.edit', compact('pegawai'));
    }
}
