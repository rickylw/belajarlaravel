@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-md" href="{{ route('admin.penugasan-unitkerja.create') }}">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 10%">#</th>
                        <th style="width: 15%">NIP</th>
                        <th style="width: 20%">Nama</th>
                        <th style="width: 20%">Jenis Penugasan</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 20%">Tanggal Pengajuan</th>
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
                        <td>{{ ($item->status == 0) ? "menunggu keputusan pimpinan" : (($item->status == 1) ? "Diterima" : "Ditolak") }}</td>
                        <td><?php echo date('d M Y', strtotime($item->created_at)) ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="{{ route('admin.penugasan-unitkerja.edit', $item->id) }}">
                                <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger" href="{{ route('admin.penugasan-unitkerja.delete', $item->id) }}">
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
        
        {{-- <div class="card-footer clearfix text-center">
            <div class="mt-2">
                {{ $pelamar->links() }}
            </div>
        </div> --}}
        
    </div>
    
</div>
</div> @stop
        