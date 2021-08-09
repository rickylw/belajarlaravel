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
        <div class="card-header"> Buat Pesan
        </div>
        
        <div class="card-body">
        <form class="form-horizontal" action="{{ route('admin.pesan.store') }}" method="post" enctype="multipart/form-data"> 
            @include('admin.pesan.form')
        </form>
        </div>
        
        </div>
        
        </div>
        </div>
@endsection

@section('contentjs')
<script src="{{asset('assets/dist/js/pages/pimpinan/pesan.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckeditor/adapters/jquery.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'editor' );
</script>
    
@endsection
