<?php

namespace App\Http\Controllers\UnitKerja;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermohonanPenugasanUnitKerja; 
use App\Models\DataUnitKerja; 
use Illuminate\Support\Facades\Auth;

class PermohonanPenugasanController extends Controller
{
    public function index() {
        $unitkerjaLogin = DataUnitKerja::where('id_user', Auth::id())->first();
        $permohonanUnitKerja = PermohonanPenugasanUnitKerja::where('id_unitkerja', $unitkerjaLogin->id)->paginate(10);
        return view('unitkerja.permohonan-penugasan.index', compact('permohonanUnitKerja'));
    }
    
    public function edit($id) {
        $permohonanUnitKerja = PermohonanPenugasanUnitKerja::where('id', $id)->first();
        return view('unitkerja.permohonan-penugasan.edit', compact('permohonanUnitKerja'));
    }
    
    public function create() 
    { 
        return view("unitkerja.permohonan-penugasan.create"); 
    } 

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'judul' => 'required',
            'editor' => 'required'
        ]);

        $unitkerjaLogin = DataUnitKerja::where('id_user', Auth::id())->first();

        $permohonanUnitKerja = new PermohonanPenugasanUnitKerja();
        $permohonanUnitKerja->id_unitkerja = $unitkerjaLogin->id;
        $permohonanUnitKerja->judul = $request->judul;
        $permohonanUnitKerja->deskripsi_penugasan = $request->editor;
        $permohonanUnitKerja->save();

        return redirect()->route("unitkerja.permohonan-penugasan.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function delete($id){
        $permohonanUnitKerja = PermohonanPenugasanUnitKerja::where('id', $id)->delete();
        return redirect()->route("unitkerja.permohonan-penugasan.index")->with( 
            "success", 
            "Data berhasil dihapus." 
        ); 
    }

    public function update(Request $request, $id) 
    { 
        $this->validate($request, [ 
            'judul' => 'required',
            'editor' => 'required'
        ]);

        $permohonanUnitKerja = PermohonanPenugasanUnitKerja::where('id', $id)->first();
        $permohonanUnitKerja->judul = $request->judul;
        $permohonanUnitKerja->deskripsi_penugasan = $request->editor;
        $permohonanUnitKerja->save();

        return redirect()->route("unitkerja.permohonan-penugasan.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 
}
