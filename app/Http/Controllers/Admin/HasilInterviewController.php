<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\HasilInterview; 
use App\Models\Datapelamar; 
use App\Models\JenisInterview; 
use Illuminate\Support\Facades\DB;

class HasilInterviewController extends Controller
{
    public function index() {
        $hasilInterview = DB::table('tbl_hasil_interview')
                       ->join('datapelamar', 'tbl_hasil_interview.id_pelamar', '=', 'datapelamar.id')
                       ->join('tbl_jenis_interview', 'tbl_jenis_interview.id', '=', 'tbl_hasil_interview.id_jenis_interview')
                       ->select(DB::raw('tbl_hasil_interview.*, datapelamar.nama as nama_pelamar, tbl_jenis_interview.nama as jenis_interview'))
                       ->paginate(10);
        return view('admin.hasil-interview.index', compact('hasilInterview'));
    }

    public function create() {
        $pelamar = Datapelamar::all();
        $jenisInterview = JenisInterview::all();
        return view('admin.hasil-interview.create', compact('pelamar', 'jenisInterview'));
    }

    public function edit($id) {
        $hasilInterview = DB::table('tbl_hasil_interview')
                       ->join('datapelamar', 'tbl_hasil_interview.id_pelamar', '=', 'datapelamar.id')
                       ->join('tbl_jenis_interview', 'tbl_jenis_interview.id', '=', 'tbl_hasil_interview.id_jenis_interview')
                       ->select(DB::raw('tbl_hasil_interview.*, datapelamar.nama as nama_pelamar, tbl_jenis_interview.nama as jenis_interview'))
                       ->where('tbl_hasil_interview.id', $id)
                       ->first();
        $jenisInterview = JenisInterview::all();
        return view('admin.hasil-interview.edit', compact('hasilInterview', 'jenisInterview'));
    }

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'pelamar' => 'required', 
            'jenis_interview' => 'required',
            'editor' => 'required'
        ]);

        $tmp = HasilInterview::where('id_pelamar', $request->pelamar)->where('id_jenis_interview', $request->jenis_interview)->get();
        if(count($tmp) > 0){
            return redirect()->route("admin.hasil-interview.index")->with( 
            "failed", 
            "Data gagal disimpan." 
            ); 
        }


        $hasilInterview = new HasilInterview();
        $hasilInterview->hasil_interview = $request->editor;
        $hasilInterview->id_jenis_interview = $request->jenis_interview;
        $hasilInterview->status = 0;
        $hasilInterview->id_pelamar = $request->pelamar;

        if($request->lampiran){
            $namefile = 'lampiran_'. date("Y_m_d_H_i_s") .'.'.$request->lampiran->extension();
            $inputs['lampiran'] = 'storage/hasil_interview/'.$request->pelamar.'/'.$namefile;
            request('lampiran')->storeAs('hasil_interview/'.$request->pelamar, $namefile, 'public');
            $hasilInterview->lampiran = $inputs['lampiran'];
        }

        $hasilInterview->save();

        return redirect()->route("admin.hasil-interview.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 

    public function delete($id){
        $hasilInterview = HasilInterview::where('id', $id)->delete();

        if(isset($hasilInterview->lampiran)){
            //Hapus foto lama
            $filenameLama = explode("/", $hasilInterview->lampiran);
            \Storage::disk('public')->delete('hasil_interview/'.$hasilInterview->id_pelamar.'/'.$filenameLama[count($filenameLama)-1]);
         }

        return redirect()->route("admin.hasil-interview.index")->with( 
            "success", 
            "Data berhasil dihapus." 
        ); 
    }

    public function update(Request $request, $id) 
    { 
        $this->validate($request, [ 
            'editor' => 'required'
        ]);


        $hasilInterview = HasilInterview::where('id', $id)->first();
        $hasilInterview->hasil_interview = $request->editor;

        if($request->lampiran){
            if(isset($hasilInterview->lampiran)){
               //Hapus foto lama
               $filenameLama = explode("/", $hasilInterview->lampiran);
               \Storage::disk('public')->delete('hasil_interview/'.$hasilInterview->id_pelamar.'/'.$filenameLama[count($filenameLama)-1]);
            }

            $namefile = 'lampiran_'. date("Y_m_d_H_i_s") .'.'.$request->lampiran->extension();
            $inputs['lampiran'] = 'storage/hasil_interview/'.$hasilInterview->id_pelamar.'/'.$namefile;
            request('lampiran')->storeAs('hasil_interview/'.$hasilInterview->id_pelamar, $namefile, 'public');
            $hasilInterview->lampiran = $inputs['lampiran'];
        }

        $hasilInterview->save();

        return redirect()->route("admin.hasil-interview.index")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 
}
