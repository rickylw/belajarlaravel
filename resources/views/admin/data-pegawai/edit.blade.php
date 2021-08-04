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
    </div>
</div>
<div class="card-body">
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"> @method('POST')
    {{-- {{ route('datapelamar.cetak-sk', $pelamar->id) }} --}}
    {{ csrf_field() }}  
    
    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Pekerjaan</label>
        <div class="col-sm-10">
        <input type="text" name="jenis_pekerjaan" class="form-control" value="Pegawai" readonly>
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Tanggal SK</label>
        <div class="col-sm-10">
        <input type="text" name="jenis_pekerjaan" class="form-control" value="{{ $pegawai->tanggal_sk ?? '' }}" readonly>
        </div>
    </div>
    
    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">NIP</label>
        <div class="col-sm-10">
        <input type="text" name="nip" class="form-control" value="{{ $pegawai->nip ?? '' }}" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Nomor KTP</label>
        <div class="col-sm-10">
        <input type="text" name="no_ktp" class="form-control" value="{{ $pegawai->no_ktp ?? '' }}" >
        </div>
    </div>
    
    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Lama Kontrak (Bulan)</label>
        <div class="col-sm-10">
        <input type="number" name="lama_kontrak" class="form-control" value="" >
        </div>
    </div>

    <div class="form-group">
        <label for="nama" class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-10">
        <input type="text" name="nama" class="form-control" value="">
        </div>
    </div>

    <div class="form-group">
        <label for="ttl" class="col-sm-2 control-label">Tempat Lahir</label>
        <div class="col-sm-10">
        <input type="text" name="tempat_lahir" class="form-control" value="" >
        </div>
    </div>
    
    <div class="form-group">
        <label for="usia" class="col-sm-2 control-label">Tanggal Lahir</label>
        <div class="col-sm-10">
        <input type="date" name="tanggal_lahir" class="form-control" value="" >
        </div>
    </div>

    <div class="form-group">
        <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
        <div class="col-sm-10">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="btn-jenis-kelamin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (isset($jenis_kelamin))
                    {{($jenis_kelamin == 0) ? "Laki-Laki" : "Perempuan"}}
                @else
                    Jenis Kelamin
                @endif
            </button>
            <div class="dropdown-menu" id="dropdown-jenis-kelamin" aria-labelledby="dropdown-jenis-kelamin">
                <a class="dropdown-item">Laki-Laki</a>
                <a class="dropdown-item">Perempuan</a>
            </div>
            <input type="hidden" name="jenis_kelamin" id="jenis-kelamin" value="
            @if (isset($jenis_kelamin))
                {{($jenis_kelamin == 0) ? "Laki-Laki" : "Perempuan"}}
            @else
                Jenis Kelamin
            @endif
            "/>
        </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
        <div class="col-sm-10">
        <textarea type="text" name="alamat" class="form-control" rows="3"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Jabatan</label>
        <div class="col-sm-10">
        <input type="text" name="jabatan" class="form-control" value="" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Agama</label>
        <div class="col-sm-10">
        <input type="text" name="agama" class="form-control" value="" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Nomor Handphone</label>
        <div class="col-sm-10">
        <input type="text" name="no_hp" class="form-control" value="" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Email</label>
        <div class="col-sm-10">
        <input type="text" name="email" class="form-control" value="" >
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
        <input type="password" name="password" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label for="email" class="col-sm-4 control-label">Password Confirmation</label>
        <div class="col-sm-10">
        <input type="password" name="password_confirmation" class="form-control">
        </div>
    </div>

    <div class="form-group">
    <label for="fc_kk" class="col-sm-4 control-label">Foto Diri</label>
        <div class="col-sm-10">
        @if (isset($foto_diri))
            <div class="mb-4">
                <img height="300px" src="{{asset($foto_diri)}}" alt="">
            </div>
        @endif
        <input type="file" name="foto_diri" class="form-control-file">
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Pendidikan</label>
        <div class="col-sm-10">
        <input type="text" name="pendidikan" class="form-control" value="" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-6 control-label">Program Studi (tidak wajib)</label>
        <div class="col-sm-10">
        <input type="text" name="program_studi" class="form-control" value="" >
        </div>
    </div>

    <div class="form-group">
        <label for="nip" class="col-sm-2 control-label">Tahun Kelulusan</label>
        <div class="col-sm-10">
        <input type="number" name="tahun_kelulusan" class="form-control" value="" >
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
        <a href="{{ route('data_pelamar.index') }}" class="btn btn-primary" role="button">Batal</a>
        </div>
    </div>
</form>
</div>
</div>

</div>
</div> 
@endsection

@section('contentjs')
    <script src="{{asset('assets/dist/js/pages/jeniskelamin.js')}}"></script>
@endsection