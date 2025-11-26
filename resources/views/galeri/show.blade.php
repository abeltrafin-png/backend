@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Detail Galeri</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $galeri->judul }}</h5>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $galeri->deskripsi }}</p>
            <p class="card-text"><strong>Foto:</strong></p>
            @if ($galeri->foto)
                <img src="{{ asset($galeri->foto) }}" class="img-fluid mb-3" alt="Foto Galeri" style="max-width: 300px;">
            @else
                <span class="text-muted">Belum ada foto</span>
            @endif
            <p class="card-text"><strong>Dibuat:</strong> {{ $galeri->created_at->format('d/m/Y H:i') }}</p>
            <p class="card-text"><strong>Diubah:</strong> {{ $galeri->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('galeri.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
