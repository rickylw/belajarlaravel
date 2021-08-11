@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="my-auto">Detail Lembur</h4>                    
                    @if ($lemburUnitKerja->status == 1)
                        <a href="{{asset($lemburUnitKerja->surat_keterangan_lembur)}}" class="btn btn-success ml-4">Surat Lembur</a>
                    @endif
                </div>
            </a>
        </div>
        
        <div class="card-body">
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nama Unit Kerja</b></p>
                <p class="col-xl-9 my-auto">{{$lemburUnitKerja->nama_unitkerja}}</p>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jadwal Mulai Lembur</b></p>
                <p class="col-xl-9 my-auto">{{$lemburUnitKerja->jadwal_mulai_lembur}}</p>    
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jadwal Selesai Lembur</b></p>
                <p class="col-xl-9 my-auto">{{$lemburUnitKerja->jadwal_selesai_lembur}}</p>    
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Deskripsi</b></p>
                <div class="col-xl-9 my-auto isi-justify">
                    <?php echo $lemburUnitKerja->deskripsi ?>  
                </div>                 
            </div>
            <hr class="my-2" />

            @if ($lemburUnitKerja->status == 0)
                <div class="row">
                    <div>
                        <a class="btn btn-success" href="{{ route('admin.lembur-unitkerja.submit', [$lemburUnitKerja->id, 1]) }}">Setuju
                        <i class="fas fa-check"></i>
                        </a>
                    </div>
                    <div class="ml-3">
                        <a class="btn btn-danger" href="{{ route('admin.lembur-unitkerja.submit', [$lemburUnitKerja->id, 2]) }}">Tolak
                        <i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
                <hr class="my-2" />
            @endif
        
          </div>
        
    </div>
    
</div>
</div> @stop
        