@extends('layouts_pimpinan.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="my-auto">{{$trainingUnitKerja->nama_pelatihan}}</h4>
                </div>
            </a>
        </div>
        
        <div class="card-body">
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nama Unit Kerja</b></p>
                <p class="col-xl-9 my-auto">{{$trainingUnitKerja->nama_unitkerja}}</p>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jadwal Mulai Pelatihan</b></p>
                <p class="col-xl-9 my-auto">{{$trainingUnitKerja->jadwal_mulai_pelatihan}}</p>    
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jadwal Akhir Pelatihan</b></p>
                <p class="col-xl-9 my-auto">{{$trainingUnitKerja->jadwal_akhir_pelatihan}}</p>    
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Deskripsi Pelatihan</b></p>
                <div class="col-xl-9 my-auto isi-justify">
                    <?php echo $trainingUnitKerja->deskripsi_pelatihan ?>  
                </div>                 
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Diajukan Oleh</b></p>
                <p class="col-xl-9 my-auto">{{$trainingUnitKerja->nama_diajukan_oleh}}</p>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <div>
                    <a class="btn btn-success" href="{{ route('pimpinan.training-unitkerja.submit', [$trainingUnitKerja->id, 1]) }}">Setuju
                    <i class="fas fa-check"></i>
                    </a>
                </div>
                <div class="ml-3">
                    <a class="btn btn-danger" href="{{ route('pimpinan.training-unitkerja.submit', [$trainingUnitKerja->id, 2]) }}">Tolak
                    <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
            <hr class="my-2" />
          </div>
        
    </div>
    
</div>
</div> @stop
        