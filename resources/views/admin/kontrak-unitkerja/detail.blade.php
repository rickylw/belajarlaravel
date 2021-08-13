@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
        
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between">
                    <h4 class="my-auto">Detail Kontrak Unit Kerja</h4>                    
                    {{-- @if ($lemburPegawai->status == 1)
                        <a href="{{asset($lemburPegawai->surat_keterangan_lembur)}}" class="btn btn-success ml-4">Surat Lembur</a>
                    @endif --}}
                </div>
            </a>
        </div>
        
        <div class="card-body">
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Nama Unit Kerja</b></p>
                <p class="col-xl-9 my-auto">{{$unitkerja->nama}}</p>                  
            </div>
            <hr class="my-2" />
            
            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Jabatan</b></p>
                <p class="col-xl-9 my-auto">{{$unitkerja->jabatan}}</p>                  
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Lama Kontrak</b></p>
                <p class="col-xl-9 my-auto">{{$unitkerja->lama_kontrak}} bulan</p>    
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Tanggal Pembuatan Kontrak</b></p>
                <p class="col-xl-9 my-auto">{{date('d M y', strtotime($unitkerja->tanggal_pembuatan_kontrak))}}</p>    
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Tanggal Habis Kontrak</b></p>
                <p class="col-xl-9 my-auto">{{date('d M y', strtotime($unitkerja->tanggal_habis_kontrak))}}</p>    
            </div>
            <hr class="my-2" />

            <div class="row">
                <p class="text-muted col-xl-3 my-auto"><b>Sisa Waktu</b></p>
                <p class="col-xl-9 my-auto">{{$unitkerja->diff}} hari</p>    
            </div>
            <hr class="my-2" />

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
        