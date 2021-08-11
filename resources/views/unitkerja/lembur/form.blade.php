{{ csrf_field() }}
@if (isset($lemburUnitKerja->surat_keterangan_lembur))
    <div class="form-group">
        <label for="nama" class="col-sm-2 control-label">Surat Izin Pelatihan</label>
        <div class="col-sm-10">
        <a href="{{asset($lemburUnitKerja->surat_keterangan_lembur)}}"><?php echo explode('/', $lemburUnitKerja->surat_keterangan_lembur)[2] ?></a>
        </div>
    </div>
@endif

<div class="form-group">
    <label for="usia" class="col-sm-6 control-label">Tanggal Lembur</label>
    <div class="col-sm-10">
    <input type="date" name="tanggal_lembur" class="form-control" value="<?php echo isset($lemburUnitKerja->jadwal_mulai_lembur) ? date('Y-m-d', strtotime($lemburUnitKerja->jadwal_mulai_lembur)) : ''?>">
    </div>
</div>
    
<div class="form-group">
    <label for="usia" class="col-sm-6 control-label">Waktu Mulai Lembur</label>
    <div class="col-sm-10">
        <div class="input-group date" id="datetimepicker1" data-target-input="nearest" onkeydown="return false">
            <input type="text" class="form-control datetimepicker-input" name="waktu_mulai_lembur" data-target="#datetimepicker1" value="<?php echo isset($lemburUnitKerja->jadwal_mulai_lembur) ? date('H:i', strtotime($lemburUnitKerja->jadwal_mulai_lembur)) : ''?>"/>
            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="usia" class="col-sm-6 control-label">Waktu Selesai Lembur</label>
    <div class="col-sm-10">
        <div class="input-group date" id="datetimepicker2" data-target-input="nearest" onkeydown="return false">
            <input type="text" class="form-control datetimepicker-input" name="waktu_selesai_lembur" data-target="#datetimepicker2" value="<?php echo isset($lemburUnitKerja->jadwal_selesai_lembur) ? date('H:i', strtotime($lemburUnitKerja->jadwal_selesai_lembur)) : ''?>"/>
            <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
<label for="ttl" class="col-sm-6 control-label">Deksripsi</label>
<div class="col-sm-10">
<textarea class="editor form-control" name="editor" id="editor">
    {{ $lemburUnitKerja->deskripsi ?? '' }}
</textarea>
</div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
    <a href="{{ route('unitkerja.lembur.index') }}" class="btn btn-primary" role="button">Batal</a>
    </div>
</div>