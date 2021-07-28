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
        <div class="card-header"> Tambah Data Pengajuan
        </div>
        
        <div class="card-body">
        <form class="form-horizontal" action="{{ route('data_pengajuan.store') }}" method="post"> 
            @include('datapengajuan.form')
        </form>
        </div>
        
        </div>
        
        </div>
        </div>
@endsection

