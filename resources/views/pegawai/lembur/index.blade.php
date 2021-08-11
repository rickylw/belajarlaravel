@extends('layouts_pegawai.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-md" href="{{ route('pegawai.lembur.create') }}">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 20%">Nama Pegawai</th>
                        <th style="width: 15%">Jadwal Mulai Lembur</th>
                        <th style="width: 15%">Jadwal Akhir Lembur</th>
                        <th style="width: 15%">Tanggal Pengajuan</th>
                        <th style="width: 15%">Status</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($lemburPegawai as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama_pegawai }}</td>
                        <td><?php echo date('d M Y, H:i', strtotime($item->jadwal_mulai_lembur))?></td>
                        <td><?php echo date('d M Y, H:i', strtotime($item->jadwal_selesai_lembur))?></td>
                        <td><?php echo date('d M Y, H:i', strtotime($item->created_at))?></td>
                        <td>
                            <?php echo (($item->status == 0) ? 'Belum di acc' : (($item->status == 1) ? 'Diterima' : 'Ditolak')) ?>    
                        </td>
                                                
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="{{ route('pegawai.lembur.edit', $item->id) }}">
                                <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger" href="{{ route('pegawai.lembur.delete', $item->id) }}">
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
                {{ $lowonganPekerjaan->links() }}
            </div>
        </div> --}}
        
        </div>
        
        </div>
        </div> @stop
        