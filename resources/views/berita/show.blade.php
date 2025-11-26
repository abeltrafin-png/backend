@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>{{ $berita->judul }}</h2>

    <p>
        <strong>Penulis:</strong> {{ $berita->penulis }} |
        <strong>Tanggal:</strong> 
        {{ $berita->tanggal ? $berita->tanggal->format('d-m-Y') : 'Belum diatur' }}
    </p>

    @if($berita->foto)
        <img src="{{ asset('storage/' . $berita->foto) }}" class="mb-3" style="max-width: 400px;">
    @endif

    <p>{{ $berita->isi }}</p>

    <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
