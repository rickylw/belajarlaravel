@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <p class="my-auto">Data Kontrak Unit Kerja</p>
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 10%">#</th>
                        <th style="width: 15%">NIP</th>
                        <th style="width: 20%">Nama</th>
                        <th style="width: 10%">Lama Kontrak</th>
                        <th style="width: 10%">Status Kontrak</th>
                        <th style="width: 20%">Tanggal Pembuatan Kontrak</th>
                        <th style="width: 20%">Tanggal Habis Kontrak</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($unitkerja as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->lama_kontrak. ' bulan' }}</td>
                        <td>{{ ($item->status_kontrak == 0) ? 'Sudah Habis' : 'Sedang Berjalan' }}</td>
                        <td><?php echo date('d M Y', strtotime($item->tanggal_pembuatan_kontrak)) ?></td>
                        <td><?php echo date('d M Y', strtotime($item->tanggal_habis_kontrak)) ?></td>
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
            <a href="{{$unitkerja->previousPageUrl()}}">
                <i class="fas fa-fw fa-chevron-left"></i>
            </a>
            @for($i=1;$i<=$unitkerja->lastPage();$i++)
                <a href="{{$unitkerja->url($i)}}">{{$i}}</a>
            @endfor
            <a href="{{$unitkerja->nextPageUrl()}}">
                <i class="fas fa-fw fa-chevron-right"></i>
            </a>
        </div>
        
    </div>
    
</div>
</div> @stop
        