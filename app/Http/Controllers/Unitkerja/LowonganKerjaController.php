<?php

namespace App\Http\Controllers\Unitkerja;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\LowonganPekerjaan; 

class LowonganKerjaController extends Controller
{
    public function index() {
        $lowonganPekerjaan = LowonganPekerjaan::paginate(10);
        return view('unitkerja.lowongan-kerja.index', compact('lowonganPekerjaan'));
    }

    public function edit($id) {
        $lowonganPekerjaan = LowonganPekerjaan::where('id', $id)->first();
        return view('unitkerja.lowongan-kerja.edit', compact('lowonganPekerjaan'));
    }

    public function create() 
    { 
        return view("unitkerja.lowongan-kerja.create"); 
    } 

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'judul' => 'required', 
            'editor' => 'required',
        ]);

        $lowonganPekerjaan = new LowonganPekerjaan();
        $lowonganPekerjaan->judul = $request->judul;
        $lowonganPekerjaan->deskripsi = $request->editor;
        $lowonganPekerjaan->status = 0;
        $lowonganPekerjaan->save();

        return redirect()->route("unitkerja.lowongan-kerja.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function update(Request $request, $id) 
    { 
        $this->validate($request, [ 
            'judul' => 'required', 
            'editor' => 'required',
        ]);

        $lowonganPekerjaan = LowonganPekerjaan::where('id', $id)->first();
        $lowonganPekerjaan->judul = $request->judul;
        $lowonganPekerjaan->deskripsi = $request->editor;
        $lowonganPekerjaan->save();

        return redirect()->route("unitkerja.lowongan-kerja.index")->with( 
        "success", 
        "Data berhasil diubah." 
        ); 
    } 

    public function delete($id){
        $lowonganPekerjaan = LowonganPekerjaan::where('id', $id)->delete();
        return redirect()->route("unitkerja.lowongan-kerja.index")->with( 
            "success", 
            "Data berhasil dihapus." 
        ); 
    }
}
