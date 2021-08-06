{{ csrf_field() }}

<div class="form-group">
<label for="nama" class="col-sm-2 control-label">Pegawai</label>
<div class="col-sm-10">
<div class="dropdown">
@if (!isset($trainingPegawai))
    <button class="btn btn-light dropdown-toggle" type="button" id="btn-pegawai" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Pilih Pegawai
    </button>
    <input type="hidden" id="pegawai" name="pegawai">
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-pegawai">
    @foreach ($pegawai as $v)
        <a class="dropdown-item" href="#" id="{{$v->id}}"><?php echo $v->id . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .$v->nama ?></a>
    @endforeach
    </div>
@else
    <p>{{$trainingPegawai->nama_pegawai}}</p>
@endif
</div>
</div>
</div>

<div class="form-group">
<label for="nama" class="col-sm-2 control-label">Nama Pelatihan</label>
<div class="col-sm-10">
<input type="text" name="nama_pelatihan" class="form-control" value="{{ $trainingPegawai->nama_pelatihan ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="usia" class="col-sm-6 control-label">Tanggal Mulai Pelatihan</label>
<div class="col-sm-10">
<input type="date" name="tanggal_mulai_pelatihan" class="form-control" value="<?php echo isset($trainingPegawai->jadwal_mulai_pelatihan) ? date('Y-m-d', strtotime($trainingPegawai->jadwal_mulai_pelatihan)) : ''?>">
</div>
</div>

<div class="form-group">
    <label for="usia" class="col-sm-6 control-label">Waktu Mulai Pelatihan</label>
    <div class="col-sm-10">
        <div class="input-group date" id="datetimepicker1" data-target-input="nearest" onkeydown="return false">
            <input type="text" class="form-control datetimepicker-input" name="waktu_mulai_pelatihan" data-target="#datetimepicker1" value="<?php echo isset($trainingPegawai->jadwal_mulai_pelatihan) ? date('H:i', strtotime($trainingPegawai->jadwal_mulai_pelatihan)) : ''?>"/>
            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
<label for="usia" class="col-sm-6 control-label">Tanggal Akhir Pelatihan</label>
<div class="col-sm-10">
<input type="date" name="tanggal_akhir_pelatihan" class="form-control" value="<?php echo isset($trainingPegawai->jadwal_akhir_pelatihan) ? date('Y-m-d', strtotime($trainingPegawai->jadwal_akhir_pelatihan)) : ''?>">
</div>
</div>

<div class="form-group">
    <label for="usia" class="col-sm-6 control-label">Waktu Akhir Pelatihan</label>
    <div class="col-sm-10">
        <div class="input-group date" id="datetimepicker2" data-target-input="nearest" onkeydown="return false">
            <input type="text" class="form-control datetimepicker-input" name="waktu_akhir_pelatihan" data-target="#datetimepicker2" value="<?php echo isset($trainingPegawai->jadwal_akhir_pelatihan) ? date('H:i', strtotime($trainingPegawai->jadwal_akhir_pelatihan)) : ''?>"/>
            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
<label for="ttl" class="col-sm-6 control-label">Deksripsi Pelatihan</label>
<div class="col-sm-10">
<textarea class="editor form-control" name="editor" id="editor">
    {{ $trainingPegawai->deskripsi_pelatihan ?? '' }}
</textarea>
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
<a href="{{ route('unitkerja.training-pegawai.index') }}" class="btn btn-primary" role="button">Batal</a>
</div>
</div>