@extends('layouts_pimpinan.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4>Data Hasil Interview</h4>
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 20%">Nama Pelamar</th>
                        <th style="width: 20%">Jenis Interview</th>
                        <th style="width: 20%">Status</th>
                        <th style="width: 20%">Waktu Interview</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($hasilInterview as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama_pelamar }}</td>
                        <td>{{ $item->jenis_interview }}</td>                        
                        <td>
                            <?php echo (($item->status == 0) ? 'Belum di acc' : (($item->status == 1) ? 'Diterima' : 'Ditolak')) ?>
                        </td>                    
                        <td>
                            <?php echo date('d M Y, H:i', strtotime($item->created_at)) ?>
                        </td>
                        
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ route('pimpinan.hasil-interview.detail', $item->id) }}">
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
            <a href="{{$hasilInterview->previousPageUrl()}}">
                <i class="fas fa-fw fa-chevron-left"></i>
            </a>
            @for($i=1;$i<=$hasilInterview->lastPage();$i++)
                <a href="{{$hasilInterview->url($i)}}">{{$i}}</a>
            @endfor
            <a href="{{$hasilInterview->nextPageUrl()}}">
                <i class="fas fa-fw fa-chevron-right"></i>
            </a>
        </div>
        
    </div>
    
</div>
</div> @stop
        