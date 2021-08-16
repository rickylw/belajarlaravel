@extends('layouts_pimpinan.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <p class="my-auto">Data Pengajuan Pensiun Unit Kerja</p>
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 12%">Nama</th>
                        <th style="width: 30%">Foto</th>
                        <th style="width: 10%">Jenis Kelamin</th>
                        <th style="width: 10%">Jabatan</th>
                        <th style="width: 15%">Umur</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 10%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($unitkerja as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama }}</td>
                        <td class="text-center">
                            <img height="150px" src="{{asset($item->foto_diri)}}" alt="">
                        </td>
                        <td>{{ ($item->jenis_kelamin == 0) ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->selisih_tahun }} tahun</td>
                        <td>{{ ($item->status == 0) ? 'Tidak Bekerja' : 'Sedang Bekerja' }}</td>
                        
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ route('pimpinan.pensiun-unitkerja.detail', $item->id_pensiun) }}">
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
        
        {{-- <div class="card-footer clearfix text-center">
            <div class="mt-2">
                {{ $pelamar->links() }}
            </div>
        </div> --}}
        
    </div>
    
</div>
</div> @stop
        