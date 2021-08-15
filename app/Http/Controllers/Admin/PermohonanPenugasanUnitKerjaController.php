<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermohonanPenugasanUnitKerja; 
use App\Models\DataUnitKerja; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermohonanPenugasanUnitKerjaController extends Controller
{
    public function index() {
        $permohonanUnitKerja = DB::table('tbl_permohonan_penugasan_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_permohonan_penugasan_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_permohonan_penugasan_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->paginate(10);
        return view('admin.permohonan-penugasan-unitkerja.index', compact('permohonanUnitKerja'));
    }

    public function detail($id){
        $permohonanUnitKerja = DB::table('tbl_permohonan_penugasan_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_permohonan_penugasan_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_permohonan_penugasan_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('tbl_permohonan_penugasan_unitkerja.id', $id)->first();
        return view('admin.permohonan-penugasan-unitkerja.detail', compact('permohonanUnitKerja'));
    }
}
