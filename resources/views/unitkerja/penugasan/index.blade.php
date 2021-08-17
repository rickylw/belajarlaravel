@extends('layouts_unitkerja.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4 class="my-auto">Data Penugasan Unit Kerja</h4>
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 10%">#</th>
                        <th style="width: 15%">NIP</th>
                        <th style="width: 25%">Nama</th>
                        <th style="width: 20%">Jenis Penugasan</th>
                        <th style="width: 25%">Tanggal Pengajuan</th>
                        <th style="width: 10%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($penugasanUnitKerja as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->nama_unitkerja }}</td>
                        <td>{{ ($item->jenis_penugasan == 0) ? "Internal" : "External" }}</td>
                        <td><?php echo date('d M Y', strtotime($item->created_at)) ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ route('unitkerja.penugasan.detail', $item->id) }}">
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
            <a href="{{$penugasanUnitKerja->previousPageUrl()}}">
                <i class="fas fa-fw fa-chevron-left"></i>
            </a>
            @for($i=1;$i<=$penugasanUnitKerja->lastPage();$i++)
                <a href="{{$penugasanUnitKerja->url($i)}}">{{$i}}</a>
            @endfor
            <a href="{{$penugasanUnitKerja->nextPageUrl()}}">
                <i class="fas fa-fw fa-chevron-right"></i>
            </a>
        </div>
        
    </div>
    
</div>
</div> @stop
        