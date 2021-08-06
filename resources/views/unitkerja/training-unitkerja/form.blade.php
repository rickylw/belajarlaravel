{{ csrf_field() }}

<div class="form-group">
<label for="nama" class="col-sm-2 control-label">Unit Kerja</label>
<div class="col-sm-10">
<div class="dropdown">
@if (!isset($trainingUnitKerja))
    <button class="btn btn-light dropdown-toggle" type="button" id="btn-unitkerja" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Pilih Unit Kerja
    </button>
    <input type="hidden" id="unitkerja" name="unitkerja">
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-unitkerja">
    @foreach ($unitkerja as $v)
        <a class="dropdown-item" href="#" id="{{$v->id}}"><?php echo $v->id . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .$v->nama ?></a>
    @endforeach
    </div>
@else
    <p>{{$trainingUnitKerja->nama_unitkerja}}</p>
@endif
</div>
</div>
</div>

<div class="form-group">
<label for="nama" class="col-sm-2 control-label">Nama Pelatihan</label>
<div class="col-sm-10">
<input type="text" name="nama_pelatihan" class="form-control" value="{{ $trainingUnitKerja->nama_pelatihan ?? '' }}" >
</div>
</div>

<div class="form-group">
<label for="usia" class="col-sm-6 control-label">Tanggal Mulai Pelatihan</label>
<div class="col-sm-10">
<input type="date" name="tanggal_mulai_pelatihan" class="form-control" value="<?php echo isset($trainingUnitKerja->jadwal_mulai_pelatihan) ? date('Y-m-d', strtotime($trainingUnitKerja->jadwal_mulai_pelatihan)) : ''?>">
</div>
</div>

<div class="form-group">
    <label for="usia" class="col-sm-6 control-label">Waktu Mulai Pelatihan</label>
    <div class="col-sm-10">
        <div class="input-group date" id="datetimepicker1" data-target-input="nearest" onkeydown="return false">
            <input type="text" class="form-control datetimepicker-input" name="waktu_mulai_pelatihan" data-target="#datetimepicker1" value="<?php echo isset($trainingUnitKerja->jadwal_mulai_pelatihan) ? date('H:i', strtotime($trainingUnitKerja->jadwal_mulai_pelatihan)) : ''?>"/>
            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
<label for="usia" class="col-sm-6 control-label">Tanggal Akhir Pelatihan</label>
<div class="col-sm-10">
<input type="date" name="tanggal_akhir_pelatihan" class="form-control" value="<?php echo isset($trainingUnitKerja->jadwal_akhir_pelatihan) ? date('Y-m-d', strtotime($trainingUnitKerja->jadwal_akhir_pelatihan)) : ''?>">
</div>
</div>

<div class="form-group">
    <label for="usia" class="col-sm-6 control-label">Waktu Akhir Pelatihan</label>
    <div class="col-sm-10">
        <div class="input-group date" id="datetimepicker2" data-target-input="nearest" onkeydown="return false">
            <input type="text" class="form-control datetimepicker-input" name="waktu_akhir_pelatihan" data-target="#datetimepicker2" value="<?php echo isset($trainingUnitKerja->jadwal_akhir_pelatihan) ? date('H:i', strtotime($trainingUnitKerja->jadwal_akhir_pelatihan)) : ''?>"/>
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
    {{ $trainingUnitKerja->deskripsi_pelatihan ?? '' }}
</textarea>
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
<a href="{{ route('unitkerja.training-unitkerja.index') }}" class="btn btn-primary" role="button">Batal</a>
</div>
</div>