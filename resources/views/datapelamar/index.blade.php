@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary btn-md" href="{{ route('data_pelamar.create') }}">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 12%">Nama</th>
                        <th style="width: 20%">Foto</th>
                        <th style="width: 15%">Tempat, Tanggal Lahir</th>
                        <th style="width: 10%">Jenis Kelamin</th>
                        <th style="width: 15%">Email</th>
                        <th style="width: 10%">No Handphone</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 5%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php $no=1;?>
                
                @forelse($tampil as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <img height="150px" src="{{asset($item->foto_diri)}}" alt="">
                        </td>
                        <td><?php echo ($item->tempat_lahir .', '. date('d M Y', strtotime($item->tanggal_lahir)))?></td>
                        <td>{{ ($item->jenis_kelamin == 0) ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->nama_status }}</td>
                        
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="{{ route('data_pelamar.edit', ['data_pelamar' => $item->id]) }}">
                                <i class="fas fa-pencil-alt"></i>
                                </a>
                                {{-- <a class="btn btn-primary" onclick="hapus('{{ $item->id }}')" href="#">
                                <i class="fas fa-trash"></i>
                                </a> --}}
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
            <a href="{{$tampil->previousPageUrl()}}">
                <i class="fas fa-fw fa-chevron-left"></i>
            </a>
            @for($i=1;$i<=$tampil->lastPage();$i++)
                <a href="{{$tampil->url($i)}}">{{$i}}</a>
            @endfor
            <a href="{{$tampil->nextPageUrl()}}">
                <i class="fas fa-fw fa-chevron-right"></i>
            </a>
        </div>
        
        </div>
        
        </div>
        </div> @stop
        @section('plugins.Sweetalert2', true) @section('plugins.Pace', true)
        
        @section('js')
        @if (session('success'))
        <script type="text/javascript"> Swal.fire(
        'Sukses!',
        '{{ session('success') }}', 'success'
        )
        </script> @endif
         
        <script type="text/javascript"> function hapus(id){
        
            Swal.fire({
            title: 'Konfirmasi',
            text: "Yakin menghapus data ini?", icon: 'warning', showCancelButton: true, confirmButtonColor: '#3085d6', cancelButtonColor: '#dd3333', confirmButtonText: 'Hapus', cancelButtonText: 'Batal',
            }).then((result) => { if (result.value) {
            
            $.ajax({
            url: "/kelas/"+id, type: 'DELETE',
            data: {
            '_token': $('meta[name=csrf-token]').attr("content"),
            },
            success: function(result) { Swal.fire(
            'Sukses!', 'Berhasil Hapus', 'success'
             
            
            
            }
            });
             
            );
            location.reload();
             
            
            }
            })
            }
            </script>
</div>
@endsection