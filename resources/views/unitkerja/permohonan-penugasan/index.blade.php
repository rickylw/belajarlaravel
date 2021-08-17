@extends('layouts_unitkerja.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-md" href="{{ route('unitkerja.permohonan-penugasan.create') }}">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 15%">#</th>
                        <th style="width: 40%">Judul</th>
                        <th style="width: 30%">Tanggal Pengajuan</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($permohonanUnitKerja as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->judul }}</td>
                        <td><?php echo date('d M Y, H:i', strtotime($item->created_at))?></td>                                                
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="{{ route('unitkerja.permohonan-penugasan.edit', $item->id) }}">
                                <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger" href="{{ route('unitkerja.permohonan-penugasan.delete', $item->id) }}">
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
            <a href="{{$permohonanUnitKerja->previousPageUrl()}}">
                <i class="fas fa-fw fa-chevron-left"></i>
            </a>
            @for($i=1;$i<=$permohonanUnitKerja->lastPage();$i++)
                <a href="{{$permohonanUnitKerja->url($i)}}">{{$i}}</a>
            @endfor
            <a href="{{$permohonanUnitKerja->nextPageUrl()}}">
                <i class="fas fa-fw fa-chevron-right"></i>
            </a>
        </div>
        
        </div>
        
        </div>
        </div> @stop
        