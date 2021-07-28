<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use App\Daftarakun; 
use App\Models\User;
class DaftarakunController extends Controller 
{ 
 public function index() 
 { 
 //ambil data max 10 
 $data = Daftarakun::paginate(10); 
 //membuat variabel tampil yang diisi dengan data 
 $tampil['data'] = $data; 
 //tampilkan resources/views/datapengajuan/index.blade.php 
 return view("daftarakun.index", $tampil); 
 } 
 public function create() 
 { 
 //tampilkan resources/views/datapengajuan/create.blade.php 
 return view("daftarakun.create"); 
 } 
 
 public function store() 
 { 

//  $this->validate($request, [ 
//  'name' => 'required', 
//  'role' => 'required',
//  'email' => 'required',
//  'password' => 'required' 
//  ]) ;
//  $data = Daftarakun::create($request->all()); 
//  return redirect()->route("daftarakun.index")->with( 
//  "success", 
//  "Data berhasil disimpan." 
//  ); 

   request()->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'role' => ['required'],
   ]);

      User::create([
         'name' => request('name'),
         'email' => request('email'),
         'password' => Hash::make(request('password')),
         'role' => request('role'),
     ]);
   // return back();
    return redirect()->route("daftarakun.index")->with( 
    "success", 
    "Data berhasil disimpan." );
 } 
 public function show($Daftarakun) 
 { 
 // 
 } 
 
 public function edit($Daftarakun) 
 { 
 $data = Datapengajuan::findOrFail($Daftarakun); 
 //tampilkan resources/views/Daftarakun/edit.blade.php 
 return view("Daftarakun.edit", $data); 
 } 
 public function update(Request $request, $Daftarakun) 
 { 
 //validasi inputan 
 $this->validate($request, [ 
    'name' => 'required', 
    'role' => 'required',
    'email' => 'required',
    'password' => 'required' 
 ]); 
 $data = Daftarakun::findOrFail($Daftarakun); 
 $data->name = $request->name; 
 $data->password = $request->password; 
 $data->save(); 
 
 return redirect()->route("Daftarakun.index")->with( 
"success", 
"Data berhasil diubah." 
 ); 
 } 
 
 public function destroy($Daftarakun) 
 { 
 $data = Daftarakun::findOrFail($Daftarakun); 
 $data->delete(); 
 } 
} 