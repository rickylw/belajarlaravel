<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HasilInterview; 
use App\Models\Datapelamar; 

class HasilInterviewController extends Controller
{
    public function index() {
        $hasilInterview = DB::table('tbl_hasil_interview')
                       ->join('datapelamar', 'tbl_hasil_interview.id_pelamar', '=', 'datapelamar.id')
                       ->join('tbl_jenis_interview', 'tbl_jenis_interview.id', '=', 'tbl_hasil_interview.id_jenis_interview')
                       ->select(DB::raw('tbl_hasil_interview.*, datapelamar.nama as nama_pelamar, tbl_jenis_interview.nama as jenis_interview'))
                       ->where('tbl_hasil_interview.status', 0)
                       ->paginate(10);
        return view('pimpinan.hasil-interview.index', compact('hasilInterview'));
    }

    public function detail($id){
        $hasilInterview = DB::table('tbl_hasil_interview')
                       ->join('datapelamar', 'tbl_hasil_interview.id_pelamar', '=', 'datapelamar.id')
                       ->join('tbl_jenis_interview', 'tbl_jenis_interview.id', '=', 'tbl_hasil_interview.id_jenis_interview')
                       ->select(DB::raw('tbl_hasil_interview.*, datapelamar.nama as nama_pelamar, tbl_jenis_interview.nama as jenis_interview'))
                       ->where('tbl_hasil_interview.id', $id)->first();
        return view('pimpinan.hasil-interview.detail', compact('hasilInterview'));
    }
    
    public function submit($id, $status) {
        $hasilInterview = HasilInterview::where('id', $id)->first();
        $hasilInterview->status = $status;
        $hasilInterview->save();

        return redirect()->route("pimpinan.hasil-interview.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    }
}
