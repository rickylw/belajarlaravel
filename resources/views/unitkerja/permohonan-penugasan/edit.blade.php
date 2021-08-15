@extends('layouts_unitkerja.master')

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
<div class="card-header"> Ubah Data
</div>
<div class="card-body">
<form class="form-horizontal" action="{{ route('unitkerja.permohonan-penugasan.update', $permohonanUnitKerja->id) }}" method="post" enctype="multipart/form-data"> @method('PUT')
    
@include('unitkerja.permohonan-penugasan.form')
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
    
@endsection