<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User; 
use App\Models\Pesan; 

class PesanController extends Controller
{
    public function pesanMasuk(){
        $pesan = DB::table('tbl_pesan')
                       ->join('users', 'tbl_pesan.dari_user', '=', 'users.id')
                       ->select(DB::raw('tbl_pesan.*, users.name as nama_pengirim'))
                       ->where('ke_user', Auth::id())
                       ->paginate(10);
        return view('pimpinan.pesan.pesan-masuk', compact('pesan'));
    }

    public function pesanKeluar(){
        $pesan = DB::table('tbl_pesan')
                       ->join('users', 'tbl_pesan.ke_user', '=', 'users.id')
                       ->select(DB::raw('tbl_pesan.*, users.name as nama_penerima'))
                       ->where('dari_user', Auth::id())
                       ->paginate(10);
        return view('pimpinan.pesan.pesan-keluar', compact('pesan'));
    }

    public function create(){
        $admin = User::where('role', 'admin')->get();
        return view('pimpinan.pesan.create', compact('admin'));
    }

    public function detailPesanKeluar($id){
        $pesan = DB::table('tbl_pesan')
                       ->join('users', 'tbl_pesan.ke_user', '=', 'users.id')
                       ->select(DB::raw('tbl_pesan.*, users.name as nama_penerima'))
                       ->where('tbl_pesan.id', $id)
                       ->first();
        return view('pimpinan.pesan.detail', compact('pesan'));
    }

    public function detailPesanMasuk($id){
        $pesan = DB::table('tbl_pesan')
                       ->join('users', 'tbl_pesan.dari_user', '=', 'users.id')
                       ->select(DB::raw('tbl_pesan.*, users.name as nama_pengirim'))
                       ->where('tbl_pesan.id', $id)
                       ->first();
        if($pesan->dibaca == 0){
            $tmp = Pesan::where('id', $pesan->id)->first();
            $tmp->dibaca = 1;
            $tmp->save();
        }
        return view('pimpinan.pesan.detail', compact('pesan'));
    }

    public function store(Request $request) 
    { 
        $this->validate($request, [ 
            'penerima' => 'required', 
            'subjek' => 'required',
            'editor' => 'required',
        ]);

        $pesan = new Pesan();
        $pesan->subjek = $request->subjek;
        $pesan->isi_pesan = $request->editor;
        $pesan->dari_user = Auth::id();
        $pesan->ke_user = $request->penerima;
        $pesan->dibaca = 0;
        $pesan->save();

        return redirect()->route("pimpinan.pesan.create")->with( 
        "success", 
        "Data berhasil disimpan." 
        ); 
    } 
}
