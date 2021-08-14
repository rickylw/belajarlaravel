<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use App\Models\KontrakPegawai; 
use App\Models\PengajuanPerpanjanganKontrakPegawai; 
use App\Models\DataPegawai; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontrakPegawaiController extends Controller
{
    public function index() {
        $kontrakPegawai = DB::table('tbl_perpanjangan_kontrak_pegawai')
                    ->join('tbl_kontrak_pegawai', 'tbl_perpanjangan_kontrak_pegawai.id_kontrak_pegawai', '=', 'tbl_kontrak_pegawai.id')
                    ->join('tbl_datapegawai', 'tbl_kontrak_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_kontrak_pegawai.*, tbl_datapegawai.nip as nip, tbl_datapegawai.nama as nama, DATEDIFF(tbl_kontrak_pegawai.tanggal_habis_kontrak, now()) as diff'))
                    ->where('tbl_perpanjangan_kontrak_pegawai.status', 0)
                    ->paginate(10);
        return view('pimpinan.re-kontrak-pegawai.index', compact('kontrakPegawai'));
    }

    public function detail($id){
        $kontrakPegawai = DB::table('tbl_perpanjangan_kontrak_pegawai')
                    ->join('tbl_kontrak_pegawai', 'tbl_perpanjangan_kontrak_pegawai.id_kontrak_pegawai', '=', 'tbl_kontrak_pegawai.id')
                    ->join('tbl_datapegawai', 'tbl_kontrak_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_kontrak_pegawai.*, tbl_datapegawai.nip as nip, tbl_datapegawai.nama as nama, tbl_datapegawai.jabatan as jabatan, DATEDIFF(tbl_kontrak_pegawai.tanggal_habis_kontrak, now()) as diff, tbl_perpanjangan_kontrak_pegawai.analisis_sdm as analisis_sdm, tbl_perpanjangan_kontrak_pegawai.keputusan_pimpinan as keputusan_pimpinan'))
                    ->where('tbl_perpanjangan_kontrak_pegawai.id', $id)
                    ->first();
        return view('pimpinan.re-kontrak-pegawai.detail', compact('kontrakPegawai'));
    }

    public function submit(Request $request, $id){
        $this->validate($request, [ 
            'editor' => 'required'
        ]);

        $perpanjanganKontrakPegawai = PengajuanPerpanjanganKontrakPegawai::where('id',$id)->first();
        $perpanjanganKontrakPegawai->keputusan_pimpinan = $request->editor;
        $perpanjanganKontrakPegawai->save();
        
        return redirect()->route("pimpinan.re-kontrak-pegawai.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
