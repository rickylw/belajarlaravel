<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Models\Datapelamar; 
use App\Models\HasilInterview; 
use App\Models\StatusPelamar; 
use Illuminate\Support\Facades\DB;
// namespace App\Http\Controllers; 
// use Illuminate\Http\Request; 
use App\Models\User; 
use PDF;
// use App\Datapelamar; 
// use App\Datapengajuan; 
use Hash; 
class DatapelamarController extends Controller 
{ 
 
   public function index() 
   { 
      //ambil data max 10 
      //  $tampil = Datapelamar::paginate(10); 
      //membuat variabel tampil yang diisi dengan data 
      //  foreach ($data as $item) { 
      //  $item->datapelamar = DataPelamar::find($item->id_kelas); 
      //  $item->user = Datapelamar::find($item->id_user); 
      //  } 
      //  $tampil['data'] = $data; 
      //tampilkan resources/views/siswa/index.blade.php beserta variabel tampil 
      //  return view("datapelamar.index", $tampil); 
      $tampil = DB::table('datapelamar')
                     ->join('tbl_status_pelamar', 'datapelamar.status', '=', 'tbl_status_pelamar.id')
                     ->select(DB::raw('datapelamar.*, tbl_status_pelamar.nama as nama_status'))
                     ->paginate(10);
      return view('datapelamar.index', compact('tampil'));
   } 

   public function create() 
   { 
      //tampilkan resources/views/siswa/create.blade.php 
      $data['datapelamar'] = Datapelamar::get();
      return view("datapelamar.create",$data); 
   } 

   public function store(Request $request) 
   { 
      //validasi inputan 
      $this->validate($request, [ 
         'nama' => 'required', 
         'tempat_lahir' => 'required', 
         'tanggal_lahir' => 'required', 
         'jenis_kelamin' => 'required', 
         'email' => 'required|email|unique:users', 
         'no_hp' => 'required', 
         'foto_kk' => 'required', 
         'foto_ktp' => 'required', 
         'foto_ijazah' => 'required', 
         'foto_diri' => 'required', 
         'foto_skck' => 'required', 
         'surat_keterangan_sehat' => 'required', 
         'password' => 'required', 
         'password_confirmation' => 'required|same:password', 
      ]);

      $enkripsi = Hash::make($request->password);

      $user = new User();
      $user->name = $request->nama;
      $user->email = $request->email;
      $user->password = $enkripsi;
      $user->role = "pelamar";
      $user->save();

      $pelamar = new Datapelamar();
      $pelamar->nama = $request->nama;
      $pelamar->tanggal_lahir = $request->tanggal_lahir;
      $pelamar->tempat_lahir = $request->tempat_lahir;
      $pelamar->jenis_kelamin = ($request->jenis_kelamin == "Laki-Laki") ? 0 : 1;
      $pelamar->email = $request->email;
      $pelamar->no_hp = $request->no_hp;
      $pelamar->id_user = $user->id;
      $pelamar->status = 1;

      if($request->foto_kk){
         $namefile = 'kk_'. date("Y_m_d_H_i_s") .'.'.$request->foto_kk->extension();
         $inputs['foto_kk'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
         request('foto_kk')->storeAs('pelamar/'.$user->id, $namefile, 'public');
         $pelamar->foto_kk = $inputs['foto_kk'];
     }

     if($request->foto_ktp){
         $namefile = 'ktp_'. date("Y_m_d_H_i_s") .'.'.$request->foto_ktp->extension();
         $inputs['foto_ktp'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
         request('foto_ktp')->storeAs('pelamar/'.$user->id, $namefile, 'public');
         $pelamar->foto_ktp = $inputs['foto_ktp'];
      }

      if($request->foto_ijazah){
          $namefile = 'ijazah_'. date("Y_m_d_H_i_s") .'.'.$request->foto_ijazah->extension();
          $inputs['foto_ijazah'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
          request('foto_ijazah')->storeAs('pelamar/'.$user->id, $namefile, 'public');
          $pelamar->foto_ijazah = $inputs['foto_ijazah'];
       }

      if($request->foto_diri){
         $namefile = 'diri_'. date("Y_m_d_H_i_s") .'.'.$request->foto_diri->extension();
         $inputs['foto_diri'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
         request('foto_diri')->storeAs('pelamar/'.$user->id, $namefile, 'public');
         $pelamar->foto_diri = $inputs['foto_diri'];
      }

      if($request->foto_skck){
         $namefile = 'skck_'. date("Y_m_d_H_i_s") .'.'.$request->foto_skck->extension();
         $inputs['foto_skck'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
         request('foto_skck')->storeAs('pelamar/'.$user->id, $namefile, 'public');
         $pelamar->foto_skck = $inputs['foto_skck'];
      }

      if($request->surat_keterangan_sehat){
         $namefile = 'surat_keterangan_sehat_'. date("Y_m_d_H_i_s") .'.'.$request->surat_keterangan_sehat->extension();
         $inputs['surat_keterangan_sehat'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
         request('surat_keterangan_sehat')->storeAs('pelamar/'.$user->id, $namefile, 'public');
         $pelamar->surat_keterangan_sehat = $inputs['surat_keterangan_sehat'];
      }

      if($request->surat_pengalaman_kerja){
         $namefile = 'surat_pengalaman_kerja_'. date("Y_m_d_H_i_s") .'.'.$request->surat_pengalaman_kerja->extension();
         $inputs['surat_pengalaman_kerja'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
         request('surat_pengalaman_kerja')->storeAs('pelamar/'.$user->id, $namefile, 'public');
         $pelamar->surat_pengalaman_kerja = $inputs['surat_pengalaman_kerja'];
      }
       
      $pelamar->save();

      return redirect()->route("data_pelamar.index")->with( 
      "success", 
      "Data berhasil disimpan." 
      ); 
   } 
 public function show($datapelamar) 
 { 
 // 
 } 

   public function edit($datapelamar) 
   { 
      $data = Datapelamar::findOrFail($datapelamar); 
      $data->datapelamar = Datapelamar::where('id',$datapelamar)->first(); 
      $data->user = User::find($data->id_user); 

      $hasilInterview = HasilInterview::where('id_pelamar', $datapelamar)->get();
      $isLolos = true;
      if(count($hasilInterview) < 2){
         $isLolos = false;
      }
      else{
         foreach($hasilInterview as $v){
            if($v->status == 2){
               $isLolos = false;
            }
         }
      }
      $data->isLolos = $isLolos;
      //tampilkan resources/views/datapelamar/edit.blade.php 
      return view("datapelamar.edit", $data); 
   } 

   public function ubahStatus($id){
      $pelamar = Datapelamar::where('id', $id)->first();
      $pelamar->status = 4;
      $pelamar->save(); 
      return redirect()->route("data_pelamar.index")->with( 
         "success", 
         "Data berhasil disimpan." 
      ); 
   }

   public function update(Request $request, $id) 
   { 
      //validasi inputan 
      $this->validate($request, [ 
         'nama' => 'required', 
         'tempat_lahir' => 'required', 
         'tanggal_lahir' => 'required', 
         'jenis_kelamin' => 'required', 
         'no_hp' => 'required', 
      ]);

      $pelamar = Datapelamar::where('id', $id)->first();
      $user = User::where('id', $pelamar->id_user)->first();

      $pelamar->nama = $request->nama;
      $pelamar->tanggal_lahir = $request->tanggal_lahir;
      $pelamar->tempat_lahir = $request->tempat_lahir;
      $pelamar->jenis_kelamin = ($request->jenis_kelamin == "Laki-Laki") ? 0 : 1;
      $pelamar->no_hp = $request->no_hp;

      if($request->foto_kk){
         //Hapus foto lama
         $filenameLama = explode("/", $pelamar->foto_kk);
         \Storage::disk('public')->delete('pelamar/'.$user->id.'/'.$filenameLama[count($filenameLama)-1]);

         $namefile = 'kk_'. date("Y_m_d_H_i_s") .'.'.$request->foto_kk->extension();
         $inputs['foto_kk'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
         request('foto_kk')->storeAs('pelamar/'.$user->id, $namefile, 'public');
         $pelamar->foto_kk = $inputs['foto_kk'];
     }

     if($request->foto_ktp){
         //Hapus foto lama
         $filenameLama = explode("/", $pelamar->foto_ktp);
         \Storage::disk('public')->delete('pelamar/'.$user->id.'/'.$filenameLama[count($filenameLama)-1]);

         $namefile = 'ktp_'. date("Y_m_d_H_i_s") .'.'.$request->foto_ktp->extension();
         $inputs['foto_ktp'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
         request('foto_ktp')->storeAs('pelamar/'.$user->id, $namefile, 'public');
         $pelamar->foto_ktp = $inputs['foto_ktp'];
      }

      if($request->foto_ijazah){
         //Hapus foto lama
         $filenameLama = explode("/", $pelamar->foto_ijazah);
         \Storage::disk('public')->delete('pelamar/'.$user->id.'/'.$filenameLama[count($filenameLama)-1]);
   
          $namefile = 'ijazah_'. date("Y_m_d_H_i_s") .'.'.$request->foto_ijazah->extension();
          $inputs['foto_ijazah'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
          request('foto_ijazah')->storeAs('pelamar/'.$user->id, $namefile, 'public');
          $pelamar->foto_ijazah = $inputs['foto_ijazah'];
       }

      if($request->foto_diri){
         //Hapus foto lama
         $filenameLama = explode("/", $pelamar->foto_diri);
         \Storage::disk('public')->delete('pelamar/'.$user->id.'/'.$filenameLama[count($filenameLama)-1]);
   
         $namefile = 'diri_'. date("Y_m_d_H_i_s") .'.'.$request->foto_diri->extension();
         $inputs['foto_diri'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
         request('foto_diri')->storeAs('pelamar/'.$user->id, $namefile, 'public');
         $pelamar->foto_diri = $inputs['foto_diri'];
      }

      if($request->foto_skck){
         //Hapus foto lama
         $filenameLama = explode("/", $pelamar->foto_skck);
         \Storage::disk('public')->delete('pelamar/'.$user->id.'/'.$filenameLama[count($filenameLama)-1]);
   
         $namefile = 'skck_'. date("Y_m_d_H_i_s") .'.'.$request->foto_skck->extension();
         $inputs['foto_skck'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
         request('foto_skck')->storeAs('pelamar/'.$user->id, $namefile, 'public');
         $pelamar->foto_skck = $inputs['foto_skck'];
      }

      if($request->surat_keterangan_sehat){
         //Hapus foto lama
         $filenameLama = explode("/", $pelamar->surat_keterangan_sehat);
         \Storage::disk('public')->delete('pelamar/'.$user->id.'/'.$filenameLama[count($filenameLama)-1]);
   
         $namefile = 'surat_keterangan_sehat_'. date("Y_m_d_H_i_s") .'.'.$request->surat_keterangan_sehat->extension();
         $inputs['surat_keterangan_sehat'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
         request('surat_keterangan_sehat')->storeAs('pelamar/'.$user->id, $namefile, 'public');
         $pelamar->surat_keterangan_sehat = $inputs['surat_keterangan_sehat'];
      }

      if($request->surat_pengalaman_kerja){
         if(isset($pelamar->surat_pengalaman_kerja)){
            //Hapus foto lama
            $filenameLama = explode("/", $pelamar->surat_pengalaman_kerja);
            \Storage::disk('public')->delete('pelamar/'.$user->id.'/'.$filenameLama[count($filenameLama)-1]);
         }
   
         $namefile = 'surat_pengalaman_kerja_'. date("Y_m_d_H_i_s") .'.'.$request->surat_pengalaman_kerja->extension();
         $inputs['surat_pengalaman_kerja'] = 'storage/pelamar/'.$user->id.'/'.$namefile;
         request('surat_pengalaman_kerja')->storeAs('pelamar/'.$user->id, $namefile, 'public');
         $pelamar->surat_pengalaman_kerja = $inputs['surat_pengalaman_kerja'];
      }
       
      $pelamar->save();

      $user->name = $request->nama;

      //jika password tidak kosong 
      if ($request->password!="") { 

         $enkripsi = Hash::make($request->password);   
         $user->password = $enkripsi;
         
      } 
      $user->save(); 

      return redirect()->route("data_pelamar.index")->with( 
      "success", 
      "Data berhasil disimpan." 
      ); 
   } 
      
   public function destroy($datapelamar) 
   { 
   $dataDatapelamar = Datapelamar::findOrFail($datapelamar); 
   $dataDatapelamar->delete(); 
   $dataUser = User::findOrFail($dataDatapelamar->id_user); 
   $dataUser->delete(); 
   } 

   public function cetakSK($id){
      $pelamar = Datapelamar::where('id', $id)->first();
      $pdf = PDF::loadView('pdf/surat-keterangan-lulus', compact('pelamar'));

      $namefile = 'surat_keterangan_lulus_'. date("Y_m_d_H_i_s") .'.pdf';
      $inputs['surat_keterangan_lulus'] = 'storage/pelamar/'.$pelamar->id_user.'/'.$namefile;
      $pdf->save($inputs['surat_keterangan_lulus']);
      $pelamar->surat_keterangan_lulus = $inputs['surat_keterangan_lulus'];
      $pelamar->status = 3;

      $pelamar->save(); 
      return redirect()->route("data_pelamar.index")->with( 
         "success", 
         "Data berhasil disimpan." 
      ); 
   }
} 