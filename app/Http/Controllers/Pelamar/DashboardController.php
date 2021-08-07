<?php

namespace App\Http\Controllers\Pelamar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Datapelamar; 
use App\Models\JadwalTes; 
use App\Models\HasilInterview; 
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
      $jadwalTesInterview = JadwalTes::where('id_pelamar', $datapelamar->id)->where('id_jenis_interview', 1)->first();
      $jadwalTesKontrakPegawai = JadwalTes::where('id_pelamar', $datapelamar->id)->where('id_jenis_interview', 2)->first();

      $hasilInterview = HasilInterview::where('id_pelamar', $datapelamar->id)->where('id_jenis_interview', 1)->first();
      $hasilKontrakPegawai = HasilInterview::where('id_pelamar', $datapelamar->id)->where('id_jenis_interview', 2)->first();
      return view('pelamar.jadwal-tes', compact('jadwalTesInterview', 'jadwalTesKontrakPegawai', 'hasilInterview', 'hasilKontrakPegawai', 'datapelamar'));
    }
}
