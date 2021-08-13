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
}
