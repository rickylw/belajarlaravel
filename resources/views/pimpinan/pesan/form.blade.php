{{ csrf_field() }}

<div class="form-group">
<label for="nama" class="col-sm-2 control-label">Penerima</label>
<div class="col-sm-10">
<div class="dropdown">
@if (isset($admin))
    <button class="btn btn-light dropdown-toggle" type="button" id="btn-penerima" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Pilih Penerima
    </button>
    <input type="hidden" id="penerima" name="penerima">
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-penerima">
    @foreach ($admin as $v)
        <a class="dropdown-item" id="{{$v->id}}"><?php echo $v->id . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .$v->name ?></a>
    @endforeach
    </div>
@else
    <p>{{$hasilInterview->nama_pelamar}}</p>
@endif
</div>
</div>
</div>

<div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Subjek</label>
    <div class="col-sm-10">
    <input type="text" name="subjek" class="form-control" value="{{ $lowonganPekerjaan->judul ?? '' }}" >
    </div>
</div>

<div class="form-group">
<label for="ttl" class="col-sm-2 control-label">Isi Pesan</label>
<div class="col-sm-10">
<textarea class="editor form-control" name="editor" id="editor">
    {{$hasilInterview->hasil_interview ?? ''}}
</textarea>
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success btn-md" name="simpan" value="Kirim">
</div>
</div>