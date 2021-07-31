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
    <p>{{$jadwalTes->nama_pelamar}}</p>
@endif
</div>
</div>
</div>

<div class="form-group">
<label for="usia" class="col-sm-2 control-label">Tanggal Tes</label>
<div class="col-sm-10">
<input type="date" name="tanggal_tes" class="form-control" value="<?php echo isset($jadwalTes->jadwal_tes) ? date('Y-m-d', strtotime($jadwalTes->jadwal_tes)) : ''?>">
</div>
</div>

<div class="form-group">
    <label for="usia" class="col-sm-2 control-label">Waktu Tes</label>
    <div class="col-sm-10">
        <div class="input-group date" id="datetimepicker1" data-target-input="nearest" onkeydown="return false">
            <input type="text" class="form-control datetimepicker-input" name="waktu_tes" data-target="#datetimepicker1" value="<?php echo isset($jadwalTes->jadwal_tes) ? date('H:i', strtotime($jadwalTes->jadwal_tes)) : ''?>"/>
            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
<label for="ttl" class="col-sm-2 control-label">Deskripsi</label>
<div class="col-sm-10">
<textarea class="editor form-control" name="editor" id="editor">
    {{ $jadwalTes->deskripsi ?? '' }}
</textarea>
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
<a href="{{ route('unitkerja.lowongan-kerja.index') }}" class="btn btn-primary" role="button">Batal</a>
</div>
</div>