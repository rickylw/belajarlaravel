<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Lembur;
use App\Datapegawai;
class LemburController extends Controller
{
 public function index()
 {
 //ambil data max 10
 $data = Lembur::Simplepaginate(10);
 //membuat variabel tampil yang diisi dengan data
 $tampil['data'] = $data;
 //tampilkan resources/views/lembur/index.blade.php
 return view("lembur.index", $tampil);
 }
 public function create()
 {

    $tampil['pegawai'] = Datapegawai::all();
 //tampilkan resources/views/lembur/create.blade.php
 return view("lembur.create",$tampil);
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
 $data = Lembur::create($request->all());
 return redirect()->route("lembur.index")->with(
 "success",
 "Data berhasil disimpan."
 );
 }
 public function show($Lembur)
 {
 //
 }

 public function edit($Lembur)
 {
 $data = Lembur::findOrFail($Lembur);
 //tampilkan resources/views/lembur/edit.blade.php
 return view("Lembur.edit", $data);
 }
 public function update(Request $request, $Lembur)
 {
 //validasi inputan
 $this->validate($request, [
 'nama' => 'required',
 'jabatan' => 'required',
 'pekerjaan' => 'required',
 'hari' => 'required',
 'tanggal' => 'required',
 'pukul' => 'required'
 ]);
 $data = Lembur::findOrFail($Lembur);
 $data->nama = $request->nama;
 $data->jabatan = $request->jabatan;
 $data->pekerjaan = $request->pekerjaan;
 $data->hari = $request->hari;
 $data->tanggal = $request->tanggal;
 $data->pukul = $request->pukul;
 $data->save();

 return redirect()->route("Lembur.index")->with(
"success",
"Data berhasil diubah."
 );
 }

 public function destroy($Lembur)
 {
 $data = Lembur::findOrFail($Lembur);
 $data->delete();
 }
}
