@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto">Permohonan Penugasan Pegawai</h4>
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 15%">#</th>
                        <th style="width: 20%">Nama Pegawai</th>
                        <th style="width: 25%">Judul</th>
                        <th style="width: 25%">Tanggal Pengajuan</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($permohonanPegawai as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama_pegawai }}</td>
                        <td>{{ $item->judul }}</td>
                        <td><?php echo date('d M Y, H:i', strtotime($item->created_at))?></td>                                                
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.permohonan-penugasan-pegawai.detail', $item->id) }}">
                            Detail
                            </a>
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
            <a href="{{$permohonanPegawai->previousPageUrl()}}">
                <i class="fas fa-fw fa-chevron-left"></i>
            </a>
            @for($i=1;$i<=$permohonanPegawai->lastPage();$i++)
                <a href="{{$permohonanPegawai->url($i)}}">{{$i}}</a>
            @endfor
            <a href="{{$permohonanPegawai->nextPageUrl()}}">
                <i class="fas fa-fw fa-chevron-right"></i>
            </a>
        </div>
        
        </div>
        
        </div>
        </div> @stop
        