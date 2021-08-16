@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-md" href="{{ route('admin.jadwal-tes.create') }}">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 15%">Jadwal Tes</th>
                        <th style="width: 15%">Jenis Interview</th>
                        <th style="width: 35%">Deskripsi</th>
                        <th style="width: 20%">Nama Pelamar</th>
                        <th style="width: 10%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($pelamar as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->jadwal_tes }}</td>
                        <td>{{ $item->jenis_interview }}</td>
                        <td>
                            <div class="text-ellipsis-4 isi-justify">
                                <?php echo $item->deskripsi ?>
                            </div>
                        </td>                        
                        <td>{{ $item->nama_pelamar }}</td>
                        
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="{{ route('admin.jadwal-tes.edit', $item->id_pelamar) }}">
                                <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a class="btn btn-danger" href="{{ route('admin.jadwal-tes.delete', $item->id) }}">
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
            <a href="{{$pelamar->previousPageUrl()}}">
                <i class="fas fa-fw fa-chevron-left"></i>
            </a>
            @for($i=1;$i<=$pelamar->lastPage();$i++)
                <a href="{{$pelamar->url($i)}}">{{$i}}</a>
            @endfor
            <a href="{{$pelamar->nextPageUrl()}}">
                <i class="fas fa-fw fa-chevron-right"></i>
            </a>
        </div>
        
    </div>
    
</div>
</div> @stop
        