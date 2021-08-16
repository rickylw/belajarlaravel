@extends('layouts_pimpinan.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto">Detail Penugasan</h4>
            </a>
        </div>
        
        <div class="card-body">
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nama Unit Kerja</b></p>
                <p class="col-xl-9 my-auto">{{$penugasanUnitKerja->nama_unitkerja}}</p>                  
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jenis Penugasan</b></p>
                <p class="col-xl-9 my-auto">{{ ($penugasanUnitKerja->jenis_penugasan == 0) ? 'Internal' : 'External' }}</p>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Deskripsi Penugasan</b></p>
                <div class="col-xl-9 my-auto isi-justify">
                    <?php echo $penugasanUnitKerja->deskripsi_penugasan ?>  
                </div>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jadwal Mulai Penugasan</b></p>
                <p class="col-xl-9 my-auto">{{$penugasanUnitKerja->jadwal_mulai_penugasan}}</p>    
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jadwal Akhir Penugasan</b></p>
                <p class="col-xl-9 my-auto">{{$penugasanUnitKerja->jadwal_akhir_penugasan}}</p>    
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <div>
                    <a class="btn btn-success" href="{{ route('pimpinan.penugasan-unitkerja.submit', [$penugasanUnitKerja->id, 1]) }}">Setuju
                    <i class="fas fa-check"></i>
                    </a>
                </div>
                <div class="ml-3">
                    <a class="btn btn-danger" href="{{ route('pimpinan.penugasan-unitkerja.submit', [$penugasanUnitKerja->id, 2]) }}">Tolak
                    <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
        
            <hr class="my-2" />

          </div>
        
    </div>
    
</div>
</div> @stop
        