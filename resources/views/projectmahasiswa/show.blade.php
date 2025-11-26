@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Detail Project Mahasiswa</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $projectmahasiswa->nama_project }}</h5>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $projectmahasiswa->deskripsi }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $projectmahasiswa->status }}</p>
            <p class="card-text"><strong>Mahasiswa:</strong> {{ $projectmahasiswa->mahasiswa->nama }}</p>
            <p class="card-text"><strong>Foto:</strong>
                @if($projectmahasiswa->foto)
                    <br><img src="{{ asset('storage/' . $projectmahasiswa->foto) }}" width="200px" alt="Foto Project">
                @else
                    <span class="text-muted">Belum ada</span>
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('projectmahasiswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
