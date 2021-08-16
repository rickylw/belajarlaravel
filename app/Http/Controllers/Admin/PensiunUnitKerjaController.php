<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataUnitKerja; 
use App\Models\PensiunUnitKerja; 
use Illuminate\Support\Facades\DB;

class PensiunUnitKerjaController extends Controller
{
    public function index(){
        $unitkerja = DB::table('tbl_dataunitkerja')
                    ->leftJoin('tbl_pensiun_unitkerja', 'tbl_pensiun_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*'))
                    ->whereNull('tbl_pensiun_unitkerja.id')
                    ->paginate(10);
        return view('admin.pensiun-unitkerja.index', compact('unitkerja'));
    }

    public function detail($id){
        $unitkerja = DataUnitKerja::where('id',$id)->first();
        return view('admin.pensiun-unitkerja.detail', compact('unitkerja'));
    }

    public function forward(Request $request, $id){
        $this->validate($request, [ 
            'editor' => 'required'
        ]);

        $pensiunUnitKerja = new PensiunUnitKerja();
        $pensiunUnitKerja->id_unitkerja = $id;
        $pensiunUnitKerja->analisis_sdm = $request->editor;
        $pensiunUnitKerja->status = 0;
        $pensiunUnitKerja->save();
        
        return redirect()->route("admin.pensiun-unitkerja.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }

    public function pengajuanIndex(){
        $unitkerja = DB::table('tbl_dataunitkerja')
                    ->join('tbl_pensiun_unitkerja', 'tbl_pensiun_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_pensiun_unitkerja.analisis_sdm as analisis_sdm, tbl_pensiun_unitkerja.id as id_pensiun'))
                    ->paginate(10);
        return view('admin.pengajuan-pensiun-unitkerja.index', compact('unitkerja'));
    }

    public function pengajuanDetail($id){
        $unitkerja = DB::table('tbl_dataunitkerja')
                    ->join('tbl_pensiun_unitkerja', 'tbl_pensiun_unitkerja.id_unitkerja', '=', 'tbl_dataunitkerja.id')
                    ->select(DB::raw('tbl_dataunitkerja.*, tbl_pensiun_unitkerja.analisis_sdm as analisis_sdm, tbl_pensiun_unitkerja.status as status_pensiun'))
                    ->where('tbl_pensiun_unitkerja.id',$id)->first();
        return view('admin.pengajuan-pensiun-unitkerja.detail', compact('unitkerja'));
    }
}
