@extends('layouts_pimpinan.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="my-auto">Detail Kontrak Pegawai</h4>                    
                    {{-- @if ($lemburPegawai->status == 1)
                        <a href="{{asset($lemburPegawai->surat_keterangan_lembur)}}" class="btn btn-success ml-4">Surat Lembur</a>
                    @endif --}}
                </div>
            </a>
        </div>
        
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('pimpinan.re-kontrak-pegawai.submit', $kontrakPegawai->id) }}" method="post" enctype="multipart/form-data"> 
                {{ csrf_field() }}
                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Nama Pegawai</b></p>
                    <p class="col-xl-9 my-auto">{{$kontrakPegawai->nama}}</p>                  
                </div>
                <hr class="my-2" />
                
                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Jabatan</b></p>
                    <p class="col-xl-9 my-auto">{{$kontrakPegawai->jabatan}}</p>                  
                </div>
                <hr class="my-2" />

                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Lama Kontrak</b></p>
                    <p class="col-xl-9 my-auto">{{$kontrakPegawai->lama_kontrak}} bulan</p>    
                </div>
                <hr class="my-2" />

                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Tanggal Pembuatan Kontrak</b></p>
                    <p class="col-xl-9 my-auto">{{date('d M y', strtotime($kontrakPegawai->created_at))}}</p>    
                </div>
                <hr class="my-2" />

                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Tanggal Habis Kontrak</b></p>
                    <p class="col-xl-9 my-auto">{{date('d M y', strtotime($kontrakPegawai->tanggal_habis_kontrak))}}</p>    
                </div>
                <hr class="my-2" />

                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Sisa Waktu</b></p>
                    <p class="col-xl-9 my-auto">{{$kontrakPegawai->diff}} hari</p>    
                </div>
                <hr class="my-2" />

                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Analisis SDM</b></p>
                    <div class="col-xl-9 my-auto"><?php echo $kontrakPegawai->analisis_sdm ?></div>    
                </div>
                <hr class="my-2" />

                <div class="form-group">
                    <label for="ttl" class="col-sm-6 control-label">Keputusan</label>
                    <div class="col-sm-10">
                    <textarea class="editor form-control" name="editor" id="editor">
                        {{$kontrakPegawai->keputusan_pimpinan ?? ''}}
                    </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
                    <a href="{{ route('pimpinan.re-kontrak-pegawai.index') }}" class="btn btn-primary" role="button">Batal</a>
                    </div>
                </div>
            </form>    

            {{-- @if ($lemburPegawai->status == 0)
                <div class="row">
                    <div>
                        <a class="btn btn-success" href="{{ route('admin.lembur-pegawai.submit', [$lemburPegawai->id, 1]) }}">Setuju
                        <i class="fas fa-check"></i>
                        </a>
                    </div>
                    <div class="ml-3">
                        <a class="btn btn-danger" href="{{ route('admin.lembur-pegawai.submit', [$lemburPegawai->id, 2]) }}">Tolak
                        <i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
                <hr class="my-2" />
            @endif --}}
        
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
    
@endsection
        