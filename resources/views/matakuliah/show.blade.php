@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Detail Mata Kuliah</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $matakuliah->nama_matkul }}</h5>
            <p class="card-text">
                <strong>Kode Matkul:</strong> {{ $matakuliah->kode_matkul }}<br>
                <strong>Semester:</strong> {{ $matakuliah->semester }}<br>
                <strong>SKS:</strong> {{ $matakuliah->sks }}<br>
                <strong>Deskripsi:</strong> {{ $matakuliah->deskripsi ?? 'Tidak ada deskripsi' }}<br>
                <strong>Dosen:</strong> {{ $matakuliah->dosen->nama ?? 'N/A' }}
            </p>
            <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('matakuliah.edit', $matakuliah->id) }}" class="btn btn-warning">Ubah</a>
        </div>
    </div>
@endsection
