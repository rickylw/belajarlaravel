@extends('layouts_pimpinan.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <p class="my-auto">Data Perpanjangan Kontrak Pegawai</p>
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 10%">#</th>
                        <th style="width: 15%">NIP</th>
                        <th style="width: 20%">Nama</th>
                        <th style="width: 20%">Tanggal Pembuatan Kontrak</th>
                        <th style="width: 20%">Tanggal Habis Kontrak</th>
                        <th style="width: 10%">Sisa Waktu Kontrak</th>
                        <th style="width: 10%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($kontrakPegawai as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->nama }}</td>
                        <td><?php echo date('d M Y', strtotime($item->created_at)) ?></td>
                        <td><?php echo date('d M Y', strtotime($item->tanggal_habis_kontrak)) ?></td>
                        <td>{{ $item->diff. ' hari' }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ route('pimpinan.re-kontrak-pegawai.detail', $item->id) }}">
                                Detail
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php $no++;?>
                
                @empty
                <tr>
                    <td colspan="4"> Tidak ada data.
                    </td>
                </tr> @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="text-center">
            <a href="{{$kontrakPegawai->previousPageUrl()}}">
                <i class="fas fa-fw fa-chevron-left"></i>
            </a>
            @for($i=1;$i<=$kontrakPegawai->lastPage();$i++)
                <a href="{{$kontrakPegawai->url($i)}}">{{$i}}</a>
            @endfor
            <a href="{{$kontrakPegawai->nextPageUrl()}}">
                <i class="fas fa-fw fa-chevron-right"></i>
            </a>
        </div>
        
    </div>
    
</div>
</div> @stop
        