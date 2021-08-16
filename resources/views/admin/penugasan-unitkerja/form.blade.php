{{ csrf_field() }}

<div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Unit Kerja</label>
    <div class="col-sm-10">
    <div class="dropdown">
    @if (isset($penugasanUnitKerja))
        {{$penugasanUnitKerja->nama_unitkerja}}
    @else
        <button class="btn btn-light dropdown-toggle" type="button" id="btn-unitkerja" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pilih Unit Kerja
        </button>
        <input type="hidden" id="unitkerja" name="unitkerja">
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="dropdown-unitkerja">
        @foreach ($unitkerja as $v)
            <a class="dropdown-item" href="#" id="{{$v->id}}"><?php echo $v->id . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .$v->nama ?></a>
        @endforeach
        </div>
    @endif
    </div>
    </div>
</div>

<div class="form-group">
    <label for="ttl" class="col-sm-2 control-label">Jenis Penugasan</label>
    <div class="col-sm-10">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="internal" <?php echo (!isset($penugasanUnitKerja)) ? '' : (($penugasanUnitKerja->jenis_penugasan == 0) ? 'checked' : '') ?>>
            <label class="form-check-label" for="flexRadioDefault1">
                Internal
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="external" <?php echo (!isset($penugasanUnitKerja)) ? '' : (($penugasanUnitKerja->jenis_penugasan == 1) ? 'checked' : '') ?>>
            <label class="form-check-label" for="flexRadioDefault2">
                External
            </label>
        </div>
        <input type="hidden" id="jenis-penugasan" name="jenis_penugasan" value="{{$penugasanUnitKerja->jenis_penugasan ?? ''}}">
    </div>
</div>

<div class="form-group">
    <label for="ttl" class="col-sm-2 control-label">Deskripsi Penugasan</label>
    <div class="col-sm-10">
    <textarea class="editor form-control" name="editor" id="editor">
        {{$penugasanUnitKerja->deskripsi_penugasan ?? ''}}
    </textarea>
    </div>
</div>

<div class="form-group">
<label for="usia" class="col-sm-6 control-label">Tanggal Mulai Penugasan</label>
<div class="col-sm-10">
<input type="date" name="tanggal_mulai_penugasan" class="form-control" value="<?php echo isset($penugasanUnitKerja->jadwal_mulai_penugasan) ? date('Y-m-d', strtotime($penugasanUnitKerja->jadwal_mulai_penugasan)) : ''?>">
</div>
</div>

<div class="form-group">
    <label for="usia" class="col-sm-6 control-label">Waktu Mulai Penugasan</label>
    <div class="col-sm-10">
        <div class="input-group date" id="datetimepicker1" data-target-input="nearest" onkeydown="return false">
            <input type="text" class="form-control datetimepicker-input" name="waktu_mulai_penugasan" data-target="#datetimepicker1" value="<?php echo isset($penugasanUnitKerja->jadwal_mulai_penugasan) ? date('H:i', strtotime($penugasanUnitKerja->jadwal_mulai_penugasan)) : ''?>"/>
            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
<label for="usia" class="col-sm-6 control-label">Tanggal Akhir Penugasan</label>
<div class="col-sm-10">
<input type="date" name="tanggal_akhir_penugasan" class="form-control" value="<?php echo isset($penugasanUnitKerja->jadwal_akhir_penugasan) ? date('Y-m-d', strtotime($penugasanUnitKerja->jadwal_akhir_penugasan)) : ''?>">
</div>
</div>

<div class="form-group">
    <label for="usia" class="col-sm-6 control-label">Waktu Akhir Penugasan</label>
    <div class="col-sm-10">
        <div class="input-group date" id="datetimepicker2" data-target-input="nearest" onkeydown="return false">
            <input type="text" class="form-control datetimepicker-input" name="waktu_akhir_penugasan" data-target="#datetimepicker2" value="<?php echo isset($penugasanUnitKerja->jadwal_akhir_penugasan) ? date('H:i', strtotime($penugasanUnitKerja->jadwal_akhir_penugasan)) : ''?>"/>
            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
    <a href="{{ route('admin.penugasan-unitkerja.index') }}" class="btn btn-primary" role="button">Batal</a>
    </div>
</div>