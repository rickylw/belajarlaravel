<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\KontrakUnitKerja; 
use App\Models\PengajuanPerpanjanganKontrakUnitKerja; 
use App\Models\DataUnitKerja; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontrakUnitKerjaController extends Controller
{
    public function index() {
        $kontrakUnitKerja = DB::table('tbl_perpanjangan_kontrak_unitkerja')
                    ->join('tbl_kontrak_unitkerja', 'tbl_perpanjangan_kontrak_unitkerja.id_kontrak_unitkerja', '=', 'tbl_kontrak_unitkerja.id')
                    ->join('tbl_dataunitkerja', 'tbl_kontrak_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_kontrak_unitkerja.*, tbl_dataunitkerja.nip as nip, tbl_dataunitkerja.nama as nama, DATEDIFF(tbl_kontrak_unitkerja.tanggal_habis_kontrak, now()) as diff'))
                    ->where('tbl_perpanjangan_kontrak_unitkerja.status', 0)
                    ->paginate(10);
        return view('pimpinan.re-kontrak-unitkerja.index', compact('kontrakUnitKerja'));
    }

    public function detail($id){
        $kontrakUnitKerja = DB::table('tbl_perpanjangan_kontrak_unitkerja')
                    ->join('tbl_kontrak_unitkerja', 'tbl_perpanjangan_kontrak_unitkerja.id_kontrak_unitkerja', '=', 'tbl_kontrak_unitkerja.id')
                    ->join('tbl_dataunitkerja', 'tbl_kontrak_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_kontrak_unitkerja.*, tbl_dataunitkerja.nip as nip, tbl_dataunitkerja.nama as nama, tbl_dataunitkerja.jabatan as jabatan, DATEDIFF(tbl_kontrak_unitkerja.tanggal_habis_kontrak, now()) as diff, tbl_perpanjangan_kontrak_unitkerja.analisis_sdm as analisis_sdm, tbl_perpanjangan_kontrak_unitkerja.keputusan_pimpinan as keputusan_pimpinan'))
                    ->where('tbl_perpanjangan_kontrak_unitkerja.id', $id)
                    ->first();
        return view('pimpinan.re-kontrak-unitkerja.detail', compact('kontrakUnitKerja'));
    }

    public function submit(Request $request, $id){
        $this->validate($request, [ 
            'editor' => 'required'
        ]);

        $perpanjanganKontrakUnitKerja = PengajuanPerpanjanganKontrakUnitKerja::where('id',$id)->first();
        $perpanjanganKontrakUnitKerja->keputusan_pimpinan = $request->editor;
        $perpanjanganKontrakUnitKerja->save();
        
        return redirect()->route("pimpinan.re-kontrak-unitkerja.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
