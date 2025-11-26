@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Tambah Pengumuman</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="">Pilih Kategori</option>
                <option value="Akademik">Akademik</option>
                <option value="Kemahasiswaan">Kemahasiswaan</option>
                <option value="Beasiswa">Beasiswa</option>
                <option value="Kegiatan">Kegiatan</option>
                <option value="Umum">Umum</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_publish" class="form-label">Tanggal Publish</label>
            <input type="date" name="tanggal_publish" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control">
        </div>

        <div class="mb-3">
            <label for="lampiran" class="form-label">Lampiran</label>
            <input type="file" name="lampiran" class="form-control">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
