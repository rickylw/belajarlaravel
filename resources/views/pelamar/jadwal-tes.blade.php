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

    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto d-inline-block">Hasil Tes</h4>
            </a>
        </div>
        
        <div class="card-body">   
            @if ($datapelamar->status == 1 || $datapelamar->status == 2)
                <p>Belum ada hasil tes.</p>
            @elseif($datapelamar->status == 3)
                <div class="row">
                    <p class="text-muted col-xl-6 my-auto"><b>Selamat, Anda telah lulus tes dan diterima</b></p>
                    <a href="{{asset($datapelamar->surat_keterangan_lulus)}}"><?php echo explode('/', $datapelamar->surat_keterangan_lulus)[3] ?></a>                  
                </div>
            @elseif($datapelamar->status == 4)
                <div class="row">
                    <p class="text-muted col-xl-6 my-auto"><b>Maaf, Anda tidak lulus tes</b></p>
                </div>
            @endif      
            <hr class="my-2" />
        </div>
        
    </div>
    
</div>
</div> @stop
        