@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>{{ $pengumuman->judul }}</h2>

    <p>
        <strong>Kategori:</strong> {{ $pengumuman->kategori }} |
        <strong>Status:</strong> <span class="badge badge-{{ $pengumuman->status == 'published' ? 'success' : 'secondary' }}">{{ ucfirst($pengumuman->status) }}</span> |
        <strong>Tanggal Publish:</strong> {{ $pengumuman->tanggal_publish->format('d-m-Y') }} |
        <strong>Views:</strong> {{ $pengumuman->views }}
    </p>

    @if($pengumuman->penulis)
        <p><strong>Penulis:</strong> {{ $pengumuman->penulis }}</p>
    @endif

    @if($pengumuman->lampiran)
        <p><strong>Lampiran:</strong> <a href="{{ asset($pengumuman->lampiran) }}" target="_blank" class="btn btn-sm btn-info">Download Lampiran</a></p>
    @endif

    <div class="mt-4">
        <h5>Isi Pengumuman:</h5>
        <p>{{ $pengumuman->isi }}</p>
    </div>

    <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
