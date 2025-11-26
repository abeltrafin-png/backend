@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Informasi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="">Pilih Kategori</option>
                <option value="berita">Berita</option>
                <option value="pengumuman">Pengumuman</option>
                <option value="agenda">Agenda</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal_publish" class="form-label">Tanggal Publish</label>
            <input type="datetime-local" name="tanggal_publish" id="tanggal_publish" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="lampiran" class="form-label">Lampiran</label>
            <input type="file" name="lampiran" id="lampiran" class="form-control" accept="image/*,application/pdf">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('informasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
