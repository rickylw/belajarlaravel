<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontrakUnitKerja; 
use App\Models\DataUnitKerja; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontrakUnitKerjaController extends Controller
{
    public function index() {
        $unitkerja = DB::table('tbl_dataunitkerja')
                    ->join('tbl_kontrak_unitkerja', 'tbl_kontrak_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_kontrak_unitkerja.lama_kontrak as lama_kontrak, tbl_kontrak_unitkerja.status as status_kontrak, tbl_kontrak_unitkerja.created_at as tanggal_pembuatan_kontrak, tbl_kontrak_unitkerja.tanggal_habis_kontrak as tanggal_habis_kontrak'))
                    ->paginate(10);
        return view('admin.kontrak-unitkerja.index', compact('unitkerja'));
    }

    public function detail($id){
        $unitkerja = DB::table('tbl_dataunitkerja')
                    ->join('tbl_kontrak_unitkerja', 'tbl_kontrak_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_kontrak_unitkerja.lama_kontrak as lama_kontrak, tbl_kontrak_unitkerja.status as status_kontrak, tbl_kontrak_unitkerja.created_at as tanggal_pembuatan_kontrak, tbl_kontrak_unitkerja.tanggal_habis_kontrak as tanggal_habis_kontrak, DATEDIFF(tbl_kontrak_unitkerja.tanggal_habis_kontrak, now()) as diff'))
                    ->where('tbl_dataunitkerja.id', $id)->first();
        return view('admin.kontrak-unitkerja.detail', compact('unitkerja'));
    }

    public function reIndex(){
        $unitkerja = DB::table('tbl_dataunitkerja')
                    ->join('tbl_kontrak_unitkerja', 'tbl_kontrak_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_kontrak_unitkerja.lama_kontrak as lama_kontrak, tbl_kontrak_unitkerja.status as status_kontrak, tbl_kontrak_unitkerja.created_at as tanggal_pembuatan_kontrak, tbl_kontrak_unitkerja.tanggal_habis_kontrak as tanggal_habis_kontrak, DATEDIFF(tbl_kontrak_unitkerja.tanggal_habis_kontrak, now()) as diff'))
                    ->where('tbl_kontrak_unitkerja.status', 1)
                    ->having('diff','<=', 14)
                    ->paginate(10);
        return view('admin.re-kontrak-unitkerja.index', compact('unitkerja'));
    }
}
