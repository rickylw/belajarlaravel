<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResignUnitKerja; 
use App\Models\DataUnitKerja; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class ResignUnitKerjaController extends Controller
{
    public function index() {
        $resignUnitKerja = DB::table('tbl_resign_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_resign_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_resign_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->paginate(10);
        return view('admin.resign-unitkerja.index', compact('resignUnitKerja'));
    }

    public function create() 
    { 
        return view("admin.resign-unitkerja.create"); 
    } 

    public function detail($id){
        $resignUnitKerja = DB::table('tbl_resign_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_resign_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_resign_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('tbl_resign_unitkerja.id', $id)->first();
        return view('admin.resign-unitkerja.detail', compact('resignUnitKerja'));
    }

    public function submit(Request $request, $id){
        $this->validate($request, [ 
            'editor' => 'required'
        ]);
        $now = DB::select('select now() as date')[0]->date;

        $resignUnitKerja = ResignUnitKerja::where('id', $id)->first();
        $resignUnitKerja->diketahui_sdm = $now;
        $resignUnitKerja->analisis_sdm = $request->editor;
        $resignUnitKerja->save();

        return redirect()->route("admin.resign-unitkerja.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }

    public function cetakSK($id){
        $resignUnitKerja = DB::table('tbl_resign_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_resign_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_resign_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, tbl_dataunitkerja.created_at as awal_masuk, tbl_dataunitkerja.jabatan as jabatan'))
                       ->where('tbl_resign_unitkerja.id', $id)->first();

        $pdf = PDF::loadView('pdf/surat-keterangan-resign-unitkerja', compact('resignUnitKerja'));

        //make direktori
        $path = public_path().'/storage/resign';
        if(!File_exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $namefile = 'surat_keterangan_resign'. date("Y_m_d_H_i_s") .'.pdf';
        $inputs['surat_keterangan_resign'] = 'storage/resign/'.$namefile;
        $pdf->save($inputs['surat_keterangan_resign']);

        $tmp = ResignUnitKerja::where('id', $id)->first();

        $tmp->surat_keterangan_resign = $inputs['surat_keterangan_resign'];
        $tmp->save(); 
        return redirect()->route("admin.resign-unitkerja.detail", $id)->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
