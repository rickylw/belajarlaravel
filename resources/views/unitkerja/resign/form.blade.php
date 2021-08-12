{{ csrf_field() }}

<div class="form-group">
    <label for="usia" class="col-sm-6 control-label">Tanggal Mengundurkan Diri</label>
    <div class="col-sm-10">
    <input type="date" name="waktu_berhenti" class="form-control" value="<?php echo isset($resignUnitKerja->waktu_berhenti) ? date('Y-m-d', strtotime($resignUnitKerja->waktu_berhenti)) : ''?>">
    </div>
</div>

<div class="form-group">
<label for="ttl" class="col-sm-6 control-label">Alasan Mengundurkan Diri</label>
<div class="col-sm-10">
<textarea class="editor form-control" name="editor" id="editor">
    {{ $resignUnitKerja->alasan_pengunduran_diri ?? '' }}
</textarea>
</div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
    <a href="{{ route('unitkerja.resign.index') }}" class="btn btn-primary" role="button">Batal</a>
    </div>
</div>