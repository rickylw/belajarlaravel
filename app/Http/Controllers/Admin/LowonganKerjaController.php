<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\LowonganPekerjaan; 

class LowonganKerjaController extends Controller
{
    public function index() {
        $lowonganPekerjaan = LowonganPekerjaan::where('status', 0)->paginate(10);
        return view('admin.lowongan-pekerjaan.index', compact('lowonganPekerjaan'));
    }

    public function submit($id, $status) {
        $lowonganPekerjaan = LowonganPekerjaan::where('id', $id)->first();
        $lowonganPekerjaan->status = $status;
        $lowonganPekerjaan->save();

        return redirect()->route("admin.lowongan-kerja.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }
}
