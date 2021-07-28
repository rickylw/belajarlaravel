{{-- {{ csrf_field() }} --}}
<form action="/datapegawai" method="POST" enctype="multipart/form-data">
@csrf
<link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
<link href="assets/css/custom.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="{{ url('assets/plugins/datepicker/dist/css/bootstrap-datepicker.min.css')}}"/>
<script src="assets/js/jquery-3.1.1.min"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ url('assets/plugins/datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script type="text/javascript">
    $(function(){
     $(".datepicker").datepicker({
         format: 'yyyy-mm-dd',
         autoclose: true,
         todayHighlight: true,
     });
    });
   </script>

<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
        <input type="text" placeholder="Please Insert Your name..." name="name" id="name" class="form-control" value="{{ $name ?? '' }}" >
    </div>
</div>

<div class="form-group">
    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
    <div class="col-sm-10">
        <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $alamat ?? '' }}" >
    </div>
</div>

<div class="form-group">
    <label for="tempatlahir" class="col-sm-2 control-label">Tempat Lahir</label>
    <div class="col-sm-10">
        <input type="text" name="tempatlahir" class="form-control" value="{{ $tempatlahir ?? '' }}" >
    </div>
 </div>

 <div class="input-group date">
    <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
    <input placeholder="masukkan tanggal Lahir" type="date" class="form-control datepicker" name="tanggal_lahir" value="{{ $tanggal_lahir ?? '' }}" >
 </div>

<div class="form-group">
    <label for="pendidikan" class="col-sm-2 control-label">Pendidikan</label>
        <div class="col-sm-10">
            <input type="text" name="pendidikan" class="form-control" value="{{ $pendidikan ?? '' }}" >
        </div>
</div>

<div class="form-group">
    <label for="programstudi" class="col-sm-2 control-label">Program Studi</label>
        <div class="col-sm-10">
            <input type="text" name="programstudi" class="form-control" value="{{ $programstudi ?? '' }}" >
        </div>
</div>

<div class="form-group">
    <label for="tahunkelulusan" class="col-sm-2 control-label">Tahun Kelulusan</label>
        <div class="col-sm-10">
            <input type="text" name="tahunkelulusan" class="form-control" value="{{ $tahunkelulusan ?? '' }}" >
        </div>
</div>

<div class="form-group">
    <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
        <div class="col-sm-10">
            <input type="text" name="jabatan" class="form-control" value="{{ $jabatan ?? '' }}" >
        </div>
</div>

<div class="input-group date">
    <label for="tanggalsk" class="col-sm-2 control-label">Tanggal SK</label>
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
    <input placeholder="masukkan tanggal SK" type="date" class="form-control datepicker" name="tanggalsk" value="{{ $tanggal_lahir ?? '' }}" >
 </div>

<div class="form-group">
    <label for="foto" class="col-sm-2 control-label">Foto Pegawai</label>
        <div class="col-sm-10">
            <input type="file" name="foto" class="form-control" value="{{ $foto ?? '' }}" placeholder="foto">
        </div>
    </div>

<div class="form-group">
    <label for="email" class="col-sm-2 control-label">E-mail</label>
        <div class="col-sm-10">
            <input type="text" name="email" class="form-control" value="{{ $email ?? '' }}" >
        </div>
    </div>  

<div class="form-group">
    <label for="hp" class="col-sm-2 control-label">No.HP</label>
        <div class="col-sm-10">
            <input type="text" name="hp" class="form-control" value="{{ $hp ?? '' }}" >
        </div>
    </div>
<button class="btn btn-primary btn-sm" type="submit">Create</button>
