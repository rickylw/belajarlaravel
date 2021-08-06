<?php

namespace App\Http\Controllers\UnitKerja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataPegawai; 
use App\Models\DataUnitKerja; 
use App\Models\TrainingUnitKerja; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TrainingUnitKerjaController extends Controller
{
    public function index() {
        $unitkerjaLogin = DataUnitKerja::where('id_user', Auth::id())->first();
        $trainingUnitKerja = DB::table('tbl_training_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_training_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_training_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('diajukan_oleh', $unitkerjaLogin->id)
                       ->paginate(10);
        return view('unitkerja.training-unitkerja.index', compact('trainingUnitKerja'));
    }

    public function create() { 
        $unitkerja = DataUnitKerja::all();
        return view("unitkerja.training-unitkerja.create", compact('unitkerja')); 
    } 

    public function edit($id) {
        $trainingUnitKerja = DB::table('tbl_training_unitkerja')
                       ->join('tbl_dataunitkerja', 'tbl_training_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                       ->select(DB::raw('tbl_training_unitkerja.*, tbl_dataunitkerja.nama as nama_unitkerja'))
                       ->where('tbl_training_unitkerja.id', $id)->first();
        return view('unitkerja.training-unitkerja.edit', compact('trainingUnitKerja'));
    }

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'unitkerja' => 'required', 
            'nama_pelatihan' => 'required',
            'tanggal_mulai_pelatihan' => 'required',
            'waktu_mulai_pelatihan' => 'required',
            'tanggal_akhir_pelatihan' => 'required',
            'waktu_akhir_pelatihan' => 'required',
            'editor' => 'required',
        ]);

        $unitkerjaLogin = DataUnitKerja::where('id_user', Auth::id())->first();

        $trainingUnitKerja = new TrainingUnitKerja();
        $trainingUnitKerja->id_unitkerja = $request->unitkerja;
        $trainingUnitKerja->nama_pelatihan = $request->nama_pelatihan;
        $trainingUnitKerja->jadwal_mulai_pelatihan = $request->tanggal_mulai_pelatihan. ' ' . $request->waktu_mulai_pelatihan;
        $trainingUnitKerja->jadwal_akhir_pelatihan = $request->tanggal_akhir_pelatihan. ' ' . $request->waktu_akhir_pelatihan;
        $trainingUnitKerja->deskripsi_pelatihan = $request->editor;
        $trainingUnitKerja->status = 0;
        $trainingUnitKerja->diajukan_oleh = $unitkerjaLogin->id;
        $trainingUnitKerja->save();

        return redirect()->route("unitkerja.training-unitkerja.index")->with( 
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

        $trainingUnitKerja = TrainingUnitKerja::where('id', $id)->first();
        $trainingUnitKerja->nama_pelatihan = $request->nama_pelatihan;
        $trainingUnitKerja->jadwal_mulai_pelatihan = $request->tanggal_mulai_pelatihan. ' ' . $request->waktu_mulai_pelatihan;
        $trainingUnitKerja->jadwal_akhir_pelatihan = $request->tanggal_akhir_pelatihan. ' ' . $request->waktu_akhir_pelatihan;
        $trainingUnitKerja->deskripsi_pelatihan = $request->editor;
        $trainingUnitKerja->save();

        return redirect()->route("unitkerja.training-unitkerja.index")->with( 
        "success", 
        "Data berhasil diubah." 
        ); 
    } 

    public function delete($id){
        $trainingUnitKerja = TrainingUnitKerja::where('id', $id)->delete();
        return redirect()->route("unitkerja.training-unitkerja.index")->with( 
            "success", 
            "Data berhasil dihapus." 
        ); 
    }
}
