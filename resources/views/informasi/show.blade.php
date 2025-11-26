@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="m-0">Detail Informasi</h5>
        </div>
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Kategori</div>
                <div class="col-sm-9">{{ ucfirst($informasi->kategori) }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Judul</div>
                <div class="col-sm-9">{{ $informasi->judul }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Isi</div>
                <div class="col-sm-9">{{ $informasi->isi }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Tanggal Publish</div>
                <div class="col-sm-9">{{ $informasi->tanggal_publish->format('d-m-Y H:i') }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Penulis</div>
                <div class="col-sm-9">{{ $informasi->penulis }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Lampiran</div>
                <div class="col-sm-9">
                    @if ($informasi->lampiran)
                        <a href="{{ asset($informasi->lampiran) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fas fa-download"></i> Lihat Lampiran
                        </a>
                    @else
                        <span class="text-muted">Tidak ada lampiran</span>
                    @endif
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-sm-3 font-weight-bold">Status</div>
                <div class="col-sm-9">
                    <span class="badge {{ $informasi->status == 'aktif' ? 'badge-success' : 'badge-secondary' }}">
                        {{ ucfirst($informasi->status) }}
                    </span>
                </div>
            </div>

            <a href="{{ route('informasi.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('informasi.edit', $informasi->id_informasi) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Ubah Data
            </a>

        </div>
    </div>
</div>
@endsection
