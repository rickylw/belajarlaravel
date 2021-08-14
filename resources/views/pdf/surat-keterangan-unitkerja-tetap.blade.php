<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
	border:0;
	padding:0;
	margin-left:-0.00001;
}
    </style>
</head>
<body class="m-4">
    <div>
        <div class="row">
            <div class="col-xs-4 my-auto">
                <h3>LOGO</h3>
            </div>
            <div class="col-xs-8 text-center">
                <h3><b>NAMA PERUSAHAAN PT</b></h3>
                <p>Alamat Perusahaan</p>
            </div>
        </div>

        <div class="row text-center mt-4">
            <div class="col-sm-12">
                <h3><b><u>SURAT KETERANGAN</u></b></h3>
                <p>(Nomor Surat)</p>
            </div>
        </div>

        <div class="mt-4">
            <div class="row"><p>PT.Nama Perusahaan menyatakan dengan sesungguhnya bahwa :</p></div>
            <div class="row">
                <div class="col-xs-4">
                    <p>Nama : {{$unitkerja->nama}}</p>
                </div>
                <div class="col-xs-8 text-center">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <p>Tempat, Tanggal Lahir :  <?php echo ($unitkerja->tempat_lahir .', '. date('d M Y', strtotime($unitkerja->tanggal_lahir)))?></p>
                </div>
                <div class="col-xs-8 text-center">
                   
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <p>Foto Diri : </p><img src="{{public_path($unitkerja->foto_diri)}}" height="100px" alt="">
                </div>
                <div class="col-xs-8 text-center">
                    
                </div>
            </div>
        </div>

        <div class="mt-4">
            <div class="row" style="text-align: justify"><p>Telah diangkat menjadi unit kerja tetap di PT Nama Perusahaan yang bekerja di bagian (departemen tempat bekerja) sebagai (jabatan). Demikian surat keterangan ini dibuat agar dipergunakan sebagaimana mestinya.</p></div>
            <br>
            <div class="row"><p>Palembang, (Tanggal Pembuatan Surat)</p></div>
            <div class="row"><p>PT Nama Perusahaan</p></div>
            <br>
            <br>
            <br>
            <br>
            <div class="row"><p>(Nama Admin)</p></div>
            <div class="row"><p>HRD Manager</p></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>