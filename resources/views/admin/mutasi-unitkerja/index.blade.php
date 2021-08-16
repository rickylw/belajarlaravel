@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-md" href="{{ route('admin.mutasi-unitkerja.create') }}">
                <i class="fa fa-plus"></i> Mutasi
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 15%">Nama</th>
                        <th style="width: 15%">Pekerjaan Sebelum</th>
                        <th style="width: 15%">Pekerjaan Tujuan</th>
                        <th style="width: 15%">Jabatan Sebelum</th>
                        <th style="width: 15%">Jabatan Tujuan</th>
                        <th style="width: 10%">Tanggal Mutasi</th>
                        <th style="width: 10%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($mutasiUnitKerja as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama_unitkerja }}</td>
                        <td>{{ $item->pekerjaan_awal }}</td>
                        <td>{{ $item->pekerjaan_tujuan }}</td>
                        <td>{{ $item->jabatan_awal }}</td>
                        <td>{{ $item->jabatan_tujuan }}</td>
                        <td><?php echo date('d M Y', strtotime($item->created_at)) ?></td>
                        
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ route('admin.mutasi-unitkerja.detail', $item->id) }}">
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
            <a href="{{$mutasiUnitKerja->previousPageUrl()}}">
                <i class="fas fa-fw fa-chevron-left"></i>
            </a>
            @for($i=1;$i<=$mutasiUnitKerja->lastPage();$i++)
                <a href="{{$mutasiUnitKerja->url($i)}}">{{$i}}</a>
            @endfor
            <a href="{{$mutasiUnitKerja->nextPageUrl()}}">
                <i class="fas fa-fw fa-chevron-right"></i>
            </a>
        </div>
        
    </div>
    
</div>
</div> @stop
        