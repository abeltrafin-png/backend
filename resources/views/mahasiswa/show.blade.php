@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="m-0">Detail Mahasiswa</h5>
        </div>
        <div class="card-body">
            
            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">NIM</div>
                <div class="col-sm-9">{{ $mahasiswa->nim }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Nama</div>
                <div class="col-sm-9">{{ $mahasiswa->nama }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Email</div>
                <div class="col-sm-9">{{ $mahasiswa->email }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Jurusan</div>
                <div class="col-sm-9">{{ $mahasiswa->jurusan }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3 font-weight-bold">Angkatan</div>
                <div class="col-sm-9">{{ $mahasiswa->angkatan }}</div>
            </div>

            <div class="row mb-4">
                <div class="col-sm-3 font-weight-bold">Foto</div>
                <div class="col-sm-9">
                    @if ($mahasiswa->foto)
                        <img src="{{ asset('storage/' . $mahasiswa->foto) }}" 
                             alt="Foto Mahasiswa" 
                             class="img-thumbnail" 
                             width="150">
                    @else
                        <span class="text-muted">Tidak ada foto</span>
                    @endif
                </div>
            </div>

            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Ubah Data
            </a>

        </div>
    </div>
</div>
@endsection
