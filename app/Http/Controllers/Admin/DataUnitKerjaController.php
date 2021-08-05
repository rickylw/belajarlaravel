<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\DataUnitKerja; 
use App\Models\KontrakUnitKerja; 
use Illuminate\Support\Facades\DB;
use Hash; 

class DataUnitKerjaController extends Controller
{
    public function index() {
        $unitkerja = DataUnitKerja::paginate(10);
        return view('admin.data-unitkerja.index', compact('unitkerja'));
    }

    public function edit($id) {
        $unitkerja = DB::table('tbl_dataunitkerja')
                    ->join('tbl_kontrak_unitkerja', 'tbl_kontrak_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_kontrak_unitkerja.lama_kontrak as lama_kontrak'))
                    ->where('tbl_dataunitkerja.id', $id)->first();
        return view('admin.data-unitkerja.edit', compact('unitkerja'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [ 
            'nip' => 'required', 
            'no_ktp' => 'required',
            'lama_kontrak' => 'required', 
            'nama' => 'required',  
            'tempat_lahir' => 'required', 
            'tanggal_lahir' => 'required', 
            'jenis_kelamin' => 'required', 
            'alamat' => 'required', 
            'jabatan' => 'required', 
            'agama' => 'required', 
            'no_hp' => 'required', 
            'pendidikan' => 'required', 
            'tahun_kelulusan' => 'required', 
         ]);
         $unitkerja = DataUnitKerja::where('id', $id)->first();
         $user = User::where('id', $unitkerja->id_user)->first();

         $unitkerja->nip = $request->nip;
         $unitkerja->no_ktp = $request->no_ktp;
         $unitkerja->nama = $request->nama;
         $unitkerja->tempat_lahir = $request->tempat_lahir;
         $unitkerja->tanggal_lahir = $request->tanggal_lahir;
         $unitkerja->jenis_kelamin = ($request->jenis_kelamin == "Laki-Laki") ? 0 : 1;
         $unitkerja->alamat = $request->alamat;
         $unitkerja->jabatan = $request->jabatan;
         $unitkerja->agama = $request->agama;
         $unitkerja->no_hp = $request->no_hp;
         $unitkerja->pendidikan = $request->pendidikan;
         $unitkerja->tahun_kelulusan = $request->tahun_kelulusan;

        if($request->foto_diri){
            $filenameLama = explode("/", $unitkerja->foto_diri);
            \Storage::disk('public')->delete('unitkerja/'.$user->id.'/'.$filenameLama[count($filenameLama)-1]);

            $namefile = 'diri_'. date("Y_m_d_H_i_s") .'.'.$request->foto_diri->extension();
            $inputs['foto_diri'] = 'storage/unitkerja/'.$user->id.'/'.$namefile;
            request('foto_diri')->storeAs('unitkerja/'.$user->id, $namefile, 'public');
            $unitkerja->foto_diri = $inputs['foto_diri'];
        }

        if($request->program_studi){
            $unitkerja->program_studi = $request->program_studi;
        }

        $user->name = $request->nama;

        if ($request->password!="") { 

            $this->validate($request, [ 
                'password' => 'required', 
                'password_confirmation' => 'required|same:password', 
            ]);

            $enkripsi = Hash::make($request->password);   
            $user->password = $enkripsi;
        
        } 

        $kontrakUnitKerja = KontrakUnitKerja::where('id_unitkerja', $id)->first();
        $kontrakUnitKerja->lama_kontrak = $request->lama_kontrak;

        $kontrakUnitKerja->save();        
        $unitkerja->save();
        $user->save();

        return redirect()->route("admin.data-unitkerja.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
}
