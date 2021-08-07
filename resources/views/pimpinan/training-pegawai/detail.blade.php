@extends('layouts_pimpinan.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="my-auto">{{$trainingPegawai->nama_pelatihan}}</h4>
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
            
            <div class="row">
                <div>
                    <a class="btn btn-success" href="{{ route('pimpinan.training-pegawai.submit', [$trainingPegawai->id, 1]) }}">Setuju
                    <i class="fas fa-check"></i>
                    </a>
                </div>
                <div class="ml-3">
                    <a class="btn btn-danger" href="{{ route('pimpinan.training-pegawai.submit', [$trainingPegawai->id, 2]) }}">Tolak
                    <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <hr class="my-2" />
          </div>
        
    </div>
    
</div>
</div> @stop
        