@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h5 class="my-auto">Data Pengajuan Lowongan Pekerjaan</h5>
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 10%">Judul</th>
                        <th style="width: 35%">Deksripsi</th>
                        <th style="width: 15%">Status</th>
                        <th style="width: 20%">Tanggal Pembuatan</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($lowonganPekerjaan as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <div class="text-ellipsis-4 isi-justify">
                                <?php echo $item->deskripsi ?>
                            </div>
                        </td>
                        <td><?php echo ($item->status == 0) ? 'Tidak Aktif' : (($item->status == 1) ? 'Aktif' : 'Ditolak') ?></td>
                        <td><?php echo date('d M Y', strtotime($item->created_at))?></td>
                        
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="{{ route('admin.lowongan-kerja.submit', [$item->id, 1]) }}">
                                <i class="fas fa-check"></i>
                                </a>
                                <a class="btn btn-danger" href="{{ route('admin.lowongan-kerja.submit', [$item->id, 2]) }}">
                                <i class="fas fa-times"></i>
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
        
        <div class="card-footer clearfix text-center">
            <div class="mt-2">
                {{ $lowonganPekerjaan->links() }}
            </div>
        </div>
        
    </div>
    
</div>
</div> @stop
        