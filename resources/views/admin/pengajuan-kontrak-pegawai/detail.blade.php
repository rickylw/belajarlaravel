@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="my-auto">Detail Kontrak Pegawai</h4>                    
                    {{-- @if ($lemburPegawai->status == 1)
                        <a href="{{asset($lemburPegawai->surat_keterangan_lembur)}}" class="btn btn-success ml-4">Surat Lembur</a>
                    @endif --}}
                </div>
            </a>
        </div>
        
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('admin.pengajuan-kontrak-pegawai.submit', $pengajuan->id) }}" method="post" enctype="multipart/form-data"> 
                {{ csrf_field() }}
                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Nama Pegawai</b></p>
                    <p class="col-xl-9 my-auto">{{$pengajuan->nama}}</p>                  
                </div>
                <hr class="my-2" />
                
                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Jabatan</b></p>
                    <p class="col-xl-9 my-auto">{{$pengajuan->jabatan}}</p>                  
                </div>
                <hr class="my-2" />

                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Lama Kontrak</b></p>
                    <p class="col-xl-9 my-auto">{{$pengajuan->lama_kontrak}} bulan</p>    
                </div>
                <hr class="my-2" />

                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Tanggal Pembuatan Kontrak</b></p>
                    <p class="col-xl-9 my-auto">{{date('d M y', strtotime($pengajuan->created_at))}}</p>    
                </div>
                <hr class="my-2" />

                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Tanggal Habis Kontrak</b></p>
                    <p class="col-xl-9 my-auto">{{date('d M y', strtotime($pengajuan->tanggal_habis_kontrak))}}</p>    
                </div>
                <hr class="my-2" />

                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Sisa Waktu</b></p>
                    <p class="col-xl-9 my-auto">{{$pengajuan->diff}} hari</p>    
                </div>
                <hr class="my-2" />

                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Analisis SDM</b></p>
                    <div class="col-xl-9 my-auto"><?php echo $pengajuan->analisis_sdm ?></div>    
                </div>
                <hr class="my-2" />

                <div class="row">
                    <p class="text-muted col-xl-3 my-auto"><b>Keputusan Pimpinan</b></p>
                    <div class="col-xl-9 my-auto"><?php echo ($pengajuan->keputusan_pimpinan == null) ? 'Belum ada keputusan' : $pengajuan->keputusan_pimpinan ?></div>    
                </div>
                <hr class="my-2" />

                @if ($pengajuan->keputusan_pimpinan != null)
                    <div class="row">
                        <p class="text-muted col-xl-3 my-auto"><b>Keputusan</b></p>
                        <div id="group-radio">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="A">
                                <label class="custom-control-label" for="customRadio1">Menjadi Pegawai Tetap</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="B">
                                <label class="custom-control-label" for="customRadio2">Putus Hubungan Kerja</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" value="C">
                                <label class="custom-control-label" for="customRadio3">Perpanjangan Kontrak</label>
                            </div>
                            <input type="text" name="waktu_kontrak" class="form-control" id="waktu-kontrak" disabled>
                            <input type="hidden" name="tipe" class="form-control" id="tipe">
                        </div>
                    </div>
                    <hr class="my-2" />

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
                        <a href="{{ route('pimpinan.re-kontrak-pegawai.index') }}" class="btn btn-primary" role="button">Batal</a>
                        </div>
                    </div>
                @endif
            </form>    

            {{-- @if ($lemburPegawai->status == 0)
                <div class="row">
                    <div>
                        <a class="btn btn-success" href="{{ route('admin.lembur-pegawai.submit', [$lemburPegawai->id, 1]) }}">Setuju
                        <i class="fas fa-check"></i>
                        </a>
                    </div>
                    <div class="ml-3">
                        <a class="btn btn-danger" href="{{ route('admin.lembur-pegawai.submit', [$lemburPegawai->id, 2]) }}">Tolak
                        <i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
                <hr class="my-2" />
            @endif --}}
        
          </div>
        
    </div>
    
</div>
</div> @stop

@section('contentjs')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckeditor/adapters/jquery.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'editor' );
</script>
<script src="{{asset('assets/dist/js/pages/admin/jadwal-tes.js')}}"></script>
    
@endsection
        