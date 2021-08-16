@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="my-auto">Detail Pegawai</h4>                    
                    @if ($pegawai->status_pensiun == 1)
                    <a href="{{(isset($pegawai->surat_keterangan_pensiun) ? asset($pegawai->surat_keterangan_pensiun) : route('admin.pensiun-pegawai.cetak-sk', $pegawai->id_pensiun))}}" class="btn btn-success ml-4">Cetak SK</a>
                    @endif
                </div>
            </a>
        </div>
        
        <div class="card-body">
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nama Pegawai</b></p>
                <p class="col-xl-9 my-auto">{{$pegawai->nama}}</p>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jabatan</b></p>
                <p class="col-xl-9 my-auto">{{$pegawai->jabatan}}</p>                  
            </div>
            <hr class="my-2" />

            {{-- <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Lama Kontrak</b></p>
                <p class="col-xl-9 my-auto">{{$pegawai->lama_kontrak}} bulan</p>    
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Tanggal Pembuatan Kontrak</b></p>
                <p class="col-xl-9 my-auto">{{date('d M y', strtotime($pegawai->tanggal_pembuatan_kontrak))}}</p>    
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Tanggal Habis Kontrak</b></p>
                <p class="col-xl-9 my-auto">{{date('d M y', strtotime($pegawai->tanggal_habis_kontrak))}}</p>    
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Sisa Waktu</b></p>
                <p class="col-xl-9 my-auto">{{$pegawai->diff}} hari</p>    
            </div>
            <hr class="my-2" /> --}}

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Analisis SDM</b></p>
                <div class="col-xl-9 my-auto"><?php echo $pegawai->analisis_sdm ?></div>    
            </div>
            <hr class="my-2" />   
          </div>
        
    </div>
    
</div>
</div> @stop

@section('contentjs')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckeditor/adapters/jquery.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'editor' );
</script>
<script src="{{asset('assets/dist/js/pages/admin/jadwal-tes.js')}}"></script>
    
@endsection
        