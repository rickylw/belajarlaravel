@extends('layouts_pimpinan.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <p class="my-auto">Data Training Unit Kerja</p>
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 15%">Nama Pelatihan</th>
                        <th style="width: 20%">Nama Unit Kerja</th>
                        <th style="width: 15%">Jadwal Mulai Pelatihan</th>
                        <th style="width: 15%">Jadwal Akhir Pelatihan</th>
                        <th style="width: 15%">Status</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($trainingUnitKerja as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama_pelatihan }}</td>
                        <td>{{ $item->nama_unitkerja }}</td>
                        <td><?php echo date('d M Y, H:i', strtotime($item->jadwal_mulai_pelatihan))?></td>
                        <td><?php echo date('d M Y, H:i', strtotime($item->jadwal_akhir_pelatihan))?></td>
                        <td>
                            <?php echo (($item->status == 0) ? 'Belum di acc' : (($item->status == 1) ? 'Diterima' : 'Ditolak')) ?>    
                        </td>
                                                
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ route('pimpinan.training-unitkerja.detail', $item->id) }}">
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
            <a href="{{$trainingUnitKerja->previousPageUrl()}}">
                <i class="fas fa-fw fa-chevron-left"></i>
            </a>
            @for($i=1;$i<=$trainingUnitKerja->lastPage();$i++)
                <a href="{{$trainingUnitKerja->url($i)}}">{{$i}}</a>
            @endfor
            <a href="{{$trainingUnitKerja->nextPageUrl()}}">
                <i class="fas fa-fw fa-chevron-right"></i>
            </a>
        </div>
        
        </div>
        
        </div>
        </div> @stop
        