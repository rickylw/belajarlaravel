<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataUnitKerja; 
use App\Models\PensiunUnitKerja; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class PensiunUnitKerjaController extends Controller
{
    public function index(){
        $unitkerja = DB::table('tbl_dataunitkerja')
                    ->leftJoin('tbl_pensiun_unitkerja', 'tbl_pensiun_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*, (year(now()) - year(tbl_dataunitkerja.tanggal_lahir)) as selisih_tahun'))
                    ->whereNull('tbl_pensiun_unitkerja.id')
                    ->having('selisih_tahun', '>=', 65)
                    ->paginate(10);
        return view('admin.pensiun-unitkerja.index', compact('unitkerja'));
    }

    public function detail($id){
        $unitkerja = DataUnitKerja::where('id',$id)->first();
        return view('admin.pensiun-unitkerja.detail', compact('unitkerja'));
    }

    public function forward(Request $request, $id){
        $this->validate($request, [ 
            'editor' => 'required'
        ]);

        $pensiunUnitKerja = new PensiunUnitKerja();
        $pensiunUnitKerja->id_unitkerja = $id;
        $pensiunUnitKerja->analisis_sdm = $request->editor;
        $pensiunUnitKerja->status = 0;
        $pensiunUnitKerja->save();
        
        return redirect()->route("admin.pensiun-unitkerja.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }

    public function pengajuanIndex(){
        $unitkerja = DB::table('tbl_dataunitkerja')
                    ->join('tbl_pensiun_unitkerja', 'tbl_pensiun_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_pensiun_unitkerja.analisis_sdm as analisis_sdm, tbl_pensiun_unitkerja.id as id_pensiun, (year(now()) - year(tbl_dataunitkerja.tanggal_lahir)) as selisih_tahun'))
                    ->paginate(10);
        return view('admin.pengajuan-pensiun-unitkerja.index', compact('unitkerja'));
    }

    public function pengajuanDetail($id){
        $unitkerja = DB::table('tbl_dataunitkerja')
                    ->join('tbl_pensiun_unitkerja', 'tbl_pensiun_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_pensiun_unitkerja.analisis_sdm as analisis_sdm, tbl_pensiun_unitkerja.status as status_pensiun, tbl_pensiun_unitkerja.surat_keterangan_pensiun as surat_keterangan_pensiun, tbl_pensiun_unitkerja.id as id_pensiun'))
                    ->where('tbl_pensiun_unitkerja.id',$id)->first();
        return view('admin.pengajuan-pensiun-unitkerja.detail', compact('unitkerja'));
    }

    public function cetakSK($id){
        $pensiunUnitKerja = DB::table('tbl_dataunitkerja')
                    ->join('tbl_pensiun_unitkerja', 'tbl_pensiun_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_pensiun_unitkerja.analisis_sdm as analisis_sdm, tbl_pensiun_unitkerja.status as status_pensiun, tbl_pensiun_unitkerja.id as id_pensiun'))
                    ->where('tbl_pensiun_unitkerja.id',$id)->first();

        $pdf = PDF::loadView('pdf/surat-keterangan-pensiun-unitkerja', compact('pensiunUnitKerja'));
        
        //make direktori
        $path = public_path().'/storage/pensiun';
        if(!File_exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $namefile = 'surat_keterangan_pensiun'. date("Y_m_d_H_i_s") .'.pdf';
        $inputs['surat_keterangan_pensiun'] = 'storage/pensiun/'.$namefile;
        $pdf->save($inputs['surat_keterangan_pensiun']);

        $tmp = PensiunUnitKerja::where('id', $id)->first();

        $tmp->surat_keterangan_pensiun = $inputs['surat_keterangan_pensiun'];
        $tmp->save(); 
        return redirect()->route("admin.pengajuan-pensiun-unitkerja.detail", $id)->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
