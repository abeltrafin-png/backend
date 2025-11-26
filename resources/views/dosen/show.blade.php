@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="m-0">Detail Dosen</h5>
        </div>
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">NIDN</div>
                <div class="col-sm-9">{{ $dosen->nidn }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Nama</div>
                <div class="col-sm-9">{{ $dosen->nama }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Email</div>
                <div class="col-sm-9">{{ $dosen->email }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Jurusan</div>
                <div class="col-sm-9">{{ $dosen->jurusan }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Jabatan</div>
                <div class="col-sm-9">{{ $dosen->jabatan ?? '-' }}</div>
            </div>

            <div class="row mb-4">
                <div class="col-sm-3 font-weight-bold">Foto</div>
                <div class="col-sm-9">
                    @if ($dosen->foto)
                        <img src="{{ asset('storage/' . $dosen->foto) }}"
                             alt="Foto Dosen"
                             class="img-thumbnail"
                             width="150">
                    @else
                        <span class="text-muted">Tidak ada foto</span>
                    @endif
                </div>
            </div>

            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Ubah Data
            </a>

        </div>
    </div>
</div>
@endsection
