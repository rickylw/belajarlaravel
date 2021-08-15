<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontrakUnitKerja; 
use App\Models\PengajuanPerpanjanganKontrakUnitKerja; 
use App\Models\DataUnitKerja; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

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
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_kontrak_unitkerja.lama_kontrak as lama_kontrak, tbl_kontrak_unitkerja.status as status_kontrak, tbl_kontrak_unitkerja.created_at as tanggal_pembuatan_kontrak, tbl_kontrak_unitkerja.tanggal_habis_kontrak as tanggal_habis_kontrak, DATEDIFF(tbl_kontrak_unitkerja.tanggal_habis_kontrak, now()) as diff, tbl_kontrak_unitkerja.id as id_kontrak'))
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

    public function pengajuanIndex(){
        $pengajuan = DB::table('tbl_perpanjangan_kontrak_unitkerja')
                    ->join('tbl_kontrak_unitkerja', 'tbl_perpanjangan_kontrak_unitkerja.id_kontrak_unitkerja', '=', 'tbl_kontrak_unitkerja.id')
                    ->join('tbl_dataunitkerja', 'tbl_dataunitkerja.id', '=', 'tbl_kontrak_unitkerja.id_unitkerja')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_kontrak_unitkerja.lama_kontrak as lama_kontrak, tbl_kontrak_unitkerja.status as status_kontrak, tbl_kontrak_unitkerja.created_at as tanggal_pembuatan_kontrak, tbl_kontrak_unitkerja.tanggal_habis_kontrak as tanggal_habis_kontrak, DATEDIFF(tbl_kontrak_unitkerja.tanggal_habis_kontrak, now()) as diff'))
                    ->where('tbl_perpanjangan_kontrak_unitkerja.status', 0)
                    ->paginate(10);
        return view('admin.pengajuan-kontrak-unitkerja.index', compact('pengajuan'));
    }

    public function forward(Request $request, $id){
        $this->validate($request, [ 
            'editor' => 'required'
        ]);

        $kontrakUnitKerja = KontrakUnitKerja::where('id', $id)->first();
        $kontrakUnitKerja->status = 0;
        $kontrakUnitKerja->save();

        $perpanjanganKontrak = new PengajuanPerpanjanganKontrakUnitKerja();
        $perpanjanganKontrak->id_kontrak_unitkerja = $id;
        $perpanjanganKontrak->analisis_sdm = $request->editor;
        $perpanjanganKontrak->status = 0;
        $perpanjanganKontrak->save();

        return redirect()->route("admin.re-kontrak-unitkerja.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }

    public function detailPengajuan($id){
        $pengajuan = DB::table('tbl_perpanjangan_kontrak_unitkerja')
                    ->join('tbl_kontrak_unitkerja', 'tbl_perpanjangan_kontrak_unitkerja.id_kontrak_unitkerja', '=', 'tbl_kontrak_unitkerja.id')
                    ->join('tbl_dataunitkerja', 'tbl_kontrak_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_kontrak_unitkerja.*, tbl_dataunitkerja.nip as nip, tbl_dataunitkerja.nama as nama, tbl_dataunitkerja.jabatan as jabatan, DATEDIFF(tbl_kontrak_unitkerja.tanggal_habis_kontrak, now()) as diff, tbl_perpanjangan_kontrak_unitkerja.analisis_sdm as analisis_sdm, tbl_perpanjangan_kontrak_unitkerja.keputusan_pimpinan as keputusan_pimpinan'))
                    ->where('tbl_perpanjangan_kontrak_unitkerja.id', $id)
                    ->first();
        return view('admin.pengajuan-kontrak-unitkerja.detail', compact('pengajuan'));
    }

    public function submitPengajuan(Request $request, $id){
        $this->validate($request, [ 
            'tipe' => 'required'
        ]);

        $perpanjanganKontrak = PengajuanPerpanjanganKontrakUnitKerja::where('id', $id)->first();

        $kontrakUnitKerja = KontrakUnitKerja::where('id', $perpanjanganKontrak->id_kontrak_unitkerja)->first();
        $unitkerja = DataUnitKerja::where('id', $kontrakUnitKerja->id_unitkerja)->first();

        if($request->tipe == 1){
            //cetak sk unit kerja
            $pdf = PDF::loadView('pdf/surat-keterangan-unitkerja-tetap', compact('unitkerja'));

            $namefile = 'surat_keterangan_unitkerja_tetap'. date("Y_m_d_H_i_s") .'.pdf';
            $path = 'storage/unitkerja/'.$unitkerja->id_user.'/'.$namefile;
            $pdf->save($path);

            $unitkerja->sk_unitkerja_tetap = $path;
            $unitkerja->save();
            $perpanjanganKontrak->status = 1;
        }
        else if($request->tipe == 2){
            $unitkerja->status = 0;
            $unitkerja->save();
            $perpanjanganKontrak->status = 1;
        }
        else if($request->tipe == 3){
            $this->validate($request, [ 
                'lama_kontrak' => 'required'
            ]);
            $perpanjanganKontrak->status = 1;

            $kontrakUnitKerja = new KontrakUnitKerja();
            $kontrakUnitKerja->id_unitkerja = $unitkerja->id;
            $kontrakUnitKerja->lama_kontrak = $request->lama_kontrak;
            $kontrakUnitKerja->status = 1;
            $now = date('d-m-Y');
            $kontrakUnitKerja->tanggal_habis_kontrak = date('Y-m-d', strtotime("+".$request->lama_kontrak." months", strtotime($now)));
            $kontrakUnitKerja->save();
        }

        $perpanjanganKontrak->save();
        return redirect()->route("admin.pengajuan-kontrak-unitkerja.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
