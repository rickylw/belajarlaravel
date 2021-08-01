<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\JadwalTes; 
use App\Models\Datapelamar; 
use App\Models\JenisInterview; 
use Illuminate\Support\Facades\DB;

class JadwalTesController extends Controller
{
    public function index() {
        $pelamar = DB::table('datapelamar')
                       ->join('tbl_jadwal_tes', 'tbl_jadwal_tes.id_pelamar', '=', 'datapelamar.id')
                       ->join('tbl_jenis_interview', 'tbl_jenis_interview.id', '=', 'tbl_jadwal_tes.id_jenis_interview')
                       ->select(DB::raw('tbl_jadwal_tes.*, datapelamar.nama as nama_pelamar, tbl_jenis_interview.nama as jenis_interview'))
                       ->paginate(10);
        return view('admin.jadwal-tes.index', compact('pelamar'));
    }

    public function edit($id) {
        $jadwalTes = DB::table('datapelamar')
                       ->join('tbl_jadwal_tes', 'tbl_jadwal_tes.id_pelamar', '=', 'datapelamar.id')
                       ->join('tbl_jenis_interview', 'tbl_jenis_interview.id', '=', 'tbl_jadwal_tes.id_jenis_interview')
                       ->select(DB::raw('tbl_jadwal_tes.*, datapelamar.nama as nama_pelamar, tbl_jenis_interview.nama as jenis_interview'))
                       ->where('tbl_jadwal_tes.id_pelamar', $id)
                       ->first();
        $jenisInterview = JenisInterview::all();
        return view('admin.jadwal-tes.edit', compact('jadwalTes', 'jenisInterview'));
    }

    public function create() {
        $pelamar = Datapelamar::all();
        $jenisInterview = JenisInterview::all();
        return view('admin.jadwal-tes.create', compact('pelamar', 'jenisInterview'));
    }

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'tanggal_tes' => 'required', 
            'waktu_tes' => 'required',
            'editor' => 'required',
            'pelamar' => 'required',
            'jenis_interview' => 'required'
        ]);

        $tmp = JadwalTes::where('id_pelamar', $request->pelamar)->where('id_jenis_interview', $request->jenis_interview)->get();
        if(count($tmp) > 0){
            return redirect()->route("admin.jadwal-tes.index")->with( 
            "failed", 
            "Data gagal disimpan." 
            ); 
        }


        $jadwalTes = new JadwalTes();
        $jadwalTes->jadwal_tes = $request->tanggal_tes. ' ' . $request->waktu_tes;
        $jadwalTes->deskripsi = $request->editor;
        $jadwalTes->id_pelamar = $request->pelamar;
        $jadwalTes->id_jenis_interview = $request->jenis_interview;
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
            'editor' => 'required',
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
