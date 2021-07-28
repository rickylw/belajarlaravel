{{ csrf_field() }}

<div class="form-group">
<label for="nama" class="col-sm-2 control-label">Nama</label>
<div class="col-sm-10">
<input type="text" name="nama" class="form-control" value="{{ $nama ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="ttl" class="col-sm-2 control-label">Tempat Lahir</label>
<div class="col-sm-10">
<input type="text" name="tempat_lahir" class="form-control" value="{{ $tempat_lahir ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="usia" class="col-sm-2 control-label">Tanggal Lahir</label>
<div class="col-sm-10">
<input type="date" name="tanggal_lahir" class="form-control" value="{{ $tanggal_lahir ?? '' }}" >
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
<label for="email" class="col-sm-2 control-label">Email</label>
<div class="col-sm-10">
<input type="email" name="email" class="form-control" value="{{ $email ?? '' }}" 
@if (isset($email))
    readonly
@endif
>
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
<label for="hp" class="col-sm-2 control-label">No Handphone</label>
<div class="col-sm-10">
<input type="string" name="no_hp" class="form-control" value="{{ $no_hp ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="fc_kk" class="col-sm-4 control-label">Fotocopy Kartu Keluarga</label>
<div class="col-sm-10">
@if (isset($foto_kk))
    <div class="mb-4">
        <img height="300px" src="{{asset($foto_kk)}}" alt="">
    </div>
@endif
<input type="file" name="foto_kk" class="form-control-file">
</div>
</div>

<div class="form-group">
<label for="fc_ktp" class="col-sm-2 control-label">Fotocopy KTP</label>
<div class="col-sm-10">
@if (isset($foto_ktp))
    <div class="mb-4">
        <img height="300px" src="{{asset($foto_ktp)}}" alt="">
    </div>
@endif
<input type="file" name="foto_ktp" class="form-control-file">
</div>
</div>

<div class="form-group">
<label for="fc_ijazah" class="col-sm-2 control-label">Fotocopy Ijazah</label>
<div class="col-sm-10">
@if (isset($foto_ijazah))
    <div class="mb-4">
        <img height="300px" src="{{asset($foto_ijazah)}}" alt="">
    </div>
@endif
<input type="file" name="foto_ijazah" class="form-control-file">
</div>
</div>

<div class="form-group">
<label for="transkrip_nilai" class="col-sm-2 control-label">Foto Diri</label>
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
<label for="skck" class="col-sm-2 control-label">Foto SKCK</label>
<div class="col-sm-10">
@if (isset($foto_skck))
    <div class="mb-4">
        <img height="300px" src="{{asset($foto_skck)}}" alt="">
    </div>
@endif
<input type="file" name="foto_skck" class="form-control-file">
</div>
</div>

<div class="form-group">
<label for="surat_keterangan_sehat" class="col-sm-4 control-label">Surat Keterangan Sehat</label>
<div class="col-sm-10">
@if (isset($surat_keterangan_sehat))
    <div class="mb-4">
        <img height="300px" src="{{asset($surat_keterangan_sehat)}}" alt="">
    </div>
@endif
<input type="file" name="surat_keterangan_sehat" class="form-control-file">
</div>
</div>

<div class="form-group">
<label for="surat_keterangan_pengalaman_kerja" class="col-sm-4 control-label">Surat Pengalaman Kerja</label>
<div class="col-sm-10">
@if (isset($surat_pengalaman_kerja))
    <div class="mb-4">
        <img height="300px" src="{{asset($surat_pengalaman_kerja)}}" alt="">
    </div>
@endif
<input type="file" name="surat_pengalaman_kerja" class="form-control-file">
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
<a href="{{ route('data_pelamar.index') }}" class="btn btn-primary" role="button">Batal</a>
</div>
</div>