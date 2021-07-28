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
        <div class="card-header"> Tambah Data Pelamar
        </div>
        
        <div class="card-body">
        <form class="form-horizontal" action="{{ route('data_pelamar.store') }}" method="post" enctype="multipart/form-data"> 
            @include('datapelamar.form')
        </form>
        </div>
        
        </div>
        
        </div>
        </div>
@endsection

@section('contentjs')
    <script src="{{asset('assets/dist/js/pages/jeniskelamin.js')}}"></script>
@endsection