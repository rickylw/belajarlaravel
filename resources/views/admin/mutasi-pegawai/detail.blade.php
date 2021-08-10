@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto">Data Mutasi Pegawai</h4>
            </a>
        </div>
        
        <div class="card-body">
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nama</b></p>
                <p class="col-xl-9 my-auto">{{$mutasiPegawai->nama_pegawai}}</p>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Surat Keterangan Pindah Unit</b></p>
                <p class="col-xl-9 my-auto"><a href="{{asset($mutasiPegawai->surat_keterangan_pindah_unit)}}"><?php echo explode('/', $mutasiPegawai->surat_keterangan_pindah_unit)[2] ?></a></p>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Waktu Mutasi</b></p>
                <p class="col-xl-9 my-auto"><?php echo date('d M y, H:i', strtotime($mutasiPegawai->created_at)) ?></p>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Dimutasi Oleh</b></p>
                <p class="col-xl-9 my-auto">{{$mutasiPegawai->nama_dimutasi_oleh}}</p>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Pekerjaan Sebelum</b></p>
                <p class="col-xl-9 my-auto">{{$mutasiPegawai->pekerjaan_awal}}</p>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Pekerjaan Tujuan</b></p>
                <p class="col-xl-9 my-auto">{{$mutasiPegawai->pekerjaan_tujuan}}</p>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jabatan Sebelum</b></p>
                <p class="col-xl-9 my-auto">{{$mutasiPegawai->jabatan_awal}}</p>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jabatan Tujuan</b></p>
                <p class="col-xl-9 my-auto">{{$mutasiPegawai->jabatan_tujuan}}</p>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Deskripsi</b></p>
                <div class="col-xl-9 my-auto"><?php echo $mutasiPegawai->deskripsi ?></div>                  
            </div>
            <hr class="my-2" />

            
          </div>
        
    </div>
    
</div>
</div> @stop
        