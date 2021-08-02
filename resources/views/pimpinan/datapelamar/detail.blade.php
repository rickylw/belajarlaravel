@extends('layouts_pimpinan.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto">Data Pelamar</h4>
            </a>
        </div>
        
        <div class="card-body">
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nama</b></p>
                <p class="col-xl-9 my-auto">{{$datapelamar->nama}}</p>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Foto Diri</b></p>
                <div class="col-xl-9 my-auto">
                    <img height="150px" src="{{asset($datapelamar->foto_diri)}}" alt="">    
                </div>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Tempat, Tanggal Lahir</b></p>
                <p class="col-xl-9 my-auto"><?php echo ($datapelamar->tempat_lahir .', '. date('d M Y', strtotime($datapelamar->tanggal_lahir)))?></p>                  
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jenis Kelamin</b></p>
                <p class="col-xl-9 my-auto">{{ ($datapelamar->jenis_kelamin == 0) ? 'Laki-Laki' : 'Perempuan' }}</p>                  
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Email</b></p>
                <p class="col-xl-9 my-auto">{{$datapelamar->email}}</p>                  
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nomor Handphone</b></p>
                <p class="col-xl-9 my-auto">{{$datapelamar->no_hp}}</p>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Foto Kartu Keluarga</b></p>
                <div class="col-xl-9 my-auto">
                    <img height="150px" src="{{asset($datapelamar->foto_kk)}}" alt="">    
                </div>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Foto Ktp</b></p>
                <div class="col-xl-9 my-auto">
                    <img height="150px" src="{{asset($datapelamar->foto_ktp)}}" alt="">    
                </div>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Foto Ijazah</b></p>
                <div class="col-xl-9 my-auto">
                    <img height="150px" src="{{asset($datapelamar->foto_ijazah)}}" alt="">    
                </div>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Foto SKCK</b></p>
                <div class="col-xl-9 my-auto">
                    <img height="150px" src="{{asset($datapelamar->foto_skck)}}" alt="">    
                </div>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Foto Surat Keterangan Sehat</b></p>
                <div class="col-xl-9 my-auto">
                    <img height="150px" src="{{asset($datapelamar->surat_keterangan_sehat)}}" alt="">    
                </div>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Foto Surat Pengalaman Kerja</b></p>
                <div class="col-xl-9 my-auto">
                    <img height="150px" src="{{asset($datapelamar->surat_pengalaman_kerja)}}" alt="">    
                </div>                  
            </div>
            <hr class="my-2" />

          </div>
        
    </div>
    
</div>
</div> @stop
        