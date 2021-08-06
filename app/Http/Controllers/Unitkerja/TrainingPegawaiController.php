<?php

namespace App\Http\Controllers\UnitKerja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPegawai; 
use App\Models\DataUnitKerja; 
use App\Models\TrainingPegawai; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrainingPegawaiController extends Controller
{
    public function index() {
        $unitkerjaLogin = DataUnitKerja::where('id_user', Auth::id())->first();
        $trainingPegawai = DB::table('tbl_training_pegawai')
                       ->join('tbl_datapegawai', 'tbl_training_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_training_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->where('diajukan_oleh', $unitkerjaLogin->id)
                       ->paginate(10);
        return view('unitkerja.training-pegawai.index', compact('trainingPegawai'));
    }

    public function create() { 
        $pegawai = DataPegawai::all();
        return view("unitkerja.training-pegawai.create", compact('pegawai')); 
    } 

    public function edit($id) {
        $trainingPegawai = DB::table('tbl_training_pegawai')
                       ->join('tbl_datapegawai', 'tbl_training_pegawai.id_pegawai', '=', 'tbl_datapegawai.id')
                       ->select(DB::raw('tbl_training_pegawai.*, tbl_datapegawai.nama as nama_pegawai'))
                       ->where('tbl_training_pegawai.id', $id)->first();
        return view('unitkerja.training-pegawai.edit', compact('trainingPegawai'));
    }

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'pegawai' => 'required', 
            'nama_pelatihan' => 'required',
            'tanggal_mulai_pelatihan' => 'required',
            'waktu_mulai_pelatihan' => 'required',
            'tanggal_akhir_pelatihan' => 'required',
            'waktu_akhir_pelatihan' => 'required',
            'editor' => 'required',
        ]);

        $unitkerjaLogin = DataUnitKerja::where('id_user', Auth::id())->first();

        $trainingPegawai = new TrainingPegawai();
        $trainingPegawai->id_pegawai = $request->pegawai;
        $trainingPegawai->nama_pelatihan = $request->nama_pelatihan;
        $trainingPegawai->jadwal_mulai_pelatihan = $request->tanggal_mulai_pelatihan. ' ' . $request->waktu_mulai_pelatihan;
        $trainingPegawai->jadwal_akhir_pelatihan = $request->tanggal_akhir_pelatihan. ' ' . $request->waktu_akhir_pelatihan;
        $trainingPegawai->deskripsi_pelatihan = $request->editor;
        $trainingPegawai->status = 0;
        $trainingPegawai->diajukan_oleh = $unitkerjaLogin->id;
        $trainingPegawai->save();

        return redirect()->route("unitkerja.training-pegawai.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function update(Request $request, $id) 
    { 
        $this->validate($request, [ 
            'nama_pelatihan' => 'required',
            'tanggal_mulai_pelatihan' => 'required',
            'waktu_mulai_pelatihan' => 'required',
            'tanggal_akhir_pelatihan' => 'required',
            'waktu_akhir_pelatihan' => 'required',
            'editor' => 'required',
        ]);

        $unitkerjaLogin = DataUnitKerja::where('id_user', Auth::id())->first();

        $trainingPegawai = TrainingPegawai::where('id', $id)->first();
        $trainingPegawai->nama_pelatihan = $request->nama_pelatihan;
        $trainingPegawai->jadwal_mulai_pelatihan = $request->tanggal_mulai_pelatihan. ' ' . $request->waktu_mulai_pelatihan;
        $trainingPegawai->jadwal_akhir_pelatihan = $request->tanggal_akhir_pelatihan. ' ' . $request->waktu_akhir_pelatihan;
        $trainingPegawai->deskripsi_pelatihan = $request->editor;
        $trainingPegawai->save();

        return redirect()->route("unitkerja.training-pegawai.index")->with( 
        "success", 
        "Data berhasil diubah." 
        ); 
    } 

    public function delete($id){
        $trainingPegawai = TrainingPegawai::where('id', $id)->delete();
        return redirect()->route("unitkerja.training-pegawai.index")->with( 
            "success", 
            "Data berhasil dihapus." 
        ); 
    }
}
