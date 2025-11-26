@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Detail Peraturan Keuangan</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $keuangan->nama_peraturan }}</h5>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $keuangan->deskripsi }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $keuangan->status }}</p>
            @if($keuangan->file_dokumen)
                <p class="card-text"><strong>File Dokumen:</strong> <a href="{{ asset('storage/' . $keuangan->file_dokumen) }}" target="_blank">Lihat Dokumen</a></p>
            @endif
            <a href="{{ route('keuangan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
