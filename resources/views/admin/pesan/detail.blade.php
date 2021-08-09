@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto">Detail Pesan</h4>
            </a>
        </div>
        
        <div class="card-body">

            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label"><?php echo (Auth::id() == $pesan->dari_user) ? 'Penerima' : 'Pengirim' ?></label>
                <div class="col-sm-10">
                <p><?php echo (Auth::id() == $pesan->dari_user) ? $pesan->nama_penerima : $pesan->nama_pengirim ?></p>
                </div>
            </div>
            
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Waktu</label>
                <div class="col-sm-10">
                    <?php echo date('d M Y, H:i', strtotime($pesan->created_at)) ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Subjek</label>
                <div class="col-sm-10">
                <p>{{$pesan->subjek}}</p>
                </div>
            </div>
            
            <div class="form-group">
                <label for="ttl" class="col-sm-2 control-label">Isi Pesan</label>
                <div class="col-sm-10">
                <?php echo $pesan->isi_pesan ?>
                </div>
            </div>
          </div>
        
    </div>
    
</div>
</div> @stop
        