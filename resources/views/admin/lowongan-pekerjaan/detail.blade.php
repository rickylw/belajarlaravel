@extends('layouts.master')

@section('content')

<div class="row">
<div class="col-12">

<div class="card">
<div class="card-header"> Detail Data
</div>
<div class="card-body">
<div class="form-group">
<label for="nama" class="col-sm-2 control-label">Judul</label>
<div class="col-sm-10">
@if (isset($lowonganPekerjaan->judul))
    <?php echo $lowonganPekerjaan->judul ?>
@endif
</div>
</div>

<div class="form-group">
<label for="ttl" class="col-sm-2 control-label">Deksripsi</label>
<div class="col-sm-10 isi-justify">
@if (isset($lowonganPekerjaan->deskripsi))
    <?php echo $lowonganPekerjaan->deskripsi ?>
@endif
</div>
</div>
</div>
</div>
<a class="btn btn-success" href="{{ route('admin.lowongan-kerja.submit', [$lowonganPekerjaan->id, 1]) }}">Setuju
<i class="fas fa-check"></i>
</a>
<a class="btn btn-danger" href="{{ route('admin.lowongan-kerja.submit', [$lowonganPekerjaan->id, 2]) }}">Tolak
<i class="fas fa-times"></i>
</a>
</div>
</div> 
@endsection
    