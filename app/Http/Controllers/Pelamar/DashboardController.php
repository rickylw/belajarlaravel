<?php

namespace App\Http\Controllers\Pelamar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Datapelamar; 
use App\Models\JadwalTes; 
use Auth;

class DashboardController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }
    public function index() {
      $datapelamar = Datapelamar::where('id_user', Auth::id())->first();
      return view('pelamar.informasi-diri', compact('datapelamar'));
    }
    public function jadwalTes() {
      $datapelamar = Datapelamar::where('id_user', Auth::id())->first();
      $jadwalTes = JadwalTes::where('id_pelamar', $datapelamar->id)->first();
      
      

      return view('pelamar.jadwal-tes', compact('jadwalTes'));
    }
}
