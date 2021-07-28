<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Datapengajuan; 
class DatapengajuanController extends Controller 
{  
 public function index() 
 { 
 //ambil data max 10 
 $data = Datapengajuan::Simplepaginate(10); 
 //membuat variabel tampil yang diisi dengan data 
 $tampil['data'] = $data; 
 //tampilkan resources/views/datapengajuan/index.blade.php 
 return view("datapengajuan.index", $tampil); 
 } 
 public function create() 
 { 
 //tampilkan resources/views/datapengajuan/create.blade.php 
 return view("datapengajuan.create"); 
 } 
 
 public function store(Request $request) 
 { 
    //  echo json_encode($request);
 //validasi inputan 
 $this->validate($request, [ 
 'nama' => 'required', 
 'posisi' => 'required' 
 ]) ;
 $data = Datapengajuan::create($request->all()); 
 return redirect()->route("data_pengajuan.index")->with( 
 "success", 
 "Data berhasil disimpan." 
 ); 
 } 
 public function show($Datapengajuan) 
 { 
 // 
 } 
 
 public function edit($Datapengajuan) 
 { 
 $data = Datapengajuan::findOrFail($Datapengajuan); 
 //tampilkan resources/views/datapengajuan/edit.blade.php 
 return view("Datapengajuan.edit", $data); 
 } 
 public function update(Request $request, $Datapengajuan) 
 { 
 //validasi inputan 
 $this->validate($request, [ 
 'nama' => 'required', 
 'posisi' => 'required' 
 ]); 
 $data = Datapengajuan::findOrFail($Datapengajuan); 
 $data->nama = $request->nama; 
 $data->posisi = $request->posisi; 
 $data->save(); 
 
 return redirect()->route("Datapengajuan.index")->with( 
"success", 
"Data berhasil diubah." 
 ); 
 } 
 
 public function destroy($Datapengajuan) 
 { 
 $data = Datapengajuan::findOrFail($Datapengajuan); 
 $data->delete(); 
 } 
} 
