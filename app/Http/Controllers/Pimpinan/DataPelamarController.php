<?php

namespace App\Http\Controllers\Pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Datapelamar; 

class DataPelamarController extends Controller
{
    public function index() 
    { 
        $tampil = DB::table('datapelamar')
                      ->join('tbl_status_pelamar', 'datapelamar.status', '=', 'tbl_status_pelamar.id')
                      ->select(DB::raw('datapelamar.*, tbl_status_pelamar.nama as nama_status'))
                      ->paginate(10);
       return view('pimpinan.datapelamar.index', compact('tampil'));
    } 

    public function detail($id){
        $datapelamar = Datapelamar::where('id', $id)->first();
        return view('pimpinan.datapelamar.detail', compact('datapelamar'));
    }
}
