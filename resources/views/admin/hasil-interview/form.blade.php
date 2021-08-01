{{ csrf_field() }}

<div class="form-group">
<label for="nama" class="col-sm-2 control-label">Pelamar</label>
<div class="col-sm-10">
<div class="dropdown">
@if (isset($pelamar))
    <button class="btn btn-light dropdown-toggle" type="button" id="btn-pelamar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Pilih Pelamar
    </button>
    <input type="hidden" id="pelamar" name="pelamar">
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-pelamar">
    @foreach ($pelamar as $v)
        <a class="dropdown-item" href="#" id="{{$v->id}}"><?php echo $v->id . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .$v->nama ?></a>
    @endforeach
    </div>
@else
    <p>{{$hasilInterview->nama_pelamar}}</p>
@endif
</div>
</div>
</div>

<div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Jenis Interview</label>
    <div class="col-sm-10">
    @if (isset($pelamar))
    <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" id="btn-jenis-interview" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pilih Jenis Interview
        </button>
        <input type="hidden" id="jenis-interview" name="jenis_interview">
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-jenis-interview">
            @foreach ($jenisInterview as $v)
                <a class="dropdown-item" href="#" id="{{$v->id}}">{{$v->nama}}</a>
            @endforeach
        </div>
        </div>
    @else
        <p>{{$hasilInterview->jenis_interview}}</p>
    @endif
    </div>
</div>

<div class="form-group">
<label for="ttl" class="col-sm-2 control-label">Hasil Interview</label>
<div class="col-sm-10">
<textarea class="editor form-control" name="editor" id="editor">
    {{$hasilInterview->hasil_interview ?? ''}}
</textarea>
</div>
</div>

<div class="form-group">
<label for="fc_ktp" class="col-sm-2 control-label">Lampiran</label>
<div class="col-sm-10">
@if (isset($hasilInterview->lampiran))
    <a href="{{asset($hasilInterview->lampiran)}}"><?php echo explode('/', $hasilInterview->lampiran)[3] ?></a>
@endif
<input type="file" name="lampiran" class="form-control-file">
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
<a href="{{ route('unitkerja.lowongan-kerja.index') }}" class="btn btn-primary" role="button">Batal</a>
</div>
</div>