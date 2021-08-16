@extends('layouts_unitkerja.master')

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
            @if (isset($penugasanUnitKerja->surat_keterangan_penugasan))
                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Surat Keterangan Penugasan</b></p>
                    <a href="{{asset($penugasanUnitKerja->surat_keterangan_penugasan)}}"><?php echo explode('/', $penugasanUnitKerja->surat_keterangan_penugasan)[2] ?></a>                  
                </div>
                <hr class="my-2" />
            @endif

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
          </div>
        
    </div>
    
</div>
</div> @stop
        