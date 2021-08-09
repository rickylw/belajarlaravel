@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <h4>Pesan Keluar</h4>
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
                <thead>
                    <tr>
                        <th style="width: 10%">#</th>
                        <th style="width: 25%">Subjek</th>
                        <th style="width: 20%">Penerima</th>
                        <th style="width: 25%">Waktu</th>
                        <th style="width: 20%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($pesan as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->subjek }}</td>
                        <td>{{ $item->nama_penerima }}</td>                    
                        <td>
                            <?php echo date('d M Y, H:i', strtotime($item->created_at)) ?>
                        </td> 
                        
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ route('admin.pesan-keluar.detail', $item->id) }}">
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
        