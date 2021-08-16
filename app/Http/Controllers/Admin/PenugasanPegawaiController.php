<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPegawai; 
use App\Models\PenugasanPegawai; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDF;

class PenugasanPegawaiController extends Controller
{
    public function index() {
        $penugasanPegawai = DB::table('tbl_penugasan_pegawai')
                       ->join('tbl_datapegawai', 'tbl_penugasan_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_penugasan_pegawai.*, tbl_datapegawai.nama as nama_pegawai, tbl_datapegawai.nip as nip'))
                       ->paginate(10);
        return view('admin.penugasan-pegawai.index', compact('penugasanPegawai'));
    }

    public function edit($id) {
        $penugasanPegawai = DB::table('tbl_penugasan_pegawai')
                       ->join('tbl_datapegawai', 'tbl_datapegawai.id', '=', 'tbl_penugasan_pegawai.id_pegawai')
                       ->select(DB::raw('tbl_penugasan_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->where('tbl_penugasan_pegawai.id', $id)
                       ->first();
        return view('admin.penugasan-pegawai.edit', compact('penugasanPegawai'));
    }

    public function create(){
        $pegawai = DataPegawai::where('status', 1)->get();
        return view('admin.penugasan-pegawai.create', compact('pegawai'));
    }

    public function store(Request $request){
        $this->validate($request, [ 
            'pegawai' => 'required', 
            'jenis_penugasan' => 'required', 
            'editor' => 'required',
            'tanggal_mulai_penugasan' => 'required', 
            'waktu_mulai_penugasan' => 'required', 
            'tanggal_akhir_penugasan' => 'required', 
            'waktu_akhir_penugasan' => 'required', 
        ]);

        $penugasanPegawai = new PenugasanPegawai();
        $penugasanPegawai->id_pegawai = $request->pegawai;
        $penugasanPegawai->jenis_penugasan = $request->jenis_penugasan;
        $penugasanPegawai->deskripsi_penugasan = $request->editor;
        $penugasanPegawai->jadwal_mulai_penugasan = $request->tanggal_mulai_penugasan. ' ' . $request->waktu_mulai_penugasan;
        $penugasanPegawai->jadwal_akhir_penugasan = $request->tanggal_akhir_penugasan. ' ' . $request->waktu_akhir_penugasan;
        $penugasanPegawai->status = 0;
        $penugasanPegawai->save();

        return redirect()->route("admin.penugasan-pegawai.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }

    public function delete($id){
        $penugasanPegawai = PenugasanPegawai::where('id', $id)->delete();
        return redirect()->route("admin.penugasan-pegawai.index")->with( 
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

        $penugasanPegawai = PenugasanPegawai::where('id', $id)->first();
        $penugasanPegawai->jenis_penugasan = $request->jenis_penugasan;
        $penugasanPegawai->deskripsi_penugasan = $request->editor;
        $penugasanPegawai->jadwal_mulai_penugasan = $request->tanggal_mulai_penugasan. ' ' . $request->waktu_mulai_penugasan;
        $penugasanPegawai->jadwal_akhir_penugasan = $request->tanggal_akhir_penugasan. ' ' . $request->waktu_akhir_penugasan;
        $penugasanPegawai->status = 0;
        $penugasanPegawai->save();

        return redirect()->route("admin.penugasan-pegawai.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }

    public function cetakSK($id){
        $penugasanPegawai = DB::table('tbl_penugasan_pegawai')
                       ->join('tbl_datapegawai', 'tbl_datapegawai.id', '=', 'tbl_penugasan_pegawai.id_pegawai')
                       ->select(DB::raw('tbl_penugasan_pegawai.*, tbl_datapegawai.nama as nama_pegawai, tbl_datapegawai.jabatan as nama_jabatan'))
                       ->where('tbl_penugasan_pegawai.id', $id)
                       ->first();
                       
        $pdf = PDF::loadView('pdf/surat-keterangan-penugasan-pegawai', compact('penugasanPegawai'));
        
        //make direktori
        $path = public_path().'/storage/penugasan';
        if(!File_exists($path)){
            File::makeDirectory($path, $mode = 0777, true, true);
        }

        $namefile = 'surat_keterangan_penugasan'. date("Y_m_d_H_i_s") .'.pdf';
        $inputs['surat_keterangan_penugasan'] = 'storage/penugasan/'.$namefile;
        $pdf->save($inputs['surat_keterangan_penugasan']);

        $tmp = PenugasanPegawai::where('id', $id)->first();

        $tmp->surat_keterangan_penugasan = $inputs['surat_keterangan_penugasan'];
        $tmp->save(); 
        return redirect()->route("admin.penugasan-pegawai.edit", $id)->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
