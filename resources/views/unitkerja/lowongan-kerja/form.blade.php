{{ csrf_field() }}

<div class="form-group">
<label for="nama" class="col-sm-2 control-label">Judul</label>
<div class="col-sm-10">
<input type="text" name="judul" class="form-control" value="{{ $lowonganPekerjaan->judul ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="ttl" class="col-sm-2 control-label">Deksripsi</label>
<div class="col-sm-10">
<textarea class="editor form-control" name="editor" id="editor">
    {{ $lowonganPekerjaan->deskripsi ?? '' }}
</textarea>
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
<a href="{{ route('unitkerja.lowongan-kerja.index') }}" class="btn btn-primary" role="button">Batal</a>
</div>
</div>