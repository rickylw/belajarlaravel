@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="my-auto">Detail Pengunduran Diri</h4>                    
                    @if ($resignUnitKerja->status == 1)
                        <a href="{{(isset($resignUnitKerja->surat_keterangan_resign) ? asset($resignUnitKerja->surat_keterangan_resign) : route('admin.resign-unitkerja.cetak-sk', $resignUnitKerja->id))}}" class="btn btn-success ml-4">Cetak SK</a>
                    @endif
                </div>
            </a>
        </div>
        
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('admin.resign-unitkerja.submit', $resignUnitKerja->id) }}" method="post" enctype="multipart/form-data"> 
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="usia" class="col-sm-6 control-label">Nama Unit Kerja</label>
                    <div class="col-sm-10">
                        <p class="col-xl-9 my-auto">{{$resignUnitKerja->nama_unitkerja}}</p>        
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="usia" class="col-sm-6 control-label">Waktu Berhenti</label>
                    <div class="col-sm-10">
                        <p class="col-xl-9 my-auto">{{date('d M Y', strtotime($resignUnitKerja->waktu_berhenti))}}</p>         
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="usia" class="col-sm-6 control-label">Alasan Pengunduran Diri</label>
                    <div class="col-sm-10">
                        <p class="col-xl-9 my-auto"><?php echo $resignUnitKerja->alasan_pengunduran_diri ?></p>         
                    </div>
                </div>

                <hr class="my-2" />
                <div class="form-group">
                    <label for="ttl" class="col-sm-6 control-label">Analisis</label>
                    <div class="col-sm-10">
                    <textarea class="editor form-control" name="editor" id="editor">
                        {{$resignUnitKerja->analisis_sdm}}
                    </textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
                    <a href="{{ route('admin.resign-unitkerja.index') }}" class="btn btn-primary" role="button">Batal</a>
                    </div>
                </div>
            </form>          
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
        