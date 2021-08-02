@extends('layouts_pimpinan.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto">Hasil Interview</h4>
            </a>
        </div>
        
        <div class="card-body">
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nama</b></p>
                <p class="col-xl-9 my-auto">{{$hasilInterview->nama_pelamar}}</p>                  
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jenis Interview</b></p>
                <p class="col-xl-9 my-auto">{{ $hasilInterview->jenis_interview }}</p>                  
            </div>
            <hr class="my-2" />
          
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Detail Pelamar</b></p>
                <a class="btn btn-primary" href="{{ route('pimpinan.data-pelamar.detail', $hasilInterview->id_pelamar) }}">
                    Detail
                </a>
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Lampiran</b></p>
                @if (isset($hasilInterview->lampiran))
                    <a href="{{asset($hasilInterview->lampiran)}}"><?php echo explode('/', $hasilInterview->lampiran)[3] ?></a>
                @else
                    <p>Tidak ada lampiran.</p>
                @endif
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Hasil Interview</b></p>
                <div class="col-xl-9 my-auto isi-justify">
                    <?php echo $hasilInterview->hasil_interview ?>  
                </div>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <div>
                    <a class="btn btn-success" href="{{ route('pimpinan.hasil-interview.submit', [$hasilInterview->id, 1]) }}">Setuju
                    <i class="fas fa-check"></i>
                    </a>
                </div>
                <div class="ml-3">
                    <a class="btn btn-danger" href="{{ route('pimpinan.hasil-interview.submit', [$hasilInterview->id, 2]) }}">Tolak
                    <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
        
            <hr class="my-2" />

          </div>
        
    </div>
    
</div>
</div> @stop
        