@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Edit Peraturan Keuangan</h1>

    <form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_peraturan">Nama Peraturan</label>
            <input type="text" class="form-control" id="nama_peraturan" name="nama_peraturan" value="{{ $keuangan->nama_peraturan }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $keuangan->deskripsi }}</textarea>
        </div>

        <div class="form-group">
            <label for="file_dokumen">File Dokumen</label>
            <input type="file" class="form-control" id="file_dokumen" name="file_dokumen" accept=".pdf,.doc,.docx">
            @if($keuangan->file_dokumen)
                <small class="form-text text-muted">File saat ini: <a href="{{ asset('storage/' . $keuangan->file_dokumen) }}" target="_blank">{{ $keuangan->file_dokumen }}</a></small>
            @endif
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="aktif" {{ $keuangan->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $keuangan->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('keuangan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
