<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Training; 
class TrainingController extends Controller 
{  
 public function index() 
 { 
 //ambil data max 10 
 $data = Training::Simplepaginate(10); 
 //membuat variabel tampil yang diisi dengan data 
 $tampil['data'] = $data; 
 //tampilkan resources/views/training/index.blade.php 
 return view("training.index", $tampil); 
 } 
 public function create() 
 { 
 //tampilkan resources/views/training/create.blade.php 
 return view("training.create"); 
 } 
 
 public function store(Request $request) 
 { 
    //  echo json_encode($request);
 //validasi inputan 
 $this->validate($request, [ 
 'nama' => 'required', 
 'jabatan' => 'required',
 'pekerjaan' => 'required',
 'email' => 'required',
 'hp' => 'required',
 'hari' => 'required',
 'tanggal' => 'required',
 'namapelatihan' => 'required'
 ]) ;
 $data = Training::create($request->all()); 
 return redirect()->route("training.index")->with( 
 "success", 
 "Data berhasil disimpan." 
 ); 
 } 
 public function show($Training) 
 { 
 // 
 } 
 
 public function edit($Training) 
 { 
 $data = Training::findOrFail($Training); 
 //tampilkan resources/views/training/edit.blade.php 
 return view("Training.edit", $data); 
 } 
 public function update(Request $request, $Training) 
 { 
 //validasi inputan 
 $this->validate($request, [  
 'nama' => 'required', 
 'jabatan' => 'required',
 'pekerjaan' => 'required',
 'email' => 'required',
 'hp' => 'required',
 'hari' => 'required',
 'tanggal' => 'required',
 'namapelatihan' => 'required'
 ]); 
 $data = Training::findOrFail($Training); 
 $data->nama = $request->nama; 
 $data->jabatan = $request->jabatan; 
 $data->pekerjaan = $request->pekerjaan; 
 $data->email = $request->email; 
 $data->hp = $request->hp; 
 $data->hari = $request->hari;
 $data->tanggal = $request->tanggal;
 $data->namapelatihan = $request->namapelatihan;
 $data->save(); 
 
 return redirect()->route("Training.index")->with( 
"success", 
"Data berhasil diubah." 
 ); 
 } 
 
 public function destroy($Training) 
 { 
 $data = Training::findOrFail($Training); 
 $data->delete(); 
 } 
} 