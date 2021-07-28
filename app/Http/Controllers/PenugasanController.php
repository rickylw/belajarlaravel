<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Penugasan; 
class PenugasanController extends Controller 
{  
 public function index() 
 { 
 //ambil data max 10 
 $data = Penugasan::Simplepaginate(10); 
 //membuat variabel tampil yang diisi dengan data 
 $tampil['data'] = $data; 
 //tampilkan resources/views/penugasan/index.blade.php 
 return view("penugasan.index", $tampil); 
 } 
 public function create() 
 { 
 //tampilkan resources/views/penugasan/create.blade.php 
 return view("penugasan.create"); 
 } 
 
 public function store(Request $request) 
 { 
    //  echo json_encode($request);
 //validasi inputan 
 $this->validate($request, [ 
 'nama' => 'required', 
 'jabatan' => 'required',
 'pekerjaan' => 'required',
 'hari' => 'required',
 'tanggal' => 'required',
 'pukul' => 'required' 
 ]) ;
 $data = Penugasan::create($request->all()); 
 return redirect()->route("penugasan.index")->with( 
 "success", 
 "Data berhasil disimpan." 
 ); 
 } 
 public function show($Penugasan) 
 { 
 // 
 } 
 
 public function edit($Penugasan) 
 { 
 $data = Penugasan::findOrFail($Penugasan); 
 //tampilkan resources/views/penugasan/edit.blade.php 
 return view("Penugasan.edit", $data); 
 } 
 public function update(Request $request, $Penugasan) 
 { 
 //validasi inputan 
 $this->validate($request, [  
 'nama' => 'required', 
 'jabatan' => 'required',
 'pekerjaan' => 'required',
 'jenispenugasan' => 'required',
 'deskripsipenugasan' => 'required',
 'email' => 'required',
 'hp' => 'required',
 'hari' => 'required',
 'tanggal' => 'required'
 ]); 
 $data = Penugasan::findOrFail($Penugasan); 
 $data->nama = $request->nama; 
 $data->jabatan = $request->jabatan; 
 $data->pekerjaan = $request->pekerjaan; 
 $data->jenispenugasan = $request->jenispenugasan; 
 $data->deskripsipenugasan = $request->deskripsipenugasan; 
 $data->email = $request->email;
 $data->hp = $request->hp; 
 $data->hari = $request->hari;
 $data->tanggal = $request->tanggal;
 $data->save(); 
 
 return redirect()->route("Penugasan.index")->with( 
"success", 
"Data berhasil diubah." 
 ); 
 } 
 
 public function destroy($Penugasan) 
 { 
 $data = Penugasan::findOrFail($Penugasan); 
 $data->delete(); 
 } 
} 