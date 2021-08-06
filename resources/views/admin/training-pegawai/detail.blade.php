@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="my-auto">{{$trainingPegawai->nama_pelatihan}}</h4>
                    @if (!isset($trainingPegawai->diketahui_sdm))
                        <a href="{{route('admin.training-pegawai.forward', $trainingPegawai->id)}}" class="btn btn-primary">Teruskan Ke Pimpinan</a>
                    @endif
                </div>
            </a>
        </div>
        
        <div class="card-body">
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nama Pegawai</b></p>
                <p class="col-xl-9 my-auto">{{$trainingPegawai->nama_pegawai}}</p>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jadwal Mulai Pelatihan</b></p>
                <p class="col-xl-9 my-auto">{{$trainingPegawai->jadwal_mulai_pelatihan}}</p>    
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jadwal Akhir Pelatihan</b></p>
                <p class="col-xl-9 my-auto">{{$trainingPegawai->jadwal_akhir_pelatihan}}</p>    
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Deskripsi Pelatihan</b></p>
                <div class="col-xl-9 my-auto isi-justify">
                    <?php echo $trainingPegawai->deskripsi_pelatihan ?>  
                </div>                 
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Diajukan Oleh</b></p>
                <p class="col-xl-9 my-auto">{{$trainingPegawai->nama_diajukan_oleh}}</p>                  
            </div>
            <hr class="my-2" />
          </div>
        
    </div>
    
</div>
</div> @stop
        