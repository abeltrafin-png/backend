@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Peraturan Akademik</h1>

    <form action="{{ route('akademik.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_peraturan" class="form-label">Nama Peraturan</label>
            <input type="text" name="nama_peraturan" id="nama_peraturan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="file_dokumen" class="form-label">File Dokumen</label>
            <input type="file" name="file_dokumen" id="file_dokumen" class="form-control" accept=".pdf,.doc,.docx">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('akademik.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
