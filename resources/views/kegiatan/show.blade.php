@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Detail Kegiatan</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $kegiatan->judul }}</h5>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $kegiatan->deskripsi }}</p>
            <p class="card-text"><strong>Tanggal:</strong> {{ $kegiatan->tanggal ? \Carbon\Carbon::parse($kegiatan->tanggal)->format('d/m/Y') : '-' }}</p>
            <p class="card-text"><strong>Lokasi:</strong> {{ $kegiatan->lokasi }}</p>
            <p class="card-text"><strong>Dibuat:</strong> {{ $kegiatan->created_at->format('d/m/Y H:i') }}</p>
            <p class="card-text"><strong>Diubah:</strong> {{ $kegiatan->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
