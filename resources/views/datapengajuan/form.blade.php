{{ csrf_field() }}

<div class="form-group">
<label for="nama" class="col-sm-2 control-label">Nama</label>
<div class="col-sm-10">
<input type="text" name="nama" class="form-control" value="{{ $nama ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="posisi" class="col-sm-2 control-label">Posisi</label>
<div class="col-sm-10">
<input type="text" name="posisi" class="form-control" value="{{ $posisi ?? '' }}" >
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
<a href="{{ route('data_pengajuan.index') }}" class="btn btn-primary" role="button">Batal</a>
</div>
</div>
