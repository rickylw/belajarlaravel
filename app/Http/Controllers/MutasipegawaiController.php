<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Mutasipegawai; 
class MutasipegawaiController extends Controller 
{  
 public function index() 
 { 
 //ambil data max 10 
 $data = Mutasipegawai::Simplepaginate(10); 
 //membuat variabel tampil yang diisi dengan data 
 $tampil['data'] = $data; 
 //tampilkan resources/views/mutasipegawai/index.blade.php 
 return view("mutasipegawai.index", $tampil); 
 } 
 public function create() 
 { 
 //tampilkan resources/views/mutasipegawai/create.blade.php 
 return view("mutasipegawai.create"); 
 } 
 
 public function store(Request $request) 
 { 
    //  echo json_encode($request);
 //validasi inputan 
 $this->validate($request, [ 
    'nama' => 'required', 
    'jabatan' => 'required',
    'pekerjaan' => 'required',
    'mutasitujuan' => 'required',
    'deskripsimutasipegawai' => 'required',
    'email' => 'required',
    'hp' => 'required',
    'hari' => 'required',
    'tanggal' => 'required'
 ]) ;
 $data = Mutasipegawai::create($request->all()); 
 return redirect()->route("mutasipegawai.index")->with( 
 "success", 
 "Data berhasil disimpan." 
 ); 
 } 
 public function show($Mutasipegawai) 
 { 
 // 
 } 
 
 public function edit($Mutasipegawai) 
 { 
 $data = Mutasipegawai::findOrFail($Mutasipegawai); 
 //tampilkan resources/views/mutasipegawai/edit.blade.php 
 return view("Mutasipegawai.edit", $data); 
 } 
 public function update(Request $request, $Mutasipegawai) 
 { 
 //validasi inputan 
 $this->validate($request, [  
 'nama' => 'required', 
 'jabatan' => 'required',
 'pekerjaan' => 'required',
 'mutasitujuan' => 'required',
 'deskripsimutasipegawai' => 'required',
 'email' => 'required',
 'hp' => 'required',
 'hari' => 'required',
 'tanggal' => 'required'
 ]); 
 $data = Mutasipegawai::findOrFail($Mutasipegawai); 
 $data->nama = $request->nama; 
 $data->jabatan = $request->jabatan; 
 $data->pekerjaan = $request->pekerjaan; 
 $data->mutasitujuan = $request->mutasitujuan; 
 $data->deskripsimutasipegawai = $request->deskripsimutasipegawai; 
 $data->email = $request->email;
 $data->hp = $request->hp; 
 $data->hari = $request->hari;
 $data->tanggal = $request->tanggal;
 $data->save(); 
 
 return redirect()->route("Mutasipegawai.index")->with( 
"success", 
"Data berhasil diubah." 
 ); 
 } 
 
 public function destroy($Mutasipegawai) 
 { 
 $data = Mutasipegawai::findOrFail($Mutasipegawai); 
 $data->delete(); 
 } 
} 