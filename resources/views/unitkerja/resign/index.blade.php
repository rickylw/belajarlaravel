@extends('layouts_unitkerja.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-md" href="{{ route('unitkerja.resign.create') }}">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 20%">Nama Unit Kerja</th>
                        <th style="width: 20%">Waktu Berhenti</th>
                        <th style="width: 20%">Tanggal Pengajuan</th>
                        <th style="width: 20%">Status</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($resignUnitKerja as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama_unitkerja }}</td>
                        <td><?php echo date('d M Y', strtotime($item->waktu_berhenti))?></td>
                        <td><?php echo date('d M Y, H:i', strtotime($item->created_at))?></td>
                        <td>
                            <?php echo (($item->status == 0) ? 'Belum di acc' : (($item->status == 1) ? 'Diterima' : 'Ditolak')) ?>    
                        </td>
                                                
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="{{ route('unitkerja.resign.edit', $item->id) }}">
                                <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger" href="{{ route('unitkerja.resign.delete', $item->id) }}">
                                <i class="fas fa-trash"></i>
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
            <a href="{{$resignUnitKerja->previousPageUrl()}}">
                <i class="fas fa-fw fa-chevron-left"></i>
            </a>
            @for($i=1;$i<=$resignUnitKerja->lastPage();$i++)
                <a href="{{$resignUnitKerja->url($i)}}">{{$i}}</a>
            @endfor
            <a href="{{$resignUnitKerja->nextPageUrl()}}">
                <i class="fas fa-fw fa-chevron-right"></i>
            </a>
        </div>
        
        </div>
        
        </div>
        </div> @stop
        