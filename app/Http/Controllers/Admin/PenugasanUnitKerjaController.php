<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataUnitKerja; 
use App\Models\PenugasanUnitKerja; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class PenugasanUnitKerjaController extends Controller
{
    public function index() {
        $penugasanUnitKerja = DB::table('tbl_penugasan_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_penugasan_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_penugasan_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, tbl_dataunitkerja.nip as nip'))
                       ->paginate(10);
        return view('admin.penugasan-unitkerja.index', compact('penugasanUnitKerja'));
    }

    public function edit($id) {
        $penugasanUnitKerja = DB::table('tbl_penugasan_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_dataunitkerja.id', '=', 'tbl_penugasan_unitkerja.id_unitkerja')
                       ->select(DB::raw('tbl_penugasan_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('tbl_penugasan_unitkerja.id', $id)
                       ->first();
        return view('admin.penugasan-unitkerja.edit', compact('penugasanUnitKerja'));
    }

    public function create(){
        $unitkerja = DataUnitKerja::where('status', 1)->get();
        return view('admin.penugasan-unitkerja.create', compact('unitkerja'));
    }

    public function store(Request $request){
        $this->validate($request, [ 
            'unitkerja' => 'required', 
            'jenis_penugasan' => 'required', 
            'editor' => 'required',
            'tanggal_mulai_penugasan' => 'required', 
            'waktu_mulai_penugasan' => 'required', 
            'tanggal_akhir_penugasan' => 'required', 
            'waktu_akhir_penugasan' => 'required', 
        ]);

        $penugasanUnitKerja = new PenugasanUnitKerja();
        $penugasanUnitKerja->id_unitkerja = $request->unitkerja;
        $penugasanUnitKerja->jenis_penugasan = $request->jenis_penugasan;
        $penugasanUnitKerja->deskripsi_penugasan = $request->editor;
        $penugasanUnitKerja->jadwal_mulai_penugasan = $request->tanggal_mulai_penugasan. ' ' . $request->waktu_mulai_penugasan;
        $penugasanUnitKerja->jadwal_akhir_penugasan = $request->tanggal_akhir_penugasan. ' ' . $request->waktu_akhir_penugasan;
        $penugasanUnitKerja->status = 0;
        $penugasanUnitKerja->save();

        return redirect()->route("admin.penugasan-unitkerja.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }

    public function delete($id){
        $penugasanUnitKerja = PenugasanUnitKerja::where('id', $id)->delete();
        return redirect()->route("admin.penugasan-unitkerja.index")->with( 
            "success", 
            "Data berhasil dihapus." 
        ); 
    }

    public function update(Request $request, $id){
        $this->validate($request, [ 
            'jenis_penugasan' => 'required', 
            'editor' => 'required',
            'tanggal_mulai_penugasan' => 'required', 
            'waktu_mulai_penugasan' => 'required', 
            'tanggal_akhir_penugasan' => 'required', 
            'waktu_akhir_penugasan' => 'required', 
        ]);

        $penugasanUnitKerja = PenugasanUnitKerja::where('id', $id)->first();
        $penugasanUnitKerja->jenis_penugasan = $request->jenis_penugasan;
        $penugasanUnitKerja->deskripsi_penugasan = $request->editor;
        $penugasanUnitKerja->jadwal_mulai_penugasan = $request->tanggal_mulai_penugasan. ' ' . $request->waktu_mulai_penugasan;
        $penugasanUnitKerja->jadwal_akhir_penugasan = $request->tanggal_akhir_penugasan. ' ' . $request->waktu_akhir_penugasan;
        $penugasanUnitKerja->status = 0;
        $penugasanUnitKerja->save();

        return redirect()->route("admin.penugasan-unitkerja.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }

    public function cetakSK($id){
        $penugasanUnitKerja = DB::table('tbl_penugasan_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_dataunitkerja.id', '=', 'tbl_penugasan_unitkerja.id_unitkerja')
                       ->select(DB::raw('tbl_penugasan_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja, tbl_dataunitkerja.jabatan as nama_jabatan'))
                       ->where('tbl_penugasan_unitkerja.id', $id)
                       ->first();
                       
        $pdf = PDF::loadView('pdf/surat-keterangan-penugasan-unitkerja', compact('penugasanUnitKerja'));
        
        //make direktori
        $path = public_path().'/storage/penugasan';
        if(!File_exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $namefile = 'surat_keterangan_penugasan'. date("Y_m_d_H_i_s") .'.pdf';
        $inputs['surat_keterangan_penugasan'] = 'storage/penugasan/'.$namefile;
        $pdf->save($inputs['surat_keterangan_penugasan']);

        $tmp = PenugasanUnitKerja::where('id', $id)->first();

        $tmp->surat_keterangan_penugasan = $inputs['surat_keterangan_penugasan'];
        $tmp->save(); 
        return redirect()->route("admin.penugasan-unitkerja.edit", $id)->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
