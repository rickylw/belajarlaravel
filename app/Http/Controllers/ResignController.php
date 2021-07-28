<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Resign; 
class ResignController extends Controller 
{  
 public function index() 
 { 
 //ambil data max 10 
 $data = Resign::Simplepaginate(10); 
 //membuat variabel tampil yang diisi dengan data 
 $tampil['data'] = $data; 
 //tampilkan resources/views/resign/index.blade.php 
 return view("resign.index", $tampil); 
 } 
 public function create() 
 { 
 //tampilkan resources/views/resign/create.blade.php 
 return view("resign.create"); 
 } 
 
 public function store(Request $request) 
 { 
    //  echo json_encode($request);
 //validasi inputan 
 $this->validate($request, [ 
 'nama' => 'required', 
 'nip' => 'required', 
 'jabatan' => 'required',
 'pekerjaan' => 'required',
 'hari' => 'required',
 'tanggal' => 'required',
 'alamat' => 'required'
 ]) ;
 $data = Resign::create($request->all()); 
 return redirect()->route("resign.index")->with( 
 "success", 
 "Data berhasil disimpan." 
 ); 
 } 
 public function show($Resign) 
 { 
 // 
 } 
 
 public function edit($Resign) 
 { 
 $data = Resign::findOrFail($Resign); 
 //tampilkan resources/views/resign/edit.blade.php 
 return view("Resign.edit", $data); 
 } 
 public function update(Request $request, $Resign) 
 { 
 //validasi inputan 
 $this->validate($request, [  
    'nama' => 'required', 
    'nip' => 'required', 
    'jabatan' => 'required',
    'pekerjaan' => 'required',
    'hari' => 'required',
    'tanggal' => 'required',
    'alamat' => 'required'
 ]); 
 $data = Resign::findOrFail($Resign); 
 $data->nama = $request->nama; 
 $data->nip = $request->nip; 
 $data->jabatan = $request->jabatan; 
 $data->pekerjaan = $request->pekerjaan; 
 $data->hari = $request->hari; 
 $data->tanggal = $request->tanggal;
 $data->alamat = $request->alamat; 
 $data->save(); 
 
 return redirect()->route("Resign.index")->with( 
"success", 
"Data berhasil diubah." 
 ); 
 } 
 
 public function destroy($Resign) 
 { 
 $data = Resign::findOrFail($Resign); 
 $data->delete(); 
 } 
} 