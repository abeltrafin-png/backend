@extends('layout.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Ubah Informasi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('informasi.update', $informasi->id_informasi) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="berita" {{ old('kategori', $informasi->kategori) == 'berita' ? 'selected' : '' }}>Berita</option>
                <option value="pengumuman" {{ old('kategori', $informasi->kategori) == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                <option value="agenda" {{ old('kategori', $informasi->kategori) == 'agenda' ? 'selected' : '' }}>Agenda</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $informasi->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea name="isi" id="isi" class="form-control" rows="5" required>{{ old('isi', $informasi->isi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal_publish" class="form-label">Tanggal Publish</label>
            <input type="datetime-local" name="tanggal_publish" id="tanggal_publish" class="form-control" value="{{ old('tanggal_publish', $informasi->tanggal_publish->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="form-control" value="{{ old('penulis', $informasi->penulis) }}" required>
        </div>

        <div class="mb-3">
            <label for="lampiran" class="form-label">Lampiran</label>
            <input type="file" name="lampiran" id="lampiran" class="form-control" accept="image/*,application/pdf">
            @if ($informasi->lampiran)
                <a href="{{ asset($informasi->lampiran) }}" target="_blank" class="mt-2 d-block">Lihat Lampiran Saat Ini</a>
            @endif
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="aktif" {{ old('status', $informasi->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ old('status', $informasi->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('informasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
