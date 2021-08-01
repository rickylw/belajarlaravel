@extends('layouts_pelamar.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto">Jadwal Tes Interview</h4>
            </a>
        </div>
        
        <div class="card-body">            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Tempat, Tanggal Lahir</b></p>
                <p class="col-xl-9 my-auto"><?php echo (date('d M Y, H:i', strtotime($jadwalTesInterview->jadwal_tes)))?></p>                  
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Keterangan Tes</b></p>
                <div class="col-xl-9 my-auto isi-justify"><?php echo $jadwalTesInterview->deskripsi ?></div>                  
            </div>
          </div>
        
    </div>

    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto">Jadwal Pembahasan Kontrak Pegawai</h4>
            </a>
        </div>
        
        <div class="card-body">            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Tempat, Tanggal Lahir</b></p>
                <p class="col-xl-9 my-auto"><?php echo (date('d M Y, H:i', strtotime($jadwalTes->jadwal_tes)))?></p>                  
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jenis Kelamin</b></p>
                <div class="col-xl-9 my-auto isi-justify"><?php echo $jadwalTes->deskripsi ?></div>                  
            </div>
          </div>
        
    </div>
    
</div>
</div> @stop
        