<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Datapegawai;
class DatapegawaiController extends Controller
{
 public function index()
 {
 //ambil data max 10
 $data = Datapegawai::Simplepaginate(10);
 //membuat variabel tampil yang diisi dengan data
 $tampil['data'] = $data;
 //tampilkan resources/views/datapegawai/index.blade.php
 return view("datapegawai.index", $tampil);
 }
 public function create()
 {
 //tampilkan resources/views/datapegawai/create.blade.php
 return view("datapegawai.create");
 }

 public function store(Request $request)
 {

    //  echo json_encode($request);
 //validasi inputan
 $this->validate($request, [
   'name' => 'required',
   'alamat' => 'required',
   'tempatlahir' => 'required',
   'tanggal_lahir' => 'required',
   'pendidikan' => 'required',
   'programstudi' => 'required',
   'tahunkelulusan' => 'required',
   'jabatan' => 'required',
   'tanggalsk' => 'required',
   'foto' => 'required',
   'email' => 'required',
   'hp' => 'required',

 ]) ;

 $data = Datapegawai::create($request->all());

 if ($image = $request->file('foto')) {
   $destinationPath = 'foto/';
   $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
   $image->move($destinationPath, $profileImage);
   $input['foto'] = "$profileImage";
}
 return redirect()->route("datapegawai.index")->with(
 "success",
 "Data berhasil disimpan."
 );
 }
 public function show($Datapegawai)
 {
 //
 }

 public function edit($Datapegawai)
 {
 $data = Datapegawai::findOrFail($Datapegawai);
 //tampilkan resources/views/Datapegawai/edit.blade.php
 return view("datapegawai.edit", $data);
 }
 public function update(Request $request, $Pegawai)
 {
 //validasi inputan
 $this->validate($request, [
    'name' => 'required',
    'alamat' => 'required',
    'tempatlahir' => 'required',
    'tanggal_lahir' => 'required',
    'pendidikan' => 'required',
    'programstudi' => 'required',
    'tahunkelulusan' => 'required',
    'jabatan' => 'required',
    'tanggalsk' => 'required',
    'foto' => 'required',
    'email' => 'required',
    'hp' => 'required',
 ]);
 $input = $request->all();

        if ($image = $request->file('foto')) {
            $destinationPath = 'foto/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto'] = "$profileImage";
        }else{
            unset($input['foto']);
        }
 $data = Datapegawai::findOrFail($Pegawai);
 $data->name = $request->name;
 $data->alamat = $request->alamat;
 $data->tempatlahir = $request->tempatlahir;
 $data->tanggal_lahir = $request->tanggal_lahir;
 $data->pendidikan = $request->pendidikan;
 $data->programstudi = $request->programstudi;
 $data->tahunkelulusan = $request->tahunkelulusan;
 $data->jabatan = $request->jabatan;
 $data->tanggalsk = $request->tanggalsk;
 $data->foto = $request->foto;
 $data->email = $request->email;
 $data->hp = $request->hp;
 $data->save();

 return redirect()->route("datapegawai.index")->with(
"success",
"Data berhasil diubah."
 );
 }

public function upload(Request $request){
   if($request->hasFile('foto')){
       $resorce       = $request->file('foto');
       $name   = $resorce->getClientOriginalName();
       $resorce->move(\base_path() ."/public/foto", $name);
       echo "Gambar berhasil di upload";
   }else{
       echo "Gagal upload gambar";
   }
   }

 public function destroy($Pegawai)
 {
 $data = Datapegawai::findOrFail($Pegawai);
 $data->delete();
 }
}
