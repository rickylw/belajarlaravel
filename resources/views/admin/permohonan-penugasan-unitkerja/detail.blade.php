@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto">{{$permohonanUnitKerja->judul ?? ''}}</h4>
            </a>
        </div>
        
        <div class="card-body">
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nama Unit Kerja</b></p>
                <p class="col-xl-9 my-auto">{{$permohonanUnitKerja->nama_unitkerja ?? ''}}</p>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Deskripsi Penugasan</b></p>
                <div class="col-xl-9 my-auto isi-justify">
                    <?php echo $permohonanUnitKerja->deskripsi_penugasan ?>  
                </div>                  
            </div>        
            <hr class="my-2" />

          </div>
        
    </div>
    
</div>
</div> @stop
        