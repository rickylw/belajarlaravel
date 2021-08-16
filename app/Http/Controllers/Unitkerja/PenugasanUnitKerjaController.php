<?php

namespace App\Http\Controllers\UnitKerja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataUnitKerja; 
use App\Models\PenugasanUnitKerja; 
use Illuminate\Support\Facades\DB;

class PenugasanUnitKerjaController extends Controller
{
    public function index() {
        $penugasanUnitKerja = DB::table('tbl_penugasan_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_penugasan_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_penugasan_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, tbl_dataunitkerja.nip as nip'))
                       ->where('tbl_penugasan_unitkerja.status', 1)
                       ->paginate(10);
        return view('unitkerja.penugasan.index', compact('penugasanUnitKerja'));
    }

    public function detail($id){
        $penugasanUnitKerja = DB::table('tbl_penugasan_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_penugasan_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_penugasan_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, tbl_dataunitkerja.nip as nip'))
                       ->where('tbl_penugasan_unitkerja.status', 1)
                       ->where('tbl_penugasan_unitkerja.id', $id)->first();
        return view('unitkerja.penugasan.detail', compact('penugasanUnitKerja'));
    }
}
