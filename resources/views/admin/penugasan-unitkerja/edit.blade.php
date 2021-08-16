@extends('layouts.master')

@section('content')

<div class="row">
<div class="col-12">

@if ($errors->any())
<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li> @endforeach
</ul>
</div> @endif

<div class="card">
<div class="card-header">
    <div class="row justify-content-between">
        <p class="my-auto">Ubah Data</p>
        @if ($penugasanUnitKerja->status == 1)
            <a href="{{(isset($penugasanUnitKerja->surat_keterangan_penugasan) ? asset($penugasanUnitKerja->surat_keterangan_penugasan) : route('admin.penugasan-unitkerja.cetak-sk', $penugasanUnitKerja->id))}}" class="btn btn-success ml-4">Cetak SK</a>
        @endif
    </div>
</div>
<div class="card-body">
<form class="form-horizontal" action="{{ route('admin.penugasan-unitkerja.update', $penugasanUnitKerja->id) }}" method="post" enctype="multipart/form-data"> @method('PUT')
    
@include('admin.penugasan-unitkerja.form')
</form>
</div>
</div>

</div>
</div> 
@endsection

@section('contentjs')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckeditor/adapters/jquery.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'editor' );
</script>
<script src="{{asset('assets/dist/js/pages/admin/jadwal-tes.js')}}"></script>
    
@endsection