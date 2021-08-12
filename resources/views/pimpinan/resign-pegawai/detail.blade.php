@extends('layouts_pimpinan.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="my-auto">Data Pengunduran Diri</h4>
                </div>
            </a>
        </div>
        
        <div class="card-body">
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nama Pegawai</b></p>
                <p class="col-xl-9 my-auto">{{$resignPegawai->nama_pegawai}}</p>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Waktu Berhenti</b></p>
                <p class="col-xl-9 my-auto">{{$resignPegawai->waktu_berhenti}}</p>    
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Alasan Pengunduran Diri</b></p>
                <div class="col-xl-9 my-auto isi-justify">
                    <?php echo $resignPegawai->alasan_pengunduran_diri ?>  
                </div>                 
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Hasil Analisis SDM</b></p>
                <div class="col-xl-9 my-auto isi-justify">
                    <?php echo $resignPegawai->analisis_sdm ?>  
                </div>                
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <div>
                    <a class="btn btn-success" href="{{ route('pimpinan.resign-pegawai.submit', [$resignPegawai->id, 1]) }}">Setuju
                    <i class="fas fa-check"></i>
                    </a>
                </div>
                <div class="ml-3">
                    <a class="btn btn-danger" href="{{ route('pimpinan.resign-pegawai.submit', [$resignPegawai->id, 2]) }}">Tolak
                    <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <hr class="my-2" />
          </div>
        
    </div>
    
</div>
</div> @stop
        