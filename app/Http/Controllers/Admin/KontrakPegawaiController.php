<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontrakPegawai; 
use App\Models\PengajuanPerpanjanganKontrakPegawai; 
use App\Models\DataPegawai; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class KontrakPegawaiController extends Controller
{
    public function index() {
        $pegawai = DB::table('tbl_datapegawai')
                    ->join('tbl_kontrak_pegawai', 'tbl_kontrak_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_kontrak_pegawai.lama_kontrak as lama_kontrak, tbl_kontrak_pegawai.status as status_kontrak, tbl_kontrak_pegawai.created_at as tanggal_pembuatan_kontrak, tbl_kontrak_pegawai.tanggal_habis_kontrak as tanggal_habis_kontrak'))
                    ->paginate(10);
        return view('admin.kontrak-pegawai.index', compact('pegawai'));
    }

    public function detail($id){
        $pegawai = DB::table('tbl_datapegawai')
                    ->join('tbl_kontrak_pegawai', 'tbl_kontrak_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_kontrak_pegawai.lama_kontrak as lama_kontrak, tbl_kontrak_pegawai.status as status_kontrak, tbl_kontrak_pegawai.created_at as tanggal_pembuatan_kontrak, tbl_kontrak_pegawai.tanggal_habis_kontrak as tanggal_habis_kontrak, DATEDIFF(tbl_kontrak_pegawai.tanggal_habis_kontrak, now()) as diff, tbl_kontrak_pegawai.id as id_kontrak'))
                    ->where('tbl_datapegawai.id', $id)->first();
        return view('admin.kontrak-pegawai.detail', compact('pegawai'));
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

    public function pengajuanIndex(){
        $pengajuan = DB::table('tbl_perpanjangan_kontrak_pegawai')
                    ->join('tbl_kontrak_pegawai', 'tbl_perpanjangan_kontrak_pegawai.id_kontrak_pegawai', '=', 'tbl_kontrak_pegawai.id')
                    ->join('tbl_datapegawai', 'tbl_datapegawai.id', '=', 'tbl_kontrak_pegawai.id_pegawai')
                    ->select(DB::raw('tbl_datapegawai.*, tbl_kontrak_pegawai.lama_kontrak as lama_kontrak, tbl_kontrak_pegawai.status as status_kontrak, tbl_kontrak_pegawai.created_at as tanggal_pembuatan_kontrak, tbl_kontrak_pegawai.tanggal_habis_kontrak as tanggal_habis_kontrak, DATEDIFF(tbl_kontrak_pegawai.tanggal_habis_kontrak, now()) as diff'))
                    ->where('tbl_perpanjangan_kontrak_pegawai.status', 0)
                    ->paginate(10);
        return view('admin.pengajuan-kontrak-pegawai.index', compact('pengajuan'));
    }

    public function forward(Request $request, $id){
        $this->validate($request, [ 
            'editor' => 'required'
        ]);

        $kontrakPegawai = KontrakPegawai::where('id', $id)->first();
        $kontrakPegawai->status = 0;
        $kontrakPegawai->save();

        $perpanjanganKontrak = new PengajuanPerpanjanganKontrakPegawai();
        $perpanjanganKontrak->id_kontrak_pegawai = $id;
        $perpanjanganKontrak->analisis_sdm = $request->editor;
        $perpanjanganKontrak->status = 0;
        $perpanjanganKontrak->save();

        return redirect()->route("admin.re-kontrak-pegawai.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }

    public function detailPengajuan($id){
        $pengajuan = DB::table('tbl_perpanjangan_kontrak_pegawai')
                    ->join('tbl_kontrak_pegawai', 'tbl_perpanjangan_kontrak_pegawai.id_kontrak_pegawai', '=', 'tbl_kontrak_pegawai.id')
                    ->join('tbl_datapegawai', 'tbl_kontrak_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                    ->select(DB::raw('tbl_kontrak_pegawai.*, tbl_datapegawai.nip as nip, tbl_datapegawai.nama as nama, tbl_datapegawai.jabatan as jabatan, DATEDIFF(tbl_kontrak_pegawai.tanggal_habis_kontrak, now()) as diff, tbl_perpanjangan_kontrak_pegawai.analisis_sdm as analisis_sdm, tbl_perpanjangan_kontrak_pegawai.keputusan_pimpinan as keputusan_pimpinan'))
                    ->where('tbl_perpanjangan_kontrak_pegawai.id', $id)
                    ->first();
        return view('admin.pengajuan-kontrak-pegawai.detail', compact('pengajuan'));
    }

    public function submitPengajuan(Request $request, $id){
        $this->validate($request, [ 
            'tipe' => 'required'
        ]);

        $perpanjanganKontrak = PengajuanPerpanjanganKontrakPegawai::where('id', $id)->first();

        $kontrakPegawai = KontrakPegawai::where('id', $perpanjanganKontrak->id_kontrak_pegawai)->first();
        $pegawai = DataPegawai::where('id', $kontrakPegawai->id_pegawai)->first();

        if($request->tipe == 1){
            //cetak sk pegawai
            $pdf = PDF::loadView('pdf/surat-keterangan-pegawai-tetap', compact('pegawai'));

            $namefile = 'surat_keterangan_pegawai_tetap'. date("Y_m_d_H_i_s") .'.pdf';
            $path = 'storage/pegawai/'.$pegawai->id_user.'/'.$namefile;
            $pdf->save($path);

            $pegawai->sk_pegawai_tetap = $path;
            $pegawai->save();
            $perpanjanganKontrak->status = 1;
        }
        else if($request->tipe == 2){
            $pegawai->status = 0;
            $pegawai->save();
            $perpanjanganKontrak->status = 1;
        }
        else if($request->tipe == 3){
            $this->validate($request, [ 
                'lama_kontrak' => 'required'
            ]);
            $perpanjanganKontrak->status = 1;

            $kontrakPegawai = new KontrakPegawai();
            $kontrakPegawai->id_pegawai = $pegawai->id;
            $kontrakPegawai->lama_kontrak = $request->lama_kontrak;
            $kontrakPegawai->status = 1;
            $now = date('d-m-Y');
            $kontrakPegawai->tanggal_habis_kontrak = date('Y-m-d', strtotime("+".$request->lama_kontrak." months", strtotime($now)));
            $kontrakPegawai->save();
        }

        $perpanjanganKontrak->save();
        return redirect()->route("admin.pengajuan-kontrak-pegawai.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
