<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\JadwalTes; 
use App\Models\Datapelamar; 
use Illuminate\Support\Facades\DB;

class JadwalTesController extends Controller
{
    public function index() {
        $pelamar = DB::table('datapelamar')
                       ->join('tbl_jadwal_tes', 'tbl_jadwal_tes.id_pelamar', '=', 'datapelamar.id')
                       ->select(DB::raw('tbl_jadwal_tes.*, datapelamar.nama as nama_pelamar'))
                       ->paginate(10);
        return view('admin.jadwal-tes.index', compact('pelamar'));
    }

    public function edit($id) {
        $jadwalTes = DB::table('datapelamar')
                       ->join('tbl_jadwal_tes', 'tbl_jadwal_tes.id_pelamar', '=', 'datapelamar.id')
                       ->select(DB::raw('tbl_jadwal_tes.*, datapelamar.nama as nama_pelamar'))
                       ->where('tbl_jadwal_tes.id_pelamar', $id)
                       ->first();
        return view('admin.jadwal-tes.edit', compact('jadwalTes'));
    }

    public function create() {
        $pelamar = DB::table('datapelamar')
                       ->leftJoin('tbl_jadwal_tes', 'tbl_jadwal_tes.id_pelamar', '=', 'datapelamar.id')
                       ->select(DB::raw('datapelamar.*'))
                       ->where('datapelamar.status', 1)
                       ->whereNull('tbl_jadwal_tes.id')
                       ->get();
        return view('admin.jadwal-tes.create', compact('pelamar'));
    }

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'tanggal_tes' => 'required', 
            'waktu_tes' => 'required',
            'editor' => 'required',
            'pelamar' => 'required'
        ]);


        $jadwalTes = new JadwalTes();
        $jadwalTes->jadwal_tes = $request->tanggal_tes. ' ' . $request->waktu_tes;
        $jadwalTes->deskripsi = $request->editor;
        $jadwalTes->id_pelamar = $request->pelamar;
        $jadwalTes->save();

        return redirect()->route("admin.jadwal-tes.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function delete($id){
        $jadwalTes = JadwalTes::where('id', $id)->delete();
        return redirect()->route("admin.jadwal-tes.index")->with( 
            "success", 
            "Data berhasil dihapus." 
        ); 
    }

    public function update(Request $request, $id) 
    { 
        $this->validate($request, [ 
            'tanggal_tes' => 'required', 
            'waktu_tes' => 'required',
            'editor' => 'required'
        ]);

        $jadwalTes = JadwalTes::where('id', $id)->first();
        $jadwalTes->jadwal_tes = $request->tanggal_tes. ' ' . $request->waktu_tes;
        $jadwalTes->deskripsi = $request->editor;
        $jadwalTes->save();

        return redirect()->route("admin.jadwal-tes.index")->with( 
        "success", 
        "Data berhasil diubah." 
        ); 
    } 
}
