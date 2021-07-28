{{ csrf_field() }}

<div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
        {{-- <input type="text" name="nama" class="form-control" value="{{ $nama ?? '' }}" > --}}
        <select name="id_pegawai" id="id_pegawai">
            <?php
                foreach ($pegawai as $p) {
                    # code...
                    echo json_encode($p);
                    echo "<option value='$p->id'>$p->name</option>";
                }
            ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
    <div class="col-sm-10">
        {{-- <input type="text" name="nama" class="form-control" value="{{ $nama ?? '' }}" > --}}
        <select name="id_pegawai" id="id_pegawai">
            <?php
                foreach ($pegawai as $p) {
                    # code...
                    echo json_encode($p);
                    echo "<option value='$p->id'>$p->jabatan</option>";
                }
            ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="pekerjaan" class="col-sm-2 control-label">pekerjaan</label>
    <div class="col-sm-10">
    <input type="text" name="pekerjaan" class="form-control" value="{{ $pekerjaan ?? '' }}" >
 </div>
</div>

<div class="form-group">
    <label for="hari" class="col-sm-2 control-label">hari</label>
    <div class="col-sm-10">
    <input type="text" name="hari" class="form-control" value="{{ $hari ?? '' }}" >
    </div>
</div>

<div class="form-group">
    <label for="tanggal" class="col-sm-2 control-label">tanggal</label>
    <div class="col-sm-10">
    <input type="text" name="tanggal" class="form-control" value="{{ $tanggal ?? '' }}" >
</div>
</div>

<div class="form-group">
    <label for="pukul" class="col-sm-2 control-label">pukul</label>
    <div class="col-sm-10">
    <input type="text" name="pukul" class="form-control" value="{{ $pukul ?? '' }}" >
</div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
    <a href="{{ route('lembur.index') }}" class="btn btn-primary" role="button">Batal</a>
</div>
</div>
