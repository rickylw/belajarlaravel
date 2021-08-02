@extends('layouts_pelamar.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto d-inline-block">Jadwal Tes Interview  </h4>
                @if (isset($hasilInterview))
                    <?php $color = ($hasilInterview->status == 0) ? 'warning' : (($hasilInterview->status == 1) ? 'success' : 'danger') ?>
                    <?php $teks = ($hasilInterview->status == 0) ? 'Sedang diproses' : (($hasilInterview->status == 1) ? 'Lolos' : 'Gagal') ?>
                    <span class="badge bg-{{$color}} align-top">{{$teks}}</span>
                @endif
            </a>
        </div>
        
        <div class="card-body">            
            @if (isset($jadwalTesInterview))
                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Tempat, Tanggal Lahir</b></p>
                    <p class="col-xl-9 my-auto"><?php echo (date('d M Y, H:i', strtotime($jadwalTesInterview->jadwal_tes)))?></p>                  
                </div>
                <hr class="my-2" />
            
                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Keterangan Tes</b></p>
                    <div class="col-xl-9 my-auto isi-justify"><?php echo $jadwalTesInterview->deskripsi ?></div>                  
                </div>
            @else
                <p>Belum ada jadwal tes.</p>
            @endif
          </div>
        
    </div>

    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto d-inline-block">Jadwal Pembahasan Kontrak Pegawai</h4>
                @if (isset($hasilKontrakPegawai))
                    <?php $color = ($hasilKontrakPegawai->status == 0) ? 'warning' : (($hasilKontrakPegawai->status == 1) ? 'success' : 'danger') ?>
                    <?php $teks = ($hasilKontrakPegawai->status == 0) ? 'Sedang diproses' : (($hasilKontrakPegawai->status == 1) ? 'Lolos' : 'Gagal') ?>
                    <span class="badge bg-{{$color}} align-top">{{$teks}}</span>
                @endif
            </a>
        </div>
        
        <div class="card-body">            
            @if (isset($jadwalTesKontrakPegawai))
                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Tempat, Tanggal Lahir</b></p>
                    <p class="col-xl-9 my-auto"><?php echo (date('d M Y, H:i', strtotime($jadwalTesKontrakPegawai->jadwal_tes)))?></p>                  
                </div>
                <hr class="my-2" />
            
                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Keterangan Tes</b></p>
                    <div class="col-xl-9 my-auto isi-justify"><?php echo $jadwalTesKontrakPegawai->deskripsi ?></div>                  
                </div>
            @else
                <p>Belum ada jadwal tes.</p>
            @endif
          </div>
        
    </div>
    
</div>
</div> @stop
        