{{ csrf_field() }}

<div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
    <input type="text" name="nama" class="form-control" value="{{ $nama ?? '' }}" >
</div>
</div>

<div class="form-group">
    <label for="jabatan" class="col-sm-2 control-label">jabatan</label>
    <div class="col-sm-10">
    <input type="text" name="jabatan" class="form-control" value="{{ $jabatan ?? '' }}" >
</div>
</div>

<div class="form-group">
    <label for="pekerjaan" class="col-sm-2 control-label">pekerjaan</label>
    <div class="col-sm-10">
    <input type="text" name="pekerjaan" class="form-control" value="{{ $pekerjaan ?? '' }}" >
 </div>
</div>

<div class="form-group">
    <label for="email" class="col-sm-2 control-label">email</label>
    <div class="col-sm-10">
    <input type="text" name="email" class="form-control" value="{{ $email ?? '' }}" >
</div>
</div>

<div class="form-group">
    <label for="hp" class="col-sm-2 control-label">hp</label>
    <div class="col-sm-10">
    <input type="text" name="hp" class="form-control" value="{{ $hp ?? '' }}" >
</div>
</div>

<div class="form-group">
    <label for="hari" class="col-sm-2 control-label">hari</label>
    <div class="col-sm-10">
    <input type="text" name="hari" class="form-control" value="{{ $hari ?? '' }}" >
</div>
</div>

<div class="form-group">
    <label for="tanggal" class="col-sm-2 control-label">tanggal</label>
    <div class="col-sm-10">
    <input type="text" name="tanggal" class="form-control" value="{{ $tanggal ?? '' }}" >
</div>
</div>

<div class="form-group">
    <label for="namapelatihan" class="col-sm-2 control-label">namapelatihan</label>
    <div class="col-sm-10">
    <input type="text" name="namapelatihan" class="form-control" value="{{ $namapelatihan ?? '' }}" >
</div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
    <a href="{{ route('training.index') }}" class="btn btn-primary" role="button">Batal</a>
</div>
</div>
